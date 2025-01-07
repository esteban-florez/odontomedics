<x-layouts.app title="Registrar Pedido" :breadcrumbs="['Inventario', route('purchases.create') => 'Registrar Pedido']">

<form action="{{ route('purchases.store') }}" method="POST">
  @csrf
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-select name="product_id" label="Producto" :options="$products" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-select name="supplier_id" label="Proveedor" :options="$suppliers" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input name="amount" label="Cantidad" type="number" step="1" placeholder="Introduce la cantidad..." min="1" max="10000" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input name="cost" label="Costo ($)" type="number" step="0.01" placeholder="Introduce el costo del pedido..." min="0.01" max="10000" />
      </div>
    </div>
    <div class="col-lg-12 d-flex gap-2 mt-3">
      <button type="submit" class="btn btn-success">
        Registrar pedido
      </button>
      {{-- <a href="{{ route('inventory.index') }}" class="btn btn-light">
        Volver al inventario
      </a> --}}
    </div>
  </div>
</form>

</x-layouts.app>
