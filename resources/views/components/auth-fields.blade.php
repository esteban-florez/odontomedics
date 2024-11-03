@props(['admin' => false])

@php
  $class = $admin ? 'col-lg-6' : 'col-lg-12';
@endphp

<div class="{{ $class }}">
  <div class="form-group mb-3">
    <x-input type="email" name="email" label="Correo Eletrónico" placeholder="Introduce tu correo..." />
  </div>
</div>
<div class="{{ $class }}">
  <div class="form-group mb-3">
    <x-input type="password" name="password" label="Contraseña" placeholder="Introduce tu contraseña..." />
  </div>
</div>
