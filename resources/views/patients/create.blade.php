<x-layouts.app title="Registrar Paciente" :breadcrumbs="['Pacientes', route('patients.create') => 'Registrar Paciente']">

<x-patient-form :codes="$codes" :genders="$genders" type="create" />

</x-layouts.app>
