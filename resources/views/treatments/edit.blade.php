<x-layouts.app title="Editar Servicio" :breadcrumbs="['Servicios', $treatment->name, route('treatments.edit', $treatment) => 'Editar Servicio']">

<x-treatment-form type="edit" :treatment="$treatment" />

</x-layouts.app>
