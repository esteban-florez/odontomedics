@use(App\Enums\Status)

@php
  $admin = auth()->user()->is_admin;
  $doctor = auth()->user()->doctor;

  $group = $admin ? 'Citas' : 'Mis citas';
@endphp

<x-layouts.app title="Listado de citas" :breadcrumbs="[$group, route('appointments.index') => 'Listado de citas']">

@if (!$admin && !$doctor)
  <x-slot name="rightbar">
    <a href="{{ route('appointments.create') }}" class="btn btn-success">
      Agendar cita
    </a>
  </x-slot>
@endif
@if ($admin)
  <x-slot name="rightbar">
    <a href="{{ route('appointments.pdf') }}" class="btn btn-secondary">
      Descargar PDF 
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
          $canceled = $status === Status::Canceled;
          $completed = $status === Status::Completed;

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
            @if (($admin || $doctor) && $unfilled)
              <a class="btn btn-sm btn-primary" href="{{ route('appointments.edit', $appointment) }}">
                Completar
              </a>
            @endif
            @if ($appointment->cancelable)
              <form action="{{ route('appointments.destroy', $appointment) }}" method="post">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                  Cancelar
                </button>
              </form>
            @endif
            @if ($appointment->reschedulable && ($admin || $doctor))
              <button class="btn btn-sm btn-warning" type="button" data-bs-toggle="modal" data-bs-target=".modal" data-action="{{ route('reschedule-appointment', $appointment) }}" data-date="{{ $appointment->date->format('Y-m-d') }}" data-time="{{ $appointment->time->format('H:i') }}">
                Reprogramar
              </button>
            @endif
            @if ($completed)
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

<x-modal title="Reprogramar cita" form="reschedule-form">
  <x-appointment-form edit id="reschedule-form" />
</x-modal>

@push('js')
  <script src="{{ asset('js/modal-edit.js') }}"></script>
  <script>
    window._laravelFailedAction = '{{ session()->pull('failed_action') }}';
  </script>
  <script src="{{ asset('js/reschedule.js') }}"></script>
@endpush

</x-layouts.app>
