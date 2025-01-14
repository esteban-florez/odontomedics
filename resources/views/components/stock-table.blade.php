@props(['products', 'actions' => true])

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        @if (!$actions)
          <th scope="col">ID</th>
        @endif
        <th scope="col">Producto</th>
        <th scope="col">Stock</th>
        @if ($actions)
          <th scope="col">Acciones</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @forelse ($products as $product)
        <tr>
          @if (!$actions)
            <td>{{ $product->id }}</td>
          @endif
          <td>{{ $product->name }}</td>
          <td>{{ $product->stock }} unidades</td>
          @if ($actions)
            <td>
              <a class="btn btn-sm btn-success" href="{{ route('purchases.create', ['product_id' => $product->id]) }}">
                Registrar pedido
              </a>
              <a class="btn btn-sm btn-primary" href="{{ route('stock.history') }}">
                Ver historial
              </a>
            </td>
          @endif
        </tr>
      @empty
        <tr>
          <td class="text-center" colspan="{{ $cols }}">No existen registros.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
