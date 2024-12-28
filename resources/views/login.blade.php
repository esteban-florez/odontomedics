<x-layouts.auth>

<h2 class="mt-3 text-center">Iniciar Sesión</h2>
<p class="text-center">Introduce tu correo electrónico y contraseña.</p>
<form action="{{ route('auth') }}" method="POST" class="mt-4">
  @csrf
  <div class="row">
    <x-auth-fields :confirmation="false" />
    <div class="col-lg-12 text-center">
      <button type="submit" class="btn w-100 btn-dark">Iniciar Sesión</button>
    </div>
    <div class="col-lg-12 text-center mt-4">
      ¿Aún no tienes una cuenta? <a href="{{ route('register.create') }}" class="text-danger">Regístrate</a>
    </div>
  </div>
</form>

</x-layouts.auth>
