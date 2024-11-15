<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class DoctorAssigned extends Notification
{
    use Queueable;

    public Appointment $appointment;

    /**
     * Create a new notification instance.
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $appointment = $this->appointment;

        return [
            'icon' => 'calendar',
            'title' => 'Tu cita ha sido asignada',
            'text' => "Dr(a). {$appointment->doctor->fullname} ha sido asignado a tu cita.",
            'time' => $appointment->updated_at,
            'href' => route('appointments.index'),
        ];
    }

    /**
     * Get the notification's database type.
     *
     * @return string
     */
    public function databaseType(): string
    {
        return 'doctor-assigned';
    }
}
