<x-layouts.app title="Editar Proveedor" :breadcrumbs="['Proveedores', $supplier->fullname, route('suppliers.edit', $supplier) => 'Editar Proveedor']">

<x-supplier-form :codes="$codes" type="edit" :supplier="$supplier" />

</x-layouts.app>
