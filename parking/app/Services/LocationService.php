<?php

namespace App\Services;

use DB;
use App;
use App\Models\Location;

class LocationService
{

    public function getAvailableLocations($date,$schedule)
    {
        $reservations = Location::select('locations.id')
            ->join('vehicle_ins', 'locations.id', '=', 'vehicle_ins.location_id')
            ->where('schedule_day', $date)
            ->whereIn("schedule",[$schedule, "day"])
            ->get();
        $reservationArray = $reservations->map(
            function($reservation, $key) {
                return $reservation->id;
            }
        );
        return Location::whereNotIN("id",$reservationArray)->get() ;
    }

}
