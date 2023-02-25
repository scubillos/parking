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
          v-model="form.plat_number"
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
          v-model="form.schedule_day"
        />
      </MDBCol>

      <MDBCol>
        <label>Franja</label>
        <select
          aria-label="Franja"
          class="form-control"
          id="form_schedule"
          v-model="form.schedule"
        >
          <option v-for="schedule in schedules" :value="schedule.id" v-text="schedule.text" />
        </select>
      </MDBCol>
      <MDBCol>
        <label>Ubicación</label>
        <select
          aria-label="Franja"
          class="form-control"
          id="form_location_id"
          v-model="form.location_id"
        >
          <option v-for="location in locations" :value="location.id" v-text="location.text" />
        </select>
        <!--<Select2 v-model="form.location_id"
                 :options="locations"
        />-->
      </MDBCol>
    </MDBRow>

  </form>
</template>

<script setup lang="ts">
import {
  MDBRow,
  MDBCol,
  MDBInput,
  MDBCheckbox,
  MDBTextarea,
} from "mdb-vue-ui-kit";
import { ref } from "vue";

const form = ref({
  location_id: null,
  plat_number: '',
  schedule: '',
  schedule_day: '',
  created_by: null
});

const locations = ref([
  { id: 1, text: 'Bloque A - 10' },
  { id: 2, text: 'Bloque B - 33' }
]);

const schedules = ref([
  { id: 'morning', text: 'Mañana' },
  { id: 'afternoon', text: 'Tarde' },
  { id: 'day', text: 'Día completo' },
])
</script>

<style scoped>

</style>
