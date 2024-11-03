<x-layouts.app title="Editar Insumo" :breadcrumbs="['Insumos', $product->name, route('products.edit', $product) => 'Editar Insumo']">

<x-product-form type="edit" :product="$product" />

</x-layouts.app>
