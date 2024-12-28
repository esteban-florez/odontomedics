<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;

class RescheduleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreAppointmentRequest $request, Appointment $appointment)
    {
        $data = $request->validated();
        $appointment->update($data);

        return to_route('appointments.index')
            ->with('alert', 'Se ha reprogramado la cita correctamente.');
    }
}
