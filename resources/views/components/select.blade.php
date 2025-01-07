@props(['label' => null, 'default' => true, 'options' => [], 'value' => null, 'optional' => false])

@php
  logger($value);
  $name = $attributes->get('name');
  $id = $attributes->has('id') ? $attributes->get('id') : $name;
  $error = $errors->get($name);

  $merge = ['id' => $name];

  if (!$optional) {
    $merge['required'] = true;
  }

  $attributes = $attributes
    ->class(['form-select', 'is-invalid' => $error])
    ->merge($merge);
@endphp

@if ($label)
  <label class="form-label" for="{{ $name }}">{{ $label }}</label>
@endif
<select {{ $attributes }}>
  @if ($default)
    <option value="" @selected($value === '')>
      {{ $default === true ? 'Seleccionar...' : $default }}
    </option>
  @endif
  {{ $slot }}
  @foreach ($options as $option)
  @php
    $id = $option->id;
  @endphp
    <option @selected($value === $id) value="{{ $id }}">
      {{ $option->label }}
    </option>
  @endforeach
</select>
@error($name)
  <p class="invalid-feedback">{{ $message }}</p>
@enderror
