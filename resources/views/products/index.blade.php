<x-layouts.app title="Listado de Insumos" :breadcrumbs="['Insumos', route('products.index') => 'Listado de Insumos']">

<x-slot name="rightbar">
  <a href="{{ route('products.create') }}" class="btn btn-success">
    Registrar insumo
  </a>
</x-slot>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Precio</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
        <tr>
          <td>{{ $product->name }}</td>
          <td>{{ $product->description }}</td>
          <td>{{ $product->fprice }}</td>
          <td class="d-flex align-items-center gap-1">
            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Editar</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

</x-layouts.app>
