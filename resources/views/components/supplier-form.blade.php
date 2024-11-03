@props(['type', 'supplier' => null, 'codes'])

@php
  $create = $type === 'create';
  $edit = $type === 'edit';

  $title = $create ? 'Registrar' : 'Editar';
  $action = $create ? 'suppliers.store' : 'suppliers.update';
@endphp

<form action="{{ route($action, $supplier) }}" method="POST">
  @csrf
  @if ($edit)
    @method('PUT')
  @endif
  <div class="row">

    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input name="name" label="Nombre" placeholder="Introduce el nombre..." :value="$supplier?->name" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input type="email" name="email" label="Correo Eletrónico" placeholder="Introduce el correo..." :value="$supplier?->email" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <label class="form-label" for="phone">Teléfono</label>
        <div class="input-group">
          <select class="form-select input-group-text code-select" name="code" id="code">
            @foreach ($codes as $code)
              <option @if ($code === $supplier?->code ?? old('code')) selected @endif value="{{ $code }}">
                {{ $code }}</option>
            @endforeach
          </select>
          <x-input type="number" name="phone" placeholder="Introduce el teléfono..." :value="$supplier?->number" />
        </div>
      </div>
    </div>
    <div class="col-lg-12 d-flex gap-2 mt-3">
      <button type="submit" class="btn btn-success">{{ $title }} proveedor</button>
      <a href="{{ route('suppliers.index') }}" class="btn btn-light">Volver al listado</a>
    </div>
  </div>
</form>
