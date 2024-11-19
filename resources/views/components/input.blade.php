@props(['label' => null, 'optional' => false])

@php
  $name = $attributes->get('name');
  $id = $attributes->has('id') ? $attributes->get('id') : $name;
  $error = $errors->get($name);

  $merge = ['id' => $name];

  if (!$optional) {
    $merge['required'] = true;
  }

  $attributes = $attributes
    ->class(['form-control', 'is-invalid' => $error])
    ->merge($merge);
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
