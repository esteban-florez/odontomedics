<x-layouts.auth :onboarding="$onboarding">

@php
  $route = $onboarding ? route('register.store') : route('onboard.store');
@endphp

<h2 class="mt-3 text-center">Regístrate</h2>
<form action="{{ $route }}" method="POST" class="@if($onboarding)pb-4 px-4 @else mt-4 @endif">
  @csrf
  <div class="row">
    @if (!$onboarding)
      <x-auth-fields />
    @else
      <div class="col-lg-12">
        <p>
          Hola <span class="fw-medium">{{ session('email') }}</span>. Para ofrecerte la mejor experiencia necesitamos que introduzcas tus datos. ¿No eres <span class="fw-medium">{{ session('email') }}</span>?
          <a class="text-danger" href="javascript:void(0)" data-reset>
            Regístrate con otro correo
          </a>
        </p>
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
          <x-input name="ci" label="Cédula de identidad" type="number" placeholder="Introduce tu número de cédula..." />
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group mb-3">
          <label class="form-label" for="phone">Teléfono</label>
          <div class="input-group">
            <select class="form-select input-group-text code-select" name="code" id="code">
              @foreach ($codes as $code)
                <option @if($code === old('code'))selected @endif value="{{ $code }}">{{ $code }}</option>
              @endforeach
            </select>
            <x-input type="number" name="phone" placeholder="Introduce tu teléfono..." />
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group mb-3">
          <x-input type="date" name="birth" label="Fecha de nacimiento" placeholder="Introduce tu fecha de nacimiento..." />
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group mb-3">
          <x-select label="Sexo" name="gender" :options="$genders" />
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group mb-3">
          <x-textarea label="Dirección" name="address" rows="1" placeholder="Introduce tu dirección..." />
        </div>
      </div>
    @endif
    <div class="col-lg-12 text-center">
      <button type="submit" class="btn w-100 btn-dark">Regístrate</button>
    </div>
    <div class="col-lg-12 text-center mt-4">
      ¿Ya posees una cuenta? <a href="{{ route('login') }}" class="text-danger">Inicia Sesión</a>
    </div>
  </div>
</form>
<form id="onboard-reset" method="POST" action="{{ route('onboard.destroy') }}">
  @csrf @method('DELETE')
</form>

</x-layouts.auth>
