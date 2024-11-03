@props(['label' => null, 'name', 'placeholder', 'type' => 'text', 'value' => null])

@php
  $value = $value ?? old($name) ?? '';
@endphp

@if ($label)
<label class="form-label" for="{{ $name }}">
  {{ $label }}
</label>
@endif
<input {{ $attributes }} @class(['form-control', 'is-invalid' => $errors->get($name) ]) id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}" value="{{ $value }}">
@error($name)
  <p class="invalid-feedback">
    {{ $message }}
  </p>
@enderror
