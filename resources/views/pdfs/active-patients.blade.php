<x-layouts.pdf title="Stock de Insumos" :image="$image">

<x-slot name="css">
  <style>
    {{ file_get_contents(public_path('pdf-table.css')) }}
  </style>
</x-slot>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Cédula</th>
        <th scope="col">Citas</th>
        <th scope="col">Tratamientos</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($patients as $patient)
        <tr>
          <td>{{ $patient->fullname }}</td>
          <td>{{ $patient->cedula }}</td>
          <td>{{ $patient->appointments_count }} citas</td>
          <td>{{ $patient->procedures_count }} tratamientos</td>
        </tr>
      @empty
        <tr>
          <td class="text-center" colspan="4">No existen registros.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

</x-layouts.pdf>
