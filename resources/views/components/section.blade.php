@props([])

<div {{ $attributes->class(['row']) }}>
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        {{ $slot }}
      </div>
    </div>
  </div>
</div>
