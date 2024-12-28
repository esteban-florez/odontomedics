<?php

namespace App\Http\Controllers;

use App\Enums\Method;
use App\Models\Appointment;
use App\Models\Bill;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Treatment;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;

class HomeController extends Controller
{
    public function __invoke()
    {
        $patients = Patient::count();
        $doctors = Doctor::count();
        $treatments = Treatment::count();
        $appointments = Appointment::whereYear('created_at', now()->format('Y'))
            ->where('canceled', false)
            ->get('date');
        $bills = Bill::whereYear('created_at', now()->format('Y'))
            ->get();
        $totalEarnings = Bill::whereMonth('created_at', now()->format('m'))
            ->get('total');

        $earning_months = array_fill(1, 12, 0);
        $appointments_months = array_fill(1, 12, 0);
        $methods_months = [];

        $totalEarnings = $totalEarnings->reduce(fn($sum, $earning) => $sum + $earning->total);
        foreach ($appointments as $appointment) {
            $month = (int) $appointment->date->format('m');
            $appointments_months[$month] += 1;
        }

        foreach ($bills as $bill) {
            $month = $bill->created_at->format('m');
            $total = $bill->total;
            $earning_months[$month] += $total;

            if (isset($methods_months[Method::tryFrom($bill->method)->name])) {
                $methods_months[Method::tryFrom($bill->method)->name] += $total;
            } else {
                $methods_months[Method::tryFrom($bill->method)->name] = $total;
            }
        }

        $sales = Chartjs::build()
            ->name('sales')
            ->type('doughnut')
            ->size(['width' => 'auto', 'height' => 200])
            ->labels(Method::values()->all())
            ->datasets([
                [
                    'label' => 'Métodos de pago',
                    'data' => array_values($methods_months),
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                ],
            ]);

        $earnings = Chartjs::build()
            ->name('UserRegistrationChart')
            ->type('line')
            ->size(['width' => 'auto', 'height' => 200])
            ->labels(['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'])
            ->datasets([
                [
                    'label' => 'Ingresos',
                    "backgroundColor" => "rgba(38, 185, 154, 0.31)",
                    "borderColor" => "rgba(38, 185, 154, 0.7)",
                    'data' => array_values($earning_months)
                ]
            ])
            ->options([
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Ingresos mensuales'
                    ]
                ]
            ]);

        $appointments = Chartjs::build()
            ->name('Appointments')
            ->type('bar')
            ->size(['width' => 'auto', 'height' => 200])
            ->labels(['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'])
            ->datasets([
                [
                    'label' => 'Citas',
                    "backgroundColor" => "rgba(38, 185, 154, 0.31)",
                    "borderColor" => "rgba(38, 185, 154, 0.7)",
                    'data' => array_values($appointments_months)
                ]
            ])
            ->options([
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Citas'
                    ]
                ]
            ]);

        return view('home', [
            'patients' => $patients,
            'doctors' => $doctors,
            'treatments' => $treatments,
            'totalEarnings' => $totalEarnings,
            'earnings' => $earnings,
            'sales' => $sales,
            'methods_months' => $methods_months,
            'appointments' => $appointments
        ]);
    }
}
