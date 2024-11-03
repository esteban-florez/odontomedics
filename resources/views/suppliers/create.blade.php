<x-layouts.app title="Registrar Proveedor" :breadcrumbs="['Proveedores', route('suppliers.create') => 'Registrar Proveedor']">

<x-supplier-form :codes="$codes" type="create" />

</x-layouts.app>
