<x-layouts.pdf title="Ingresos Mensuales y Anuales" :image="$image">

<x-row class="align-top">
  <td class="pe-4 w-50 align-top">
    <h4 class="text-primary bold">Ultimos 12 meses:</h4>
    <x-pdf.list :data="$monthly" />
  </td>
  <td class="ps-4 w-50 align-top">
    <h4 class="text-primary bold">Ingresos por año:</h4>
    <x-pdf.list :data="$yearly" />
  </td>
</x-row>

</x-layouts.pdf>
