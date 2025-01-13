@props(['data'])

@foreach ($data->rows as $row)
  <x-row class="border border-primary border-bottom-0">
    <td class="p-1">{{ $row->date }}</td>
    <td class="p-1 text-end">{{ $row->income }}</td>
  </x-row>
@endforeach
<x-row class="border border-primary bg-primary text-white bold">
  <td class="p-1">Total</td>
  <td class="p-1 text-end">{{ $data->total }}</td>
</x-row>
