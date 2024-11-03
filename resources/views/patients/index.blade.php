<x-layouts.app title="Listado de Pacientes" :breadcrumbs="['Pacientes', route('patients.create') => 'Listado de Pacientes']">

<x-slot name="rightbar">
  <a href="{{ route('patients.create') }}" class="btn btn-success">
    Registrar paciente
  </a>
</x-slot>

<div class="table-responsive">
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
      @foreach ($patients as $patient)
        <tr>
          <td>{{ $patient->fullname }}</td>
          <td>{{ $patient->cedula }}</td>
          <td>{{ $patient->gender }}</td>
          <td>{{ $patient->tel }}</td>
          <td class="d-flex align-items-center gap-1">
            <a href="#" class="btn btn-sm btn-primary">Detalles</a>
            <a href="#" class="btn btn-sm btn-warning">Editar</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

</x-layouts.app>
