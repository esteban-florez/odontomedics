<x-layouts.pdf title="Lista de Citas">

<div class="table-responsive">
  <table style="width: 100%;">
    <thead>
      <tr>
        <th style="width: 12.5% !important; border-bottom: 1px solid #aaa;">
          <p>Fecha</p>
        </th>
        <th style="width: 12.5% !important; border-bottom: 1px solid #aaa;">
          <p>Hora</p>
        </th>
        <th style="width: 12.5% !important; border-bottom: 1px solid #aaa;">
          <p>Estatus</p>
        </th>
        <th style="width: 12.5% !important; border-bottom: 1px solid #aaa;">
          <p>Paciente</p>
        </th>
        <th style="width: 12.5% !important; border-bottom: 1px solid #aaa;">
          <p>Doctor</p>
        </th>
        <th style="width: 12.5% !important; border-bottom: 1px solid #aaa;">
          <p>Diagnóstico</p>
        </th>
        <th style="width: 12.5% !important; border-bottom: 1px solid #aaa;">
          <p>Tratamiento</p>
        </th>
      </tr>
    </thead>
    <tbody>
      @forelse ($appointments as $appointment)
        <tr>
          <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
            <p>{{ $appointment->date->format('d-m-Y') }}</p>
          </td>
          <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
            <p>{{ $appointment->time->format('H:i A') }}</p>
          </td>
          <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
            <p>{{ $appointments->status }}</p>
          </td>
          <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
            <p>{{ $appointment->patient->fullname }}</p>
          </td>
          <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
            <p>{{ $appointment->doctor_name }}</p>
          </td>
          <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
            <p>{{ $appointment->diagnosis ?? 'N/A' }}</p>
          </td>
          <td style="padding: 1rem; width: 12.5% !important; border-bottom: 1px solid #aaa;">
            <p>{{ $appointment->procedure?->treatment?->name ?? 'N/A' }}</p>
          </td>
        </tr>
      @empty
        <tr>
          <td style="width: 100% !important; border-bottom: 1px solid #aaa;">No existen registros.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

</x-layouts.pdf>
