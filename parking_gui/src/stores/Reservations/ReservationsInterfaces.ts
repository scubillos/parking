export interface Reservation {
  id?: number;
  location_id: number;
  plat_number: string;
  schedule: string;
  schedule_day: string;
  status?: number;
  created_by: number;
}

export interface ReservationRow {
  id: number;
  Day: string;
  Marca: string;
  Schedule: string;
  created_at: string;
  plat: string;
  reservation_area: string;
  status: number;
  updated_at: string;
}

export interface ReservationsResponse {
  data: object
}

export interface Schedule {
  id: string;
  text: string;
}

export interface Location {
  id: number;
  text: string;
}
