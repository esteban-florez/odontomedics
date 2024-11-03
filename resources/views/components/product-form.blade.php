@props(['type', 'product' => null])

@php
  $create = $type === 'create';
  $edit = $type === 'edit';

  $title = $create ? 'Registrar' : 'Editar';
  $action = $create ? 'products.store' : 'products.update';
@endphp

<form action="{{ route($action, $product) }}" method="POST">
  @csrf
  @if ($edit)
    @method('PUT')
  @endif
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input name="name" label="Nombre" placeholder="Introduce el nombre..." :value="$product?->name" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input name="price" label="Precio ($)" type="number" step="0.01" placeholder="Introduce el precio..." :value="$product?->price" />
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group mb-3">
        <x-input name="description" label="Descripción" placeholder="Introduce la descripción..." :value="$product?->description" />
      </div>
    </div>
    <div class="col-lg-12 d-flex gap-2 mt-3">
      <button type="submit" class="btn btn-success">{{ $title }} tipo</button>
      <a href="{{ route('products.index') }}" class="btn btn-light">Volver al listado</a>
    </div>
  </div>
</form>
