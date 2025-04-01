<x-layouts.app :title="'Ayuda - ' . $video->name"
  :breadcrumbs="['Ayuda', 'Ayuda - '.$video->name]"
>
  <p>{{ $video->description }}</p>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-10">
        <video style="height: 28rem" controls>
          <source src="{{ asset("videos/{$video->slug}.mp4") }}" type="video/mp4">
        </video>
      </div>
    </div>
  </div>
</x-layouts.app>
