@php
  $admin = auth()->user()->is_admin;
  $patient = !$admin;

  $title = $admin ? 'Historial de Facturas' : 'Mis facturas';
  $group = $admin ? 'Facturación' : 'Inicio';

  $cols = $admin ? 6 : 5;
@endphp


<x-layouts.app :title="$title" :breadcrumbs="[$group, route('procedures.index') => $title]">

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Fecha</th>
        <th scope="col">Tratamiento</th>
        @if ($admin)
          <th scope="col">Paciente</th>
        @endif
        <th scope="col">Monto Insumos</th>
        <th scope="col">Monto Total</th>
        <th scope="col">Método</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($bills as $bill)
        <tr>
          <td>{{ $bill->created_at->format('d-m-Y') }}</td>
          <td>{{ $bill->procedure->treatment->name }}</td>
          @if ($admin)
            <td>{{ $bill->procedure->patient->fullname }}</td>
          @endif
          <td>{{ $bill->fitems_total }}</td>
          <td>{{ $bill->ftotal }}</td>
          <td>{{ $bill->method }}</td>
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
