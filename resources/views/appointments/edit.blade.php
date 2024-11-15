@php
  use App\Enums\Status;
  $verb = $appointment->status === Status::Completed ? 'Editar' : 'Completar';

  $title = "$verb cita";
@endphp

<x-layouts.app :title="$title" :breadcrumbs="['Citas', route('appointments.edit', $appointment) => $title]" :container="false">

  <div class="container-fluid">
    <form style="display: contents" method="POST" action="{{ route('appointments.update', $appointment) }}"
      id="complete-appointment-form">
      @csrf @method('PATCH')
      <x-section :margin="false">
        <h4 class="text-dark fw-medium h4 text-center">Datos de la cita</h4>
        <div class="row mt-4">
          <div class="col-lg-6">
            <div class="form-group mb-3">
              <x-select label="Diagnóstico" name="diagnosis" :options="$diagnoses" :value="$appointment->diagnosis" />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3">
              <x-select label="Tratamiento (opcional)" name="treatment_id" :options="$procedures" :value="$appointment->procedure?->id">
                <option value="new">Crear nuevo tratamiento</option>
              </x-select>
            </div>
          </div>
        </div>
        <div class="col-lg-12 d-flex gap-2 mt-3">
          <button type="submit" class="btn btn-success">{{ $title }}</button>
          <a href="{{ route('doctors.index') }}" class="btn btn-light">Volver al listado</a>
        </div>
      </x-section>
      <x-section>
        <div class="col-lg-12">
          <h4 class="text-dark fw-medium h4 text-center">Datos del tratamiento</h4>
          <div class="row mt-4">
            <div class="col-lg-6">
              <x-input label="Descripción" name="description" placeholder="Introduce la descripción..." />
            </div>
            <div class="col-lg-6">
              <x-select label="Estado de progreso" name="status" :default="false">
                <option value="active">En curso</option>
                <option value="finished">Finalizado</option>
              </x-select>
            </div>
          </div>
        </div>
      </x-section>
      <x-section>
        <div class="col-lg-12">
          <h4 class="text-dark fw-medium h4 text-center mb-3">Insumos del tratamiento</h4>
          <div class="row mt-4 justify-content-center">
            <div class="col-lg-4 d-flex align-items-center gap-2">
              Insumo:
              <x-select name="products" :options="$products" />
            </div>
            <div class="col-lg-4 d-flex align-items-center gap-2">
              Cantidad:
              <x-input name="amount" placeholder="Ej. 2" />
            </div>
            <div class="col-lg-3">
              <button class="btn btn-success w-100">
                Añadir insumo
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-12 mt-3">
          <div class="table-responsive">
            <table class="table border">
              <thead>
                <tr>
                  <th scope="col">Insumo</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Costo</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Guantes</td>
                  <td>2</td>
                  <td>20</td>
                  <td class="d-flex align-items-center gap-1">
                    <a href="#" class="btn btn-sm btn-danger">Remover</a>
                  </td>
                </tr>
                <tr>
                  <td class="text-center" colspan="4">No se ha añadido ningún insumo.</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </x-section>
    </form>
  </div>


</x-layouts.app>
