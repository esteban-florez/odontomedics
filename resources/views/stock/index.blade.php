<x-layouts.app title="Estado de Inventario" :breadcrumbs="['Inventario', route('stock.index') => 'Estado de Inventario']">

<x-stock-table :products="$products" />

</x-layouts.app>
