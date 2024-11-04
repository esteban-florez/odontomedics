@use(App\Enums\Status)

<x-layouts.app title="Listado de citas" :breadcrumbs="['Mis citas', route('appointments.index') => 'Listado de citas']">

  <x-slot name="rightbar">
    <a href="{{ route('appointments.create') }}" class="btn btn-success">
      Agendar cita
    </a>
  </x-slot>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Fecha</th>
        <th scope="col">Hora</th>
        <th scope="col">Doctor</th>
        <th scope="col">Diagnóstico</th>
        <th scope="col">Tratamiento</th>
        <th scope="col">Estatus</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($appointments as $appointment)
        @php
          $badge = match ($appointment->status) {
            Status::Pending => 'text-bg-secondary',
            Status::Canceled => 'text-bg-danger',
            Status::Approved => 'text-bg-success',
            Status::Completed => 'text-bg-primary',
          };

          $status = $appointment->status;
          $canceled = $status === Status::Canceled;
          $cancelable = $status !== Status::Completed && !$canceled;
          $defaultDoctor = $canceled ? 'No asignado' : 'Por asignar';
        @endphp
        <tr>
          <td>{{ $appointment->date->format('d-m-Y') }}</td>
          <td>{{ $appointment->time->format('H:i A') }}</td>
          <td>{{ $appointment->doctor?->fullname ?? $defaultDoctor }}</td>
          <td>{{ $appointment->diagnosis ?? 'N/A' }}</td>
          <td>{{ $appointment->procedure?->treatment?->name ?? 'N/A' }}</td>
          <td>
            <span class="badge fw-medium {{ $badge }}">
              {{ $appointment->status }}
            </span>
          </td>
          <td>
            @if ($cancelable)
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
      @endforeach
    </tbody>
  </table>
</div>

  </x-layouts.app>
