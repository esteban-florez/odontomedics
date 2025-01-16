<x-layouts.app title="Reportes PDF" :breadcrumbs="['Reportes', route('reports') => 'Reportes PDF']" :container="false">

<div class="container-fluid">
  <div class="row">
    <div class="col-6">
      <div class="card border-dark rounded-4">
        <img class="w-100 rounded-top-4" height="150" src="{{ asset('img/pacientes.jpg') }}" class="card-img-top" alt="Imagen de pacientes en clinica" style="object-fit: cover">
        <div class="card-body">
          <h4 class="card-title">Pacientes más activos</h4>
          <p class="card-text">Este reporte muestra cuales son los pacientes más activos dentro del sistema.</p>
          <a href="{{ route('pdf.active-patients') }}" class="btn btn-primary">Ver reporte PDF</a>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card border-dark rounded-4">
        <img class="w-100 rounded-top-4" height="150" src="{{ asset('img/citas.jpg') }}" class="card-img-top" alt="Imagen de pacientes en clinica" style="object-fit: cover">
        <div class="card-body">
          <h4 class="card-title">Citas por mes</h4>
          <p class="card-text">Este reporte la cantidad de citas registradas mensualmente en el sistema.</p>
          <a href="{{ route('pdf.monthly-appointments') }}" class="btn btn-primary">Ver reporte PDF</a>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card border-dark rounded-4">
        <img class="w-100 rounded-top-4" height="150" src="{{ asset('img/ingresos.jpg') }}" class="card-img-top" alt="Imagen de pacientes en clinica" style="object-fit: cover">
        <div class="card-body">
          <h4 class="card-title">Ingresos por servicio</h4>
          <p class="card-text">Este reporte muestra la cantidad de ingresos categorizados por los servicios ofrecidos.</p>
          <a href="{{ route('pdf.treatments-income') }}" class="btn btn-primary">Ver reporte PDF</a>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card border-dark rounded-4">
        <img class="w-100 rounded-top-4" height="150" src="{{ asset('img/inventario.jpg') }}" class="card-img-top" alt="Imagen de pacientes en clinica" style="object-fit: cover">
        <div class="card-body">
          <h4 class="card-title">Stock de insumos</h4>
          <p class="card-text">Este reporte muestra el estado actual del stock de los insumos en el inventario.</p>
          <a href="{{ route('pdf.stock') }}" class="btn btn-primary">Ver reporte PDF</a>
        </div>
      </div>
    </div>
  </div>
</div>

</x-layouts.app>
