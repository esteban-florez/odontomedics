<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $with = ['patient', 'doctor', 'procedure', 'procedure.treatment'];

        $appointments = Appointment::with($with)
            ->when(!$user->is_admin, fn(Builder $query) 
                => $query->where('patient_id', $user->patient->id))
            ->latest()
            ->get();

        return view('appointments.index', [
            'appointments' => $appointments,
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

        Appointment::create($data);

        return to_route('appointments.index')
            ->with('alert', 'Has agendado tu cita correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //
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
