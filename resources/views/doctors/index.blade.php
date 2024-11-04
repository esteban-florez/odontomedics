<x-layouts.app title="Listado de Doctores" :breadcrumbs="['Doctores', route('doctors.index') => 'Listado de Doctores']">

<x-slot name="rightbar">
  <a href="{{ route('doctors.create') }}" class="btn btn-success">
    Registrar doctor
  </a>
</x-slot>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Cédula</th>
        <th scope="col">Especialidad</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($doctors as $doctor)
        <tr>
          <td>{{ $doctor->fullname }}</td>
          <td>{{ $doctor->cedula }}</td>
          <td>{{ $doctor->specialty }}</td>
          <td class="d-flex align-items-center gap-1">
            <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-sm btn-warning">Editar</a>
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

</x-layouts.app>
