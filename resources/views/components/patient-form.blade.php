@props(['type', 'patient' => null, 'codes', 'genders'])

@php
  $create = $type === 'create';
  $edit = $type === 'edit';

  $title = $create ? 'Registrar' : 'Editar';
  $action = $create ? 'patients.store' : 'patients.update';
@endphp

<form action="{{ route($action, $patient) }}" method="POST">
  @csrf
  @if ($edit)
    @method('PUT')
  @endif
  <div class="row">
    @if ($create)
      <x-auth-fields admin />
    @endif
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input name="name" label="Nombre" placeholder="Introduce el nombre..." :value="$patient?->name" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input name="surname" label="Apellido" placeholder="Introduce el apellido..." :value="$patient?->surname" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input name="ci" label="Cédula de identidad" type="number"
          placeholder="Introduce el número de cédula..." :value="$patient?->ci" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <label class="form-label" for="phone">Teléfono</label>
        <div class="input-group">
          <select class="form-select input-group-text code-select" name="code" id="code">
            @foreach ($codes as $code)
              <option @if ($code === $patient?->code ?? old('code')) selected @endif value="{{ $code }}">
                {{ $code }}</option>
            @endforeach
          </select>
          <x-input type="number" name="phone" placeholder="Introduce el teléfono..." :value="$patient?->number" />
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input type="date" name="birth" label="Fecha de nacimiento"
          placeholder="Introduce el fecha de nacimiento..." :value="$patient?->birth" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-select label="Sexo" name="gender" :options="$genders" :value="$patient?->gender" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-textarea label="Dirección" name="address" rows="1" placeholder="Introduce la dirección..." :value="$patient?->address" />
      </div>
    </div>
    <div class="col-lg-12 d-flex gap-2 mt-3">
      <button type="submit" class="btn btn-success">{{ $title }} paciente</button>
      <a href="{{ route('patients.index') }}" class="btn btn-light">Volver al listado</a>
    </div>
  </div>
</form>
