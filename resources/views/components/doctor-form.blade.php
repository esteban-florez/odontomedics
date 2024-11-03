@props(['type', 'specialties', 'doctor' => null])

@php
  $create = $type === 'create';
  $edit = $type === 'edit';

  $title = $create ? 'Registrar' : 'Editar';
  $action = $create ? 'doctors.store' : 'doctors.update';
@endphp

<form action="{{ route($action, $doctor) }}" method="POST">
  @csrf
  @if ($edit)
    @method('PUT')
  @endif
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input name="name" label="Nombre" placeholder="Introduce tu nombre..." :value="$doctor?->name" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input name="surname" label="Apellido" placeholder="Introduce tu apellido..." :value="$doctor?->surname" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input name="ci" label="Cédula de identidad" type="number"
          placeholder="Introduce tu número de cédula..." :value="$doctor?->ci" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-select label="Especialidad" name="specialty" :options="$specialties" :value="$doctor?->specialty" />
      </div>
    </div>
    <div class="col-lg-12 d-flex gap-2 mt-3">
      <button type="submit" class="btn btn-success">{{ $title }} doctor</button>
      <a href="{{ route('doctors.index') }}" class="btn btn-light">Volver al listado</a>
    </div>
  </div>
</form>
