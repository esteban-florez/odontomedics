<x-layouts.app title="Editar Tipo de Tratamiento" :breadcrumbs="['Tratamientos', 'Tipos de Tratamiento', $treatment->name, route('treatments.edit', $treatment) => 'Editar Tipo de Tratamiento']">

<x-treatment-form type="edit" :treatment="$treatment" />

</x-layouts.app>
