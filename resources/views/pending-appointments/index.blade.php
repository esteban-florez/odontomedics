<x-layouts.app title="Citas por asignar" :breadcrumbs="['Citas', route('pending-appointments.index') => 'Citas por asignar']">

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Fecha</th>
        <th scope="col">Hora</th>
        <th scope="col">Paciente</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($appointments as $appointment)
        <tr>
          <td>{{ $appointment->date->format('d-m-Y') }}</td>
          <td>{{ $appointment->time->format('H:i A') }}</td>
          <td>{{ $appointment->patient->fullname }}</td>
          <td class="d-flex align-items-center gap-2">
            <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal" data-bs-target=".modal" data-action="{{ route('pending-appointments.update', $appointment) }}">
              Asignar doctor
            </button>
            <form action="{{ route('appointments.destroy', $appointment) }}" method="post">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">
                Cancelar cita
              </button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td class="text-center" colspan="4">No existen registros.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

<x-modal title="Asignar doctor" form="assign-doctor-form">
  <form method="POST" id="assign-doctor-form">
    @csrf @method('PATCH')
    <div class="form-group mb-3">
      <x-select label="Doctor asignado" name="doctor_id" :options="$doctors" />
    </div>
  </form>
</x-modal>

@push('js')
  <script src="{{ asset('js/modal-edit.js') }}"></script>
  <script src="{{ asset('js/pending-appointments.js') }}"></script>
@endpush

</x-layouts.app>
