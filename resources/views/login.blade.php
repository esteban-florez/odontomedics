<x-layouts.auth>

<h2 class="mt-3 text-center">Iniciar Sesión</h2>
<p class="text-center">Introduce tu correo eletrónico y contraseña.</p>
<form action="{{ route('auth') }}" method="POST" class="mt-4">
  @csrf
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group mb-3">
        <x-input type="email" name="email" label="Correo Eletrónico" placeholder="Introduce tu correo..." />
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group mb-3">
        <x-input type="password" name="password" label="Contraseña" placeholder="Introduce tu correo..." />
      </div>
    </div>
    <div class="col-lg-12 text-center">
      <button type="submit" class="btn w-100 btn-dark">Iniciar Sesión</button>
    </div>
    <div class="col-lg-12 text-center mt-4">
      ¿Aún no tienes una cuenta? <a href="{{ route('register') }}" class="text-danger">Regístrate</a>
    </div>
  </div>
</form>

</x-layouts.auth>
