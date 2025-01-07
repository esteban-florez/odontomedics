<x-layouts.app :title="'Estado de Inventario'" :breadcrumbs="['Inventario', route('stock.index') => 'Estado de Inventario']">

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Producto</th>
        <th scope="col">Stock</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($products as $product)
        <tr>
          <td>{{ $product->name }}</td>
          <td>{{ $product->stock }} unidades</td>
          <td>
            <a class="btn btn-sm btn-success" href="{{ route('purchases.create', ['product_id' => $product->id]) }}">
              Registrar pedido
            </a>
            <a class="btn btn-sm btn-primary" href="{{ route('stock.history') }}">
              Ver historial
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

@push('js')
  <script type="module" src="{{ asset('js/change-reload.js') }}"></script>
@endpush

</x-layouts.app>
