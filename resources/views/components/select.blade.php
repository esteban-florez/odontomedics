@props(['label' => null, 'name', 'default' => true, 'options', 'value' => null])

@php
  $value = $value ?? old($name) ?? '';
@endphp

@if ($label)
  <label class="form-label" for="{{ $name }}">{{ $label }}</label>
@endif
<select {{ $attributes }} class="form-select @error($name)is-invalid @enderror" name="{{ $name }}" id="{{ $name }}">
  @if ($default)
    <option value="" @selected($value === '')>
      Seleccionar...
    </option>
  @endif
  @foreach ($options as $option)
  @php
    $id = $option->id;
    $label = $option->label;
  @endphp
    <option @selected($value === $id) value="{{ $id }}">
      {{ $label }}
    </option>
  @endforeach
</select>
@error($name)
  <p class="invalid-feedback">{{ $message }}</p>
@enderror
