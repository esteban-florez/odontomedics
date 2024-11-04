@use(App\Enums\Status)
@php
  $admin = auth()->user()->is_admin;
  $patient = !$admin;

  $group = $admin ? 'Citas' : 'Mis citas';
@endphp


<x-layouts.app title="Listado de citas" :breadcrumbs="[$group, route('appointments.index') => 'Listado de citas']">

@if ($patient)
  <x-slot name="rightbar">
    <a href="{{ route('appointments.create') }}" class="btn btn-success">
      Agendar cita
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
          
          $unfilled = $status === Status::Unfilled;
          $completed = $status === Status::Completed;
          $approved = $status === Status::Approved;
          $pending = $status === Status::Pending;
          $canceled = $status === Status::Canceled;

          $cancelable = $approved || $pending;
          $editable = $unfilled || $completed;

          $defaultDoctor = $canceled ? 'No asignado' : 'Por asignar';

          $btn = $completed ? 'btn-warning' : 'btn-primary';
          $text = $completed ? 'Editar' : 'Completar';
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
            @if ($admin && $editable)
              <a class="btn btn-sm {{ $btn }}" href="{{ route('appointments.edit', $appointment) }}">
                {{ $text }}
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
          <td class="text-center" colspan="7">No existen registros.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

  </x-layouts.app>
