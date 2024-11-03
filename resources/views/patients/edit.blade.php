<x-layouts.app title="Editar Paciente" :breadcrumbs="['Pacientes', $patient->fullname, route('patients.create') => 'Editar Paciente']">

<x-patient-form :codes="$codes" :genders="$genders" type="edit" :patient="$patient" />

</x-layouts.app>
