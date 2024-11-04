<form action="{{ route('appointments.store') }}" method="POST">
  @csrf
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input type="date" name="date" label="Fecha de la cita"
          placeholder="Introduce el fecha de nacimiento..." />
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group mb-3">
        <x-input type="time" name="time" label="Hora de la cita"
          placeholder="Introduce el fecha de nacimiento..." />
      </div>
    </div>
    <div class="col-lg-12 d-flex gap-2 mt-3">
      <button type="submit" class="btn btn-success">
        Agendar cita
      </button>
      <a href="{{ route('appointments.index') }}" class="btn btn-light">
        Ver listado
      </a>
    </div>
  </div>
</form>
