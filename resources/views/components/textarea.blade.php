@props(['label' => null, 'value' => null])

@php
  $name = $attributes->get('name');
  $id = $attributes->has('id') ? $attributes->get('id') : $name;
  $error = $errors->get($name);

  $attributes = $attributes
    ->class(['form-control', 'is-invalid' => $error])
    ->merge(['id' => $name, 'rows' => 2]);
@endphp

@if ($label)
  <label class="form-label" for="{{ $name }}">Dirección</label>
@endif
<textarea {{ $attributes }}>{{ $value ?? old($name) ?? '' }}</textarea>
@error($name)
  <p class="invalid-feedback">{{ $message }}</p>
@enderror
