<x-layouts.app title="Historial de Inventario" :breadcrumbs="['Inventario', route('stock.index') => 'Historial de Inventario']">

  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Fecha</th>
          <th scope="col">Producto</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Proveedor</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($rows as $row)
          @php
            $sign = $row->cost ? '+' : '-';
            $class = $row->cost ? 'text-success' : 'text-danger';
          @endphp
          <tr>
            <td>{{ $row->created_at->format('d/m/Y') }}</td>
            <td>{{ $row->product->name }}</td>
            <td class="fw-bold {{ $class }}">{{ $sign }}{{ $row->amount }} unidades</td>
            <td>{{ $row?->supplier?->name ?? 'N/A' }}</td>
          </tr>
        @empty
          <tr>
            <td class="text-center" colspan="{{ $cols }}">No existen registros.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  
  @push('js')
    <script type="module" src="{{ asset('js/change-reload.js') }}"></script>
  @endpush
  
  </x-layouts.app>
  