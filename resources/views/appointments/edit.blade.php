@php
  use App\Enums\Status;
  $verb = $appointment->status === Status::Completed ? 'Editar' : 'Completar';

  $title = "$verb cita";
@endphp

<x-layouts.app :title="$title" :breadcrumbs="['Citas', route('appointments.edit', $appointment) => $title]" :vite="['products.js']" :container="false">

<div class="container-fluid" id="products">
  <form class="contents" method="POST" action="{{ route('appointments.update', $appointment) }}"
    id="complete-appointment-form">
    @csrf @method('PATCH')
    <x-section :margin="false">
      <h4 class="text-dark fw-medium h4 text-center">Datos de la cita</h4>
      <div class="row mt-4">
        <div class="col-lg-6">
          <div class="form-group mb-3">
            <x-select label="Diagnóstico" name="diagnosis" :options="$diagnoses" :value="$appointment->diagnosis" default="Sin diagnóstico" />
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group mb-3">
            <x-select label="Tratamiento" name="treatment_id" :options="$procedures" :value="$appointment->procedure?->id" default="Sin tratamiento" v-model="treatment">
              <option value="new">Crear nuevo tratamiento</option>
            </x-select>
          </div>
        </div>
      </div>
      <div class="col-lg-12 d-flex gap-2 mt-3" v-if="!newTreatment">
        <button type="submit" class="btn btn-success">{{ $title }}</button>
        <a href="{{ route('doctors.index') }}" class="btn btn-light">Volver al listado</a>
      </div>
    </x-section>
    <x-section v-if="newTreatment">
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
    <x-section v-if="newTreatment">
      <div class="col-lg-12">
        <h4 class="text-dark fw-medium h4 text-center mb-3">Insumos del tratamiento</h4>
        <div class="row mt-4 justify-content-center">
          <div class="col-lg-4 d-flex align-items-center gap-2">
            Insumo:
            <x-select v-model="productId">
              <option v-for="product of available" :value="product.id">
                @{{ product.name }}
              </option>
            </x-select>
          </div>
          <div class="col-lg-4 d-flex align-items-center gap-2">
            Cantidad:
            <x-input type="number" placeholder="Ej. 2" v-model.number="amount" />
          </div>
          <div class="col-lg-3">
            <button @click="add" type="button" class="btn btn-success w-100" :class="{ 'btn-disabled': disabled }" :disabled="disabled">
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
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            @verbatim
              <tbody v-if="items.size > 0">
                <tr v-for="item of items.values()" :key="item.id">
                  <td>{{ item.name }}</td>
                  <td>${{ item.price }}</td>
                  <td>{{ item.amount }}</td>
                  <td>${{ (item.price * item.amount).toFixed(2) }}</td>
                  <td class="d-flex align-items-center gap-1">
                    <button type="button" @click="remove(item.id)" class="btn btn-sm btn-danger">
                      Remover
                    </button>
                  </td>
                </tr>
              </tbody>
              <tbody v-else>
                <tr>
                  <td class="text-center" colspan="5">No se ha añadido ningún insumo.</td>
                </tr>
              </tbody>
            @endverbatim
          </table>
        </div>
      </div>
      <div class="col-lg-12 d-flex gap-2 mt-3" v-if="newTreatment">
        <button type="submit" class="btn btn-success">{{ $title }}</button>
        <a href="{{ route('doctors.index') }}" class="btn btn-light">Volver al listado</a>
      </div>
    </x-section>
  </form>
</div>

</x-layouts.app>
