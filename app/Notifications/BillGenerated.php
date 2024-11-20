<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class BillGenerated extends Notification
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
            'icon' => 'dollar-sign',
            'title' => 'Tienes un nuevo pago',
            'text' => "Se registró un pago de {$appointment->procedure->bill->ftotal} por tu cita del {$appointment->date->format('d/m/Y')}.",
            'time' => $appointment->updated_at,
            'href' => route('bills.index'),
        ];
    }

    /**
     * Get the notification's database type.
     *
     * @return string
     */
    public function databaseType(): string
    {
        return 'bill-generated';
    }
}
