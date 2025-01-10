<x-layouts.pdf-old title="Listado de Pacientes" :image="$image">

<div class="table-responsive">
  <table style="width: 100%;">
    <thead>
      <tr>
        <th class="cell-bb" style="width: 40% !important">
          <p>Nombre</p>
        </th>
        <th class="cell-bb" style="width: 20% !important">
          <p>Cédula</p>
        </th>
        <th class="cell-bb" style="width: 20% !important">
          <p>Sexo</p>
        </th>
        <th class="cell-bb" style="width: 20% !important">
          <p>Teléfono</p>
        </th>
      </tr>
    </thead>
    <tbody>
      @forelse ($patients as $patient)
        <tr>
          <td class="cell-bb" style="padding: 1rem; width: 40% !important">
            {{ $patient->fullname }}</td>
          <td class="cell-bb" style="padding: 1rem; width: 20% !important">
            {{ $patient->cedula }}</td>
          <td class="cell-bb" style="padding: 1rem; width: 20% !important">
            {{ $patient->gender }}</td>
          <td class="cell-bb" style="padding: 1rem; width: 20% !important">
            {{ $patient->tel }}</td>
        </tr>
      @empty
        <tr>
          <td class="cell-bb" style="width: 100% !important">No existen registros.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

</x-layouts.pdf-old>
