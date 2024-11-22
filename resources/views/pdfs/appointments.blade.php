<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Listado de citas</title>

    <link href="{{ asset('vendor/css/styles.min.css') }}" rel="stylesheet">
    <link href="{{ asset('app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="d-flex align-items-center justify-content-center gap-1 w-100">
        <header style="background-color: #ccc; padding-bottom: 10px">
            <img height="35" width="35" src="data:image/png;base64,{{ $image }}" alt="Logo"
                style="position: absolute; left: 40%; top: 10px">
            <h3 class="h2 tracking-tighter" style="margin-left: 45%; margin-right: 50%;">Odontomedics</h3>
            <p style="width: 100%; margin-left: 41%; margin-right: 50%;">
                Listado de citas
            </p>
            <p style="width: 100%; margin-left: 45%; margin-right: 50%; margin-top: -1rem">
                {{ now()->translatedFormat('d-m-Y') }}
            </p>
        </header>
    </div>
    <div class="table-responsive">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th style="width: 12.5% !important; border-bottom: 1px solid #aaa;">
                        <p>Fecha</p>
                    </th>
                    <th style="width: 12.5% !important; border-bottom: 1px solid #aaa;">
                        <p>Hora</p>
                    </th>
                    <th style="width: 12.5% !important; border-bottom: 1px solid #aaa;">
                        <p>Estatus</p>
                    </th>
                    <th style="width: 12.5% !important; border-bottom: 1px solid #aaa;">
                        <p>Paciente</p>
                    </th>
                    <th style="width: 12.5% !important; border-bottom: 1px solid #aaa;">
                        <p>Doctor</p>
                    </th>
                    <th style="width: 12.5% !important; border-bottom: 1px solid #aaa;">
                        <p>Diagnóstico</p>
                    </th>
                    <th style="width: 12.5% !important; border-bottom: 1px solid #aaa;">
                        <p>Tratamiento</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($appointments as $appointment)
                    @php
                        $badge = match ($appointment->status) {
                            App\Enums\Status::Pending => 'text-bg-secondary',
                            App\Enums\Status::Canceled => 'text-bg-danger',
                            App\Enums\Status::Approved => 'text-bg-success',
                            App\Enums\Status::Unfilled => 'text-bg-warning',
                            App\Enums\Status::Completed => 'text-bg-primary',
                        };

                        $status = $appointment->status;

                        $pending = $status === App\Enums\Status::Pending;
                        $approved = $status === App\Enums\Status::Approved;
                        $canceled = $status === App\Enums\Status::Canceled;
                        $unfilled = $status === App\Enums\Status::Unfilled;
                        $completed = $status === App\Enums\Status::Completed;

                        $cancelable = $approved || $pending;

                        $defaultDoctor = $canceled ? 'No asignado' : 'Por asignar';
                    @endphp

                    <tr>
                        <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
                            <p>{{ $appointment->date->format('d-m-Y') }}</p>
                        </td>
                        <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
                            <p>{{ $appointment->time->format('H:i A') }}</p>
                        </td>
                        <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
                            <p>{{ $status }}</p>
                        </td>
                        <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
                            <p>{{ $appointment->patient->fullname }}</p>
                        </td>
                        <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
                            <p>{{ $appointment->doctor?->fullname ?? $defaultDoctor }}</p>
                        </td>
                        <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
                            <p>{{ $appointment->diagnosis ?? 'N/A' }}</p>
                        </td>
                        <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
                            <p>{{ $appointment->procedure?->treatment?->name ?? 'N/A' }}</p>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td style="width: 100% !important; border-bottom: 1px solid #aaa;">No existen registros.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>
