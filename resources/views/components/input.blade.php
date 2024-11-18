@props(['label' => null])

@php
  $name = $attributes->get('name');
  $id = $attributes->has('id') ? $attributes->get('id') : $name;
  $error = $errors->get($name);

  $attributes = $attributes
    ->class(['form-control', 'is-invalid' => $error])
    ->merge(['id' => $name]);
@endphp

@if ($label)
<label class="form-label" for="{{ $id }}">
  {{ $label }}
</label>
@endif
<input {{ $attributes }} />
@error($name)
  <p class="invalid-feedback">
    {{ $message }}
  </p>
@enderror
