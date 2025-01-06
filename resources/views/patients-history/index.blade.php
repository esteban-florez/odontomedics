@php
  $name = $patient->fullname;
  $title = "$name - Historial Clínico";
@endphp

<x-layouts.app :title="$title" :breadcrumbs="['Pacientes', route('patients.show', $patient) => $name, route('patients.history', $patient) => 'Historial Clínico']">

@push('css')
  <link rel="stylesheet" href="{{ asset('timeline.css') }}">
@endpush

<section class="p-5">
  <ul class="timeline-with-icons">
    
    @foreach ($history as $appointment)
      @php
        $procedure = $appointment->procedure;
        $icon = $procedure ? 'thermometer' : 'calendar';
        $class = $procedure ? 'icon-red' : 'icon-blue';
        $date = $appointment->date->locale('es')
          ->translatedFormat('l, j \d\e F \d\e Y');

        $treatment = $procedure?->treatment?->name;

        $completed = $procedure?->finished_at?->equalTo($appointment->datetime);

        $title = $procedure 
          ? "Tratamiento: {$treatment}"
          : "Consulta: $appointment->diagnosis";
      @endphp
          {{-- historial clinico
        - citas completadas
          - fecha y hora
          - doctor
          - diagnostico
        - procedures (si la cita lo posee, se muestra en vez de la cita)
          - description
          - finished_at
          - treatment --}}
      <li class="timeline-item mb-5">
        <span class="timeline-icon {{ $class }}">
          <i data-feather="{{ $icon }}"></i>
        </span>
    
        <h4 class="fw-bold text-dark pt-2">{{ $title }}</h4>
        <p class="text-muted mb-2 fw-bold">{{ $date }}</p>
        @if ($procedure)
          <p>Se {{ $completed ? 'completó' : 'realizó un progreso en' }} el tratamiento de "<b>{{ $treatment }}</b>", debido al diagnóstico de "<b>{{ $appointment->diagnosis }}</b>" del paciente. Este tratatamiento fue realizado por Dr(a). <b>{{ $appointment->doctor->fullname }}</b>.</p>

          <p>Descripción del tratamiento: {{ $procedure->description }}</p>
        @else
          <p>Se realizó un diagnóstico de "<b>{{ $appointment->diagnosis }}</b>". Este diagnóstico fue realizado por Dr(a). <b>{{ $appointment->doctor->fullname }}</b>.</p>
        @endif
        <p></p>
      </li>
    @endforeach
  </ul>
</section>

</x-layouts.app>
