<x-layouts.app title="Registrar Paciente" :breadcrumbs="['Pacientes', route('patients.create') => 'Registrar Paciente']">

<form action="{{ route('patients.store') }}" method="POST">
  @csrf
  <div class="row">
    <x-auth-fields admin />
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input type="password" name="password_confirmation" label="Confirmar contraseña"
          placeholder="Vuelve a introducir tu contraseña..." />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input name="name" label="Nombre" placeholder="Introduce tu nombre..." />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input name="surname" label="Apellido" placeholder="Introduce tu apellido..." />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input name="ci" label="Cédula de identidad" type="number"
          placeholder="Introduce tu número de cédula..." />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <label class="form-label" for="phone">Teléfono</label>
        <div class="input-group">
          <select class="form-select input-group-text code-select" name="code" id="code">
            @foreach ($codes as $code)
              <option @if ($code === old('code')) selected @endif value="{{ $code }}">
                {{ $code }}</option>
            @endforeach
          </select>
          <x-input type="number" name="phone" placeholder="Introduce tu teléfono..." />
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input type="date" name="birth" label="Fecha de nacimiento"
          placeholder="Introduce tu fecha de nacimiento..." />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-select label="Sexo" name="gender" :options="$genders" />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-textarea label="Dirección" name="address" rows="1" placeholder="Introduce tu dirección..." />
      </div>
    </div>
    <div class="col-lg-12 d-flex gap-2 mt-3">
      <button type="submit" class="btn btn-success">Registrar paciente</button>
      <a href="{{ route('patients.index') }}" class="btn btn-light">Volver al listado</a>
    </div>
  </div>
</form>

</x-layouts.app>
