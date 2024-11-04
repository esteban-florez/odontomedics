<x-layouts.app title="Listado de Servicios" :breadcrumbs="['Servicios', route('treatments.index') => 'Listado de Servicios']">

<x-slot name="rightbar">
  <a href="{{ route('treatments.create') }}" class="btn btn-success">
    Registrar servicio
  </a>
</x-slot>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Precio</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($treatments as $treatment)
        <tr>
          <td>{{ $treatment->name }}</td>
          <td>{{ $treatment->fprice }}</td>
          <td class="d-flex align-items-center gap-1">
            <a href="{{ route('treatments.edit', $treatment) }}" class="btn btn-sm btn-warning">Editar</a>
          </td>
        </tr>
      @empty
        <tr>
          <td class="text-center" colspan="3">No existen registros.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

</x-layouts.app>
