@props(['admin' => false, 'confirmation' => true])

@php
  $class = $admin ? 'col-lg-6' : 'col-lg-12';
@endphp

<div class="{{ $class }}">
  <div class="form-group mb-3">
    <x-input type="email" name="email" label="Correo Electrónico" placeholder="Introduce el correo..." />
  </div>
</div>
<div class="{{ $class }}">
  <div class="form-group mb-3">
    <x-input type="password" name="password" label="Contraseña" placeholder="Introduce la contraseña..." />
  </div>
</div>
@if ($confirmation)
  <div class="{{ $class }}">
    <div class="form-group mb-3">
      <x-input type="password" name="password_confirmation" label="Confirmar contraseña"
        placeholder="Vuelve a introducir la contraseña..." />
    </div>
  </div>
@endif
