<x-layouts.app title="Ayuda" :breadcrumbs="['Inicio', 'Ayuda']" :container="false">
  <p class="alert alert-info mx-4 mt-4">¿Tienes alguna duda? Aquí tienes algunos tutoriales acerca del funcionamiento del sistema:</p>
  <div class="container">
    <div class="row">
      @foreach ($videos as $video)
      <div class="col-6">
        <div class="card w-100">
          <div class="card-body">
            <h5 class="card-title">{{ $video->name }}</h5>
            <p class="card-text">{{ $video->description }}</p>
            <a href="{{ route('help.show', $video->slug) }}" class="btn btn-primary">
              Ver tutorial
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</x-layouts.app>
