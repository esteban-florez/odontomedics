<x-layouts.app title="Registrar Doctor" :breadcrumbs="['Doctores', route('doctors.create') => 'Registrar Doctor']">

<x-doctor-form :specialties="$specialties" type="create" />

</x-layouts.app>
