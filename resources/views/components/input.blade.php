@props(['label' => null, 'name', 'placeholder', 'type' => 'text', 'value' => null])

@if ($label)
  <label class="form-label" for="{{ $name }}">
    {{ $label }}
  </label>
@endif
<input @class(['form-control', 'is-invalid' => $errors->get($name) ]) id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}" @if($value)value="{{ $value ?? old($name) }}" @endif>
@error($name)
  <p class="invalid-feedback">
    {{ $message }}
  </p>
@enderror
