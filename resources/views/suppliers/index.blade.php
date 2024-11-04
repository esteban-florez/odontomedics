<x-layouts.app title="Listado de Proveedores" :breadcrumbs="['Proveedores', route('suppliers.index') => 'Listado de Proveedores']">

<x-slot name="rightbar">
  <a href="{{ route('suppliers.create') }}" class="btn btn-success">
    Registrar proveedor
  </a>
</x-slot>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($suppliers as $supplier)
        <tr>
          <td>{{ $supplier->name }}</td>
          <td>{{ $supplier->email }}</td>
          <td>{{ $supplier->tel }}</td>
          <td class="d-flex align-items-center gap-1">
            <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-sm btn-warning">Editar</a>
          </td>
        </tr>
      @empty
        <tr>
          <td class="text-center" colspan="4">No existen registros.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

</x-layouts.app>
