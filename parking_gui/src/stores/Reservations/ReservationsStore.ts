import { defineStore } from "pinia";
import axiosHttp from '../../utils/axios'
import {
  ReservationRow,
  Reservation,
  ReservationsResponse,
  Schedule,
  Location
} from "./ReservationsInterfaces";

export const useReservationsStore = defineStore('reservationsStore', {
  state: () => {
    return {
      action: 'create' as string,
      id_reservation: 0 as number,
      reservation_list: [] as ReservationRow[],
      schedules: [] as Schedule[],
      locations: [] as Location[],
      modalForm: false as boolean,
      form: {} as Reservation
    }
  },

  actions: {
    async getAll(): Promise<void> {
      const response = await axiosHttp.get('/reservations');
      this.reservation_list = response.data.data;
    },

    async getLocations(): Promise<void> {
      const response = await axiosHttp.get('/locations');
      this.locations = [];
      response.data.data.forEach((row) => {
        this.locations.push({
          id: row.id,
          text: `${row.parking_area} ${row.parking_number}`
        });
      });
    },

    getSchedules(): void {
      this.schedules = [
        { id: 'morning', text: 'Mañana' },
        { id: 'afternoon', text: 'Tarde' },
        { id: 'day', text: 'Día completo' },
      ];
    },

    transformShedule(id_schedule: string): string {
      if (this.schedules.length === 0) {
        this.getSchedules();
      }
      let filter = this.schedules.filter((schedule: Schedule) => { return schedule.id === id_schedule });
      return filter[0].text;
    },

    resetForm(): void {
      this.action = 'create';
      this.form = {} as Reservation;
    },

    // Validations
    async vehicleByPlat(plat: string): Promise<boolean> {
      const response = await axiosHttp.get(`/vehicle/plat/${plat}`);
      return plat === response.data.data.plat_number;
    },

    // CRUD
    async create(): Promise<void> {
      const response = await axiosHttp.post('/reservation', this.form);
      if (response.data.message !== undefined) {
        alert("Error " + response.data.message);
      } else {
        alert("Reservacion creada exitosamente");
      }
    },

    async update(): Promise<void> {
      const response = await axiosHttp.put(`/reservation/${this.form.id}`, this.form);
      if (response.data.message !== undefined) {
        alert("Error " + response.data.message);
      } else {
        alert("Reservacion actualizada exitosamente");
      }
    },

    async show(id: number): Promise<void> {
      const response = await axiosHttp.get(`/reservation/${id}`);
      this.form = response.data.data;
    }
  }
});
