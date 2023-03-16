<template>
  <MDBContainer>
    <MDBCard>
      <MDBCardHeader>
        <h5>Listado de reservaciones</h5>
      </MDBCardHeader>
      <MDBCardBody style="margin-bottom: 50px;">
        <div class="d-flex flex-row-reverse mb-3">
          <MDBBtn color="primary"
                  aria-controls="modalForm"
                  @click="newForm()"
          >
            <i class="fas fa-plus"></i>
            Nueva reserva
          </MDBBtn>
        </div>
        <div>
          <MDBTable class="align-middle mb-0 bg-white" responsive hover>
            <thead class="bg-light">
            <tr>
              <th>Placa</th>
              <th>Fecha</th>
              <th>Franja</th>
              <th>Ubicación</th>
              <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="reservation in ReservationsStore.reservation_list">
              <td>{{reservation.plat}}</td>
              <td v-text="reservation.Day" />
              <td v-text="ReservationsStore.transformShedule(reservation.Schedule)" />
              <td v-text="reservation.reservation_area" />
              <td>
                <MDBBtn color="success" size="sm" rounded @click="show(reservation.id)">
                  Editar
                </MDBBtn>
              </td>
            </tr>

            </tbody>
          </MDBTable>
        </div>
      </MDBCardBody>
    </MDBCard>
  </MDBContainer>

  <MDBModal
    size="lg"
    id="modalForm"
    tabindex="-1"
    labelledby="modalForm"
    v-model="ReservationsStore.modalForm"
  >
    <MDBModalHeader>
      <MDBModalTitle> {{ (ReservationsStore.action === 'create') ? 'Crear' : 'Editar' }} Reservación </MDBModalTitle>
    </MDBModalHeader>
    <MDBModalBody>
      <FormReservation />
    </MDBModalBody>
    <MDBModalFooter>
      <MDBBtn color="danger" @click="ReservationsStore.modalForm = false">
        <i class="far fa-times-circle"></i>
        Cerrar
      </MDBBtn>
      <MDBBtn color="primary" @click="save">
        <i class="fas fa-save"></i>
        Guardar
      </MDBBtn>
    </MDBModalFooter>
  </MDBModal>

</template>

<script setup lang="ts">
import {
  MDBTable,
  MDBBtn,
  MDBCard,
  MDBCardHeader,
  MDBCardBody,
  MDBContainer,
  MDBModal,
  MDBModalHeader,
  MDBModalTitle,
  MDBModalBody,
  MDBModalFooter,
} from 'mdb-vue-ui-kit';
import FormReservation from './FormReservation.vue';
import { ref, onMounted } from "vue";
import { useReservationsStore } from "../../stores/Reservations/ReservationsStore";

const ReservationsStore = useReservationsStore();

onMounted(() => {
  ReservationsStore.getAll();
});

const save = async () => {
  if (ReservationsStore.action === 'create') {
    await ReservationsStore.create();
  } else {
    await ReservationsStore.update();
  }
  await ReservationsStore.getAll();
};

const newForm = () => {
  ReservationsStore.action = 'create';
  ReservationsStore.resetForm();
  ReservationsStore.modalForm = true;
};

const show = async (id: number) => {
  await ReservationsStore.show(id);
  ReservationsStore.action = 'edit';
  ReservationsStore.modalForm = true;
  await ReservationsStore.getLocations();
};

</script>

<style scoped>

</style>
