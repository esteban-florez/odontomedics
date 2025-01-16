<x-layouts.pdf title="Ingresos por Servicio" :image="$image">

<x-slot name="css">
  <link rel="stylesheet" href="{{ asset('pdf-table.css') }}">
</x-slot>

<h4 class="text-primary bold">Lista de ingresos por servicio:</h4>
<x-pdf.list :data="$data" />

</x-layouts.pdf>
