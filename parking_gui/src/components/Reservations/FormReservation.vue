<template>
  <form>
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <MDBRow class="mb-4">
      <MDBCol col="4">
        <label>Placa</label>
        <input
          class="form-control"
          type="text"
          id="form_plat_number"
          v-model="ReservationsStore.form.plat_number"
        />
      </MDBCol>
    </MDBRow>
    <MDBRow>

      <MDBCol>
        <label>Fecha de reserva</label>
        <input
          class="form-control"
          type="date"
          id="form_schedule_day"
          v-model="ReservationsStore.form.schedule_day"
        />
      </MDBCol>

      <MDBCol>
        <label>Franja</label>
        <select
          aria-label="Franja"
          class="form-control"
          id="form_schedule"
          v-model="ReservationsStore.form.schedule"
        >
          <option v-for="schedule in ReservationsStore.schedules" :value="schedule.id" v-text="schedule.text" />
        </select>
      </MDBCol>
      <MDBCol>
        <label>Ubicación</label>
        <select
          aria-label="Franja"
          class="form-control"
          id="form_location_id"
          v-model="ReservationsStore.form.location_id"
        >
          <option v-for="location in ReservationsStore.locations" :value="location.id" v-text="location.text" />
        </select>
      </MDBCol>
    </MDBRow>

  </form>
</template>

<script setup lang="ts">
import {
  MDBRow,
  MDBCol,
} from "mdb-vue-ui-kit";
import { useReservationsStore } from "../../stores/Reservations/ReservationsStore";
import { onMounted } from "vue";
const ReservationsStore = useReservationsStore();

onMounted(() => {
  ReservationsStore.getLocations();
  ReservationsStore.getSchedules();
});

</script>

<style scoped>

</style>
