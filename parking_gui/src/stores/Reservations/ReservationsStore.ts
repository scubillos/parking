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

    toggleModal(): boolean {
      this.modalForm = !this.modalForm;
      return this.modalForm;
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

    async show(): Promise<void> {
      const response = await
    }
  }
});
