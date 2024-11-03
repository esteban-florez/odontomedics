<x-layouts.app title="Editar Doctor" :breadcrumbs="['Doctores', $doctor->fullname, route('doctors.edit', $doctor) => 'Editar Doctor']">

<x-doctor-form :specialties="$specialties" type="edit" :doctor="$doctor" />

</x-layouts.app>