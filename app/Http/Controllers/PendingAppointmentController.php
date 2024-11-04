<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class PendingAppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('canceled', false)
            ->whereNull('doctor_id')
            ->latest()
            ->get();

        return view('pending-appointments.index', [
            'appointments' => $appointments,
            'doctors' => Doctor::selectable(),
        ]);
    }

    public function update(Request $request, Appointment $appointment)
    {
        $data = $request->validate([
            'doctor_id' => ['required', 'numeric', 'integer'],
        ]);

        $appointment->update($data);

        return to_route('pending-appointments.index')
            ->with('alert', 'Se asignó el doctor a la cita correctamente.');
    }
}
