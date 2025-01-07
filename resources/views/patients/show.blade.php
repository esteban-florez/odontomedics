<x-layouts.app :title="$patient->fullname" :breadcrumbs="['Pacientes', route('patients.show', $patient) => $patient->fullname]" :container="false">

<x-slot name="rightbar">
  <a href="{{ route('bills.index', ['patient_id' => $patient->id]) }}" class="btn btn-info">
    Historial de facturación
  </a>
</x-slot>

<div class="container-fluid">
  <div class="row">
    <div class="col-6">
      <x-section>
        <h4 class="text-primary fw-bold">Datos del Paciente</h4>
        <div class="d-flex justify-content-between mb-3">
          <div class="w-50">
            <p class="mb-0">Sexo: </p>
            <p class="fw-bold mb-1">{{ $patient->gender }}</p>
          </div>
          <div class="w-50">
            <p class="mb-0">Cédula: </p>
            <p class="fw-bold mb-1">{{ $patient->cedula }}</p>
          </div>
        </div>
        <div class="d-flex justify-content-between mb-3">
          <div class="w-50">
            <p class="mb-0">Teléfono: </p>
            <p class="fw-bold mb-1">{{ $patient->phone }}</p>
          </div>
          <div class="w-50">
            <p class="mb-0">Nacimiento: </p>
            <p class="fw-bold mb-1">{{ $patient->birth->format('d/m/Y') }}</p>
          </div>
        </div>
        <p class="mb-0">Dirección: </p>
        <p class="fw-bold mb-1">{{ $patient->address }}</p>
      </x-section>
    </div>
    <div class="col-6">
      <x-section>
        <h4 class="text-primary fw-bold">Resumen de Historial Clínico</h4>
        <div class="d-flex flex-column gap-2">
          @forelse ($appointments as $appointment)
            <div class="bg-dark text-white p-2 rounded-4">
              <p class="fw-medium mb-0">
                {{ $appointment->date->format('d/m/Y') }} a las {{ $appointment->time->format('H:i A')}}
              </p>
              <p class="mb-0 fs-6">
                Diagnóstico: {{ $appointment->diagnosis }}
              </p>
              <p class="mb-0 fs-6">
                Doctor: {{ $appointment->doctor->fullname }}
              </p>
              @if ($appointment->procedure)
                <p class="mb-0 fs-6">
                  Tratamiento: {{ $appointment->procedure->treatment->name }}
                </p>
              @endif
            </div>
          @empty
            <p class="text-neutral">
              Este paciente aún no posee historial clínico.
            </p>
          @endforelse
          <a class="text-decoration-underline text-center mt-2" href="{{ route('patients.history', $patient) }}">
            Ver todo el historial clínico
          </a>
        </div>
      </x-section>
    </div>
  </div>
</div>
  

</x-layouts.app>
  