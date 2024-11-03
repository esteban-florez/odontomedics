<x-layouts.app title="Tipos de Tratamientos" :breadcrumbs="['Tratamientos', route('treatments.index') => 'Tipos de Tratamientos']">

<x-slot name="rightbar">
  <a href="{{ route('treatments.create') }}" class="btn btn-success">
    Registrar tipo
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
      @foreach ($treatments as $treatment)
        <tr>
          <td>{{ $treatment->name }}</td>
          <td>{{ $treatment->fprice }}</td>
          <td class="d-flex align-items-center gap-1">
            <a href="{{ route('treatments.edit', $treatment) }}" class="btn btn-sm btn-warning">Editar</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

</x-layouts.app>
