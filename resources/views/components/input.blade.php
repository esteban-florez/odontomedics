@props(['label', 'name', 'placeholder', 'type' => 'text', 'value' => null])

<label class="form-label" for="{{ $name }}">
  {{ $label }}
</label>
<input @class(['form-control', 'is-invalid' => $errors->get($name) ]) id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}" @if($value)value="{{ $value }}" @endif>
@error($name)
  <p class="invalid-feedback">
    {{ $message }}
  </p>
@enderror
