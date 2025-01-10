@php
  $ci = request()->query('ci');
  $name = request()->query('name');
@endphp

<x-layouts.app title="Listado de Pacientes" :breadcrumbs="['Pacientes', route('patients.index') => 'Listado de Pacientes']">

<x-slot name="rightbar">
  <form class="input-group justify-content-end" method="GET">
    <input name="ci" type="search" class="form-control search-input" placeholder="Cédula..." value="{{ $ci }}"/>
    <input name="name" type="search" class="form-control search-input" placeholder="Nombre o apellido..." value="{{ $name }}" />
    <button class="btn btn-info" type="submit">
      <i data-feather="search"></i>
    </button>
  </form>
  <a href="{{ route('patients.create') }}" class="btn btn-success flex-shrink-0">
    Registrar paciente
  </a>
  <a href="{{ route('pdf.patients') }}" class="btn btn-secondary flex-shrink-0">
    Descargar PDF
  </a>
</x-slot>

<div class="table-responsive">
    @if ($ci || $name)
      <div class="d-flex align-items-center mb-4">
        <p class="mb-0">Buscando por
          @if ($ci)
            la cédula: <b>"{{ $ci }}"</b>
          @endif
          @if ($ci && $name)
            y
          @endif
          @if ($name)
            el nombre o apellido: <b>"{{ $name }}"</b>
          @endif
        </p>
        <a href="{{ route('patients.index') }}" class="btn btn-sm btn-danger ms-4">
          Cancelar
        </a>
      </div>
    @endif
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Cédula</th>
        <th scope="col">Sexo</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($patients as $patient)
        <tr>
          <td>{{ $patient->fullname }}</td>
          <td>{{ $patient->cedula }}</td>
          <td>{{ $patient->gender }}</td>
          <td>{{ $patient->tel }}</td>
          <td class="d-flex align-items-center gap-1">
            <a href="{{ route('patients.show', $patient) }}" class="btn btn-sm btn-info">Detalles</a>
            <a href="{{ route('patients.edit', $patient) }}" class="btn btn-sm btn-warning">Editar</a>
            <a href="{{ route('patients.history', $patient) }}" class="btn btn-sm btn-dark">Historial</a>
            <a href="{{ route('bills.index', ['patient_id' => $patient->id]) }}" class="btn btn-sm btn-light">Facturas</a>
          </td>
        </tr>
      @empty
        <tr>
          <td class="text-center" colspan="5">No existen registros.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

</x-layouts.app>
