@props(['label' => null, 'name', 'value' => null, 'placeholder', 'rows' => 2])

@if ($label)
  <label class="form-label" for="{{ $name }}">Dirección</label>
@endif
<textarea {{ $attributes }} class="form-control @error($name)is-invalid @enderror" name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}"
  placeholder="Introduce la dirección...">{{ $value ?? old($name) ?? '' }}</textarea>
@error('address')
  <p class="invalid-feedback">{{ $message }}</p>
@enderror
