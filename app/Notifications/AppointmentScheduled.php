<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AppointmentScheduled extends Notification
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
            'title' => 'Nueva cita agendada',
            'text' => "El paciente {$appointment->patient->fullname} ha agendado una cita.",
            'time' => $appointment->created_at,
            'href' => route('pending-appointments.index'),
        ];
    }

    /**
     * Get the notification's database type.
     *
     * @return string
     */
    public function databaseType(): string
    {
        return 'appointment-scheduled';
    }
}
