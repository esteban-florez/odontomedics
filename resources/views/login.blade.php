<x-layouts.auth>

<h2 class="mt-3 text-center">Iniciar Sesión</h2>
<p class="text-center">Introduce tu correo eletrónico y contraseña.</p>
<form class="mt-4">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group mb-3">
        <label class="form-label text-dark" for="email">
          Correo Electrónico
        </label>
        <input class="form-control" id="email" name="email" type="email" placeholder="Introduce tu correo...">
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group mb-3">
        <label class="form-label text-dark" for="password">
          Contraseña
        </label>
        <input class="form-control" id="password" name="password" type="password" placeholder="Introduce tu contraseña...">
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
