<x-layouts.pdf title="Citas por Mes" :image="$image">

<h4 class="text-primary bold">Ultimos 12 meses:</h4>
<x-pdf.list :data="$data" />

</x-layouts.pdf>
