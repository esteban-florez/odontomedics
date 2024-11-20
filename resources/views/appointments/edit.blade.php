<x-layouts.app title="Completar cita" :breadcrumbs="['Citas', route('appointments.edit', $appointment) => 'Completar cita']" :vite="['products.js']" :container="false">

@php
  $new = new \stdClass();
  $new->id = 'new';
  $new->label = 'Crear nuevo tratamiento';

  $procedures->prepend($new);
@endphp

<div class="container-fluid" id="products">
  <form class="hidden" id="new-items-form" @submit.prevent="add" :disabled="disabled"></form>
  <form class="contents" method="POST" action="{{ route('appointments.update', $appointment) }}">
    @csrf @method('PATCH')
    <x-section :margin="false">
      <h4 class="text-dark fw-medium text-center">Datos de la cita</h4>
      <div class="row mt-4">
        <div class="col-lg-6">
          <div class="form-group mb-3">
            <x-select label="Diagnóstico" name="diagnosis" :options="$diagnoses" />
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group mb-3">
            <x-select label="Tratamiento" name="procedure_id" :options="$procedures" default="Sin tratamiento" v-model="procedureId" optional />
          </div>
        </div>
      </div>
      <div class="col-lg-12 d-flex gap-2 mt-3" v-if="!newProcedure">
        <button type="submit" class="btn btn-success">
          Completar cita
        </button>
        <a href="{{ route('appointments.index') }}" class="btn btn-light">
          Volver al listado
        </a>
      </div>
    </x-section>
    <x-section v-if="newProcedure">
      <div class="col-lg-12">
        <h4 class="text-dark fw-medium text-center">Datos del tratamiento</h4>
        <div class="row mt-4">
          <div class="col-lg-4">
            <x-select label="Servicio realizado" name="treatment_id" :options="$treatments" v-model.number="treatmentId" />
          </div>
          <div class="col-lg-4">
            <x-select label="Estado de progreso" name="progress" :default="false" :options="$progress" />
          </div>
          <div class="col-lg-4">
            <x-input label="Descripción" name="description" placeholder="Introduce la descripción..." min="2" max="50" />
          </div>
        </div>
      </div>
    </x-section>
    <x-section v-if="newProcedure">
      <div class="col-lg-12">
        <h4 class="text-dark fw-medium text-center mb-3">Insumos del tratamiento</h4>
        <input type="hidden" name="items" :value="itemsJson">
        <div class="row mt-4 justify-content-center">
          <template v-if="available.length > 0">
            <div class="col-lg-4 d-flex align-items-center gap-2">
              Insumo:
              <x-select v-model="productId" name="product" form="new-items-form">
                <option v-for="product of available" :value="product.id">
                  @{{ product.name }}
                </option>
              </x-select>
            </div>
            <div class="col-lg-4 d-flex flex-column gap-1">
              <div class="d-flex align-items-center gap-2">
                Cantidad:
                <x-input type="number" placeholder="Ej. 2" ::max="max" min="1" v-model.number="amount" ::class="{ 'is-invalid': error }" name="amount" form="new-items-form" />
              </div>
              <span class="invalid-feedback d-block mt-n1 w-full text-center" v-if="error">
                Debe ser un número entero entre 1 y @{{ max }}
              </span>
            </div>
            <div class="col-lg-3">
              <button type="submit" class="btn btn-success w-100" :disabled="disabled" form="new-items-form">
                Añadir insumo
              </button>
            </div>
          </template>
          <div class="col-lg-12" v-else>
            <p class="fw-bold text-center">
              No existen más insumos disponibles para añadir.
            </p>
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
                  <td>${{ item.price.toFixed(2) }}</td>
                  <td>{{ item.amount }}</td>
                  <td>${{ item.total.toFixed(2) }}</td>
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
    </x-section>
    <x-section v-if="newProcedure && treatmentId">
      <h4 class="text-dark fw-medium text-center">Factura de la cita</h4>
      <div class="row mt-4">
        <div class="col-lg-6"> 
          <div class="mb-3">
            <p class="form-label">
              Costo de la cita:
            </p>
            @verbatim
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Tratamiento: </span>
                  <span>${{ treatmentPrice.toFixed(2) }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span>Insumos: </span>
                  <span>${{ itemsPrice.toFixed(2) }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                  <span>Total: </span>
                  <span>${{ totalPrice.toFixed(2) }}</span>
                </li>
              </ul>
              <input type="hidden" name="total" :value="totalPrice.toFixed(2)">
            @endverbatim
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group mb-3">
            <x-select label="Método de pago" name="method" :options="$methods" />
          </div>
        </div>
      </div>
      <div class="col-lg-12 d-flex gap-2 mt-3" v-if="newProcedure">
        <button type="submit" class="btn btn-success">
          Completar cita
        </button>
        <a href="{{ route('appointments.index') }}" class="btn btn-light">
          Volver al listado
        </a>
      </div>
    </x-section>
  </form>
</div>

</x-layouts.app>
