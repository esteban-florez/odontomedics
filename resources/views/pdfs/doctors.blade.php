<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Listado de doctores</title>

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
                Listado de doctores
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
                    <th style="width: 33% !important; border-bottom: 1px solid #aaa;">
                        <p>Nombre</p>
                    </th>
                    <th style="width: 33% !important; border-bottom: 1px solid #aaa;">
                        <p>Cédula</p>
                    </th>
                    <th style="width: 33% !important; border-bottom: 1px solid #aaa;">
                        <p>Especialidad</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($doctors as $doctor)
                    <tr>
                        <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
                            <p>{{ $doctor->fullname }}</p>
                        </td>
                        <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
                            <p>{{ $doctor->cedula }}</p>
                        </td>
                        <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
                            <p>{{ $doctor->specialty }}</p>
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
