<x-layouts.pdf-old title="Listado de Doctores" :image="$image">

<div class="table-responsive">
  <table style="width: 100%;">
    <thead>
      <tr>
        <th class="cell-bb" style="width: 33% !important">
          <p>Nombre</p>
        </th>
        <th class="cell-bb" style="width: 33% !important">
          <p>Cédula</p>
        </th>
        <th class="cell-bb" style="width: 33% !important">
          <p>Especialidad</p>
        </th>
      </tr>
    </thead>
    <tbody>
      @forelse ($doctors as $doctor)
        <tr>
          <td class="cell-bb" style="padding: 1rem; width: 12.5% !important">
            <p>{{ $doctor->fullname }}</p>
          </td>
          <td class="cell-bb" style="padding: 1rem; width: 12.5% !important">
            <p>{{ $doctor->cedula }}</p>
          </td>
          <td class="cell-bb" style="padding: 1rem; width: 12.5% !important">
            <p>{{ $doctor->specialty }}</p>
          </td>
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
