@use(App\Enums\Progress)

@php
  $admin = auth()->user()->is_admin;
  $patient = !$admin;

  $group = $admin ? 'Tratamientos' : 'Mis tratamientos';

  $cols = $admin ? 8 : 7;
@endphp


<x-layouts.app title="Mis tratamientos" :breadcrumbs="['Inicio', route('procedures.index') => 'Mis tratamientos']">

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Fecha</th>
        <th scope="col">Estatus</th>
        @if ($admin)
          <th scope="col">Paciente</th>
        @endif
        <th scope="col">Doctor</th>
        <th scope="col">Costo</th>
        <th scope="col">Descripción</th>
        <th scope="col">Tratamiento</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($procedures as $procedure)
        @php
          $badge = match ($procedure->progress) {
            Progress::Active => 'text-bg-warning',
            Progress::Finished => 'text-bg-success',
          };
        @endphp
        <tr>
          <td>{{ $procedure->created_at->format('d-m-Y') }}</td>
          <td>
            <span class="badge {{ $badge }} fw-medium">
              {{ $procedure->progress }}
            </span>
          </td>
          @if ($admin)
            <td>{{ $procedure->patient->fullname }}</td>
          @endif
          <td>{{ $procedure->appointments[0]->doctor->fullname }}</td>
          <td>{{ $procedure->bill->ftotal }}</td>
          <td>{{ $procedure->description }}</td>
          <td>{{ $procedure->treatment->name }}</td>
          <td>
            {{-- href="{{ route('procedures.show', $procedure) }}" --}}
            <a class="btn btn-sm btn-primary" href="#">
              Detalles
            </a>
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
