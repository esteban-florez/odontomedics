@props(['label', 'name', 'placeholder', 'type' => 'text'])

<label class="form-label" for="{{ $name }}">
  {{ $label }}
</label>
<input @class(['form-control', 'is-invalid' => $errors->get($name) ]) id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}">
@error($name)
  <p class="invalid-feedback">
    {{ $message }}
  </p>
@enderror
