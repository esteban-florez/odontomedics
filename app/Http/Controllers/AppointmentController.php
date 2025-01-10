<?php

namespace App\Http\Controllers;

use App\Enums\Diagnosis;
use App\Enums\Method;
use App\Enums\Progress;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Bill;
use App\Models\User;
use App\Models\Procedure;
use App\Models\Product;
use App\Models\Treatment;
use App\Notifications\AppointmentScheduled;
use App\Notifications\BillGenerated;
use App\Services\ItemService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('appointments.index', [
            'appointments' => Appointment::forUser()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        $data = $request->safe()->merge([
            'patient_id' => Auth::user()->patient->id,
        ])->all();

        $appointment = Appointment::create($data);

        $admin = User::where('is_admin', true)->first();

        Notification::send($admin, new AppointmentScheduled($appointment));

        return to_route('appointments.index')
            ->with('alert', 'Has agendado tu cita correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $products = Product::with('purchases')
            ->withSum('purchases as stock', 'amount')
            ->having('stock', '>', 0);

        $procedures = Procedure::where('patient_id', $appointment->patient->id)
            ->whereNull('finished_at');

        $appointment->load('patient', 'doctor', 'procedure', 'procedure.items', 'procedure.items.products');

        return view('appointments.edit', [
            'appointment' => $appointment,
            'products' => Product::selectable($products),
            'procedures' => Procedure::selectable($procedures),
            'diagnoses' => Diagnosis::selectable(),
            'treatments' => Treatment::selectable(),
            'methods' => Method::selectable(),
            'progress' => Progress::selectable(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $data = $request->safe();
        $appointment->diagnosis = $data->input('diagnosis');
        $finished = $request->input('progress') === Progress::Finished->value
            ? $appointment->datetime
            : null;

        if ($request->input('procedure_id') === 'new') {
            $procedure = Procedure::create([
                ...$data->only(['description', 'finished_at', 'treatment_id']),
                'finished_at' => $finished,
                'patient_id' => $appointment->patient->id,
            ]);

            ItemService::forProcedure($procedure->id, $data);

            Bill::create([
                ...$data->only(['method', 'total']),
                'procedure_id' => $procedure->id,
            ]);

            $appointment->procedure_id = $procedure->id;

            Notification::send($appointment->patient->user, new BillGenerated($appointment));
        } else {
            $appointment->procedure_id = $data->input('procedure_id');
            $appointment->procedure->update([
                'finished_at' => $finished,
            ]);
        }

        $appointment->save();

        return to_route('appointments.index')
            ->with('alert', 'La cita se ha completado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->update([
            'canceled' => true,
        ]);

        return to_route('appointments.index')
            ->with('alert', 'Has cancelado tu cita correctamente.');
    }
}
