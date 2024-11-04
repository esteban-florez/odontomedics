@php
  $title = $appointment->status === Status::Completed 
    ? 'Editar cita' : 'Completar cita';
@endphp

<x-layouts.app :title="$title" :breadcrumbs="['Citas', route('appointments.update') => $title]">

  // diagnostico
  // procedimiento
    if nuevo
    



</x-layouts.app>
