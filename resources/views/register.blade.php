<x-layouts.auth>

<h2 class="mt-3 text-center">Regístrate</h2>
<form class="mt-4">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group mb-3">
        <label class="form-label text-dark" for="name">
          Nombre y apellido
        </label>
        <input class="form-control" type="text" id="name" name="name" placeholder="Introduce tu nombre...">
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group mb-3">
        <label class="form-label text-dark" for="email">
          Correo Electrónico
        </label>
        <input class="form-control" type="email" id="email" name="email" placeholder="Introduce tu correo...">
      </div>
    </div>
    <div class="col-lg-12">
      <div class="form-group mb-3">
        <label class="form-label text-dark text-left" for="password">
          Contraseña
        </label>
        <input class="form-control" type="password" id="password" name="password" placeholder="Introduce tu contraseña...">
      </div>
    </div>
    <div class="col-lg-12 text-center">
      <button type="submit" class="btn w-100 btn-dark">Regístrate</button>
    </div>
    <div class="col-lg-12 text-center mt-5">
      ¿Ya posees una cuenta? <a href="{{ route('login') }}" class="text-danger">Inicia Sesión</a>
    </div>
  </div>
</form>

</x-layouts.auth>
