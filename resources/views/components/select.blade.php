@props(['label' => null, 'name', 'default' => true, 'options', 'value' => null])

@php
  $value = $value ?? old($name);
@endphp

@if ($label)
  <label class="form-label" for="{{ $name }}">Sexo</label>
@endif
<select class="form-select @error($name)is-invalid @enderror" name="{{ $name }}" id="{{ $name }}">
  @if ($default)
    <option value="" @if (!old($name)) selected @endif>
      Seleccionar...
    </option>
  @endif
  @foreach ($options as $option)
  @php
    $id = $option->id;
    $label = $option->label;
  @endphp
    <option @if ($id === $value ?? old($name)) selected @endif value="{{ $id }}">
      {{ $label }}
    </option>
  @endforeach
</select>
@error($name)
  <p class="invalid-feedback">{{ $message }}</p>
@enderror
