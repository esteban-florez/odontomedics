<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentSetted extends Notification
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
            'title' => 'Tiene una cita pendiente',
            'text' => "Ha sido asignado a la cita con el paciente {$appointment->patient->fullname}.",
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
        return 'appointment-setted';
    }
}
