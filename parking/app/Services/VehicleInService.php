<?php

namespace App\Services;

use DB;
use App;
use App\Models\VehicleIn;
use App\Models\Vehicle;
use App\Models\Location;

class VehicleInService
{
    /**
     * GeoZone validation rules.
     *
     * @return array
     */
    public static function reservationRules()
    {
        return [
            "location_id" =>"required",
            "schedule" => "required|in:day,morning,afternoon",
            "schedule_day" => "required|date",
            "plat_number" => "required|regex:/(^[A-Z]{3,4}\d{2,3}$)/u",
            "created_by" => "required|numeric"
        ];


    }

    /**
     * GeoZone validation rules.
     *
     * @return array
     */
    public static function reservationUpdateRules()
    {
        return [
            "schedule" => "in:day,morning,afternoon",
            "schedule_day" => "date",
            "plat_number" => "regex:/(^[A-Z]{3,4}\d{2,3}$)/u",
            "created_by" => "numeric"
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function reservation(array $data)
    {
        $vehicle = Vehicle::where("plat_number", $data['plat_number'])->first();
        unset($data["plat_number"]);
        $data["vehicle_id"] = $vehicle->id;
        $available = $this->isAvailable($data,$vehicle->type);
        $hasReservation = $this->hasReservation($data);
        if($available['value'] && $hasReservation['value']) {
            $reservation = new VehicleIn($data);
            $reservation->save();
            return [
                "Reservation number" => $reservation->id,
                $data,
            ];
        }
        return [
            "message" => $available['message'] . $hasReservation['message'],
            $data,
        ];

    }

    /**
     * @param array $data
     * @return mixed
     */
    public function reservationUpdate(array $data,$id)
    {
        $reservation = VehicleIn::find($id);
        $vehicle = Vehicle::find($reservation->vehicle_id);
        $available = $this->isAvailable($reservation->toArray(),$vehicle->type);
        if($available['value']) {
            $reservation->update($data);
            return [
                $data
            ];
        }
        return [
            "message" => $available['message'],
            $data,
        ];
    }

    private function isAvailable(array $data, $type){

        $location = Location::find($data['location_id']);

        if ($location->type == $type && $location->status > 0) {
            $reservations = VehicleIn::where('location_id', $data['location_id'])
                ->where('schedule_day', $data['schedule_day'])
                ->get();

            if (isset($reservations)) {
                foreach ($reservations as $reservation) {
                    if (($reservation->schedule == $data['schedule'] ||
                            $reservation->schedule == 'day' ||
                            $data['schedule'] == 'day') &&
                        $reservation->vehicle_id != $data['vehicle_id'])
                        return [
                            'value' => false,
                            'message' => "sin cupo disponible para esa locacion"
                        ];
                }
                return [
                    'value' => true,
                    'message' => ""
                ];
            }
            return [
                'value' => true,
                'message' => ""
            ];
        }
        return [
            'value' => false,
            'message' => "Locacion no activa o no acepta el tipo de vehiculo"
        ];
    }

    private function hasReservation(array $data) {

        $reservations = VehicleIn::where('vehicle_id', $data['vehicle_id'])
            ->where('schedule_day', $data['schedule_day'])
            ->first();
        if (!empty($reservations)) {
            return [
                'value' => false,
                'message' => "ya tiene reservacion"
            ];
        }
        return [
            'value' => true,
            'message' => ""
        ];
    }
}
