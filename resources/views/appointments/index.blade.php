@use(App\Enums\Status)
@php
    $admin = auth()->user()->is_admin;
    $is_doctor = auth()->user()->doctor;
    $patient = !$admin;

    $group = $admin ? 'Citas' : 'Mis citas';

    $cols = $admin ? 8 : 7;
@endphp


<x-layouts.app title="Listado de citas" :breadcrumbs="[$group, route('appointments.index') => 'Listado de citas']">

    @if ($patient && !$is_doctor)
        <x-slot name="rightbar">
            <a href="{{ route('appointments.create') }}" class="btn btn-success">
                Agendar cita
            </a>
        </x-slot>
    @endif
    @if ($admin)
        <x-slot name="rightbar">
            <a href="{{ route('appointments.pdf') }}" class="btn btn-secondary">
                Descargar pdf
            </a>
        </x-slot>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Estatus</th>
                    @if ($admin)
                        <th scope="col">Paciente</th>
                    @endif
                    <th scope="col">Doctor</th>
                    <th scope="col">Diagnóstico</th>
                    <th scope="col">Tratamiento</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($appointments as $appointment)
                    @php
                        $badge = match ($appointment->status) {
                            Status::Pending => 'text-bg-secondary',
                            Status::Canceled => 'text-bg-danger',
                            Status::Approved => 'text-bg-success',
                            Status::Unfilled => 'text-bg-warning',
                            Status::Completed => 'text-bg-primary',
                        };

                        $status = $appointment->status;

                        $pending = $status === Status::Pending;
                        $approved = $status === Status::Approved;
                        $canceled = $status === Status::Canceled;
                        $unfilled = $status === Status::Unfilled;
                        $completed = $status === Status::Completed;

                        $cancelable = $approved || $pending;

                        $defaultDoctor = $canceled ? 'No asignado' : 'Por asignar';
                    @endphp
                    <tr>
                        <td>{{ $appointment->date->format('d-m-Y') }}</td>
                        <td>{{ $appointment->time->format('H:i A') }}</td>
                        <td>
                            <span class="badge {{ $badge }} fw-medium">
                                {{ $status }}
                            </span>
                        </td>
                        @if ($admin)
                            <td>{{ $appointment->patient->fullname }}</td>
                        @endif
                        <td>{{ $appointment->doctor?->fullname ?? $defaultDoctor }}</td>
                        <td>{{ $appointment->diagnosis ?? 'N/A' }}</td>
                        <td>{{ $appointment->procedure?->treatment?->name ?? 'N/A' }}</td>
                        <td>
                            @if (($admin || $is_doctor) && $unfilled)
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('appointments.edit', $appointment) }}">
                                    Completar
                                </a>
                            @elseif ($cancelable)
                                <form action="{{ route('appointments.destroy', $appointment) }}" method="post">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Cancelar
                                    </button>
                                </form>
                            @else
                                <div class="d-flex justify-content-center w-100">
                                    <span>
                                        ----
                                    </span>
                                </div>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="{{ $cols }}">No existen registros.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-layouts.app>
