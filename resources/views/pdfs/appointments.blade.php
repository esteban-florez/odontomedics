<x-layouts.pdf title="Lista de Citas">

<div class="table-responsive">
  <table style="width: 100%;">
    <thead>
      <tr>
        <th class="cell-bb" style="width: 12.5% !important">
          <p>Fecha</p>
        </th>
        <th class="cell-bb" style="width: 12.5% !important">
          <p>Hora</p>
        </th>
        <th class="cell-bb" style="width: 12.5% !important">
          <p>Estatus</p>
        </th>
        <th class="cell-bb" style="width: 12.5% !important">
          <p>Paciente</p>
        </th>
        <th class="cell-bb" style="width: 12.5% !important">
          <p>Doctor</p>
        </th>
        <th class="cell-bb" style="width: 12.5% !important">
          <p>Diagnóstico</p>
        </th>
        <th class="cell-bb" style="width: 12.5% !important">
          <p>Tratamiento</p>
        </th>
      </tr>
    </thead>
    <tbody>
      @forelse ($appointments as $appointment)
        <tr>
          <td class="cell-bb" style="padding: 1rem; width: 12.5% !important">
            <p>{{ $appointment->date->format('d-m-Y') }}</p>
          </td>
          <td class="cell-bb" style="padding: 1rem; width: 12.5% !important">
            <p>{{ $appointment->time->format('H:i A') }}</p>
          </td>
          <td class="cell-bb" style="padding: 1rem; width: 12.5% !important">
            <p>{{ $appointments->status }}</p>
          </td>
          <td class="cell-bb" style="padding: 1rem; width: 12.5% !important">
            <p>{{ $appointment->patient->fullname }}</p>
          </td>
          <td class="cell-bb" style="padding: 1rem; width: 12.5% !important">
            <p>{{ $appointment->doctor_name }}</p>
          </td>
          <td class="cell-bb" style="padding: 1rem; width: 12.5% !important">
            <p>{{ $appointment->diagnosis ?? 'N/A' }}</p>
          </td>
          <td class="cell-bb" style="padding: 1rem; width: 12.5% !important">
            <p>{{ $appointment->procedure?->treatment?->name ?? 'N/A' }}</p>
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

</x-layouts.pdf>
