<?php
namespace App\Http\Resources;

use App\Services\VehicleService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationListResource extends JsonResource
{
/**
* Transform the resource into an array.
*
* @return array<string, mixed>
*/
    public function toArray($request): array
    {
        $vehicles = VehicleService::getAll();
        $vehicle = $vehicles->where('id', $this->vehicle_id)->first();

        return [
            'id' => $this->id,
			'location_id' => '',//$this->location->id,
            'plat' => $vehicle->plat_number ?? '',
            'Marca' => $vehicle->name ?? '',
            'Schedule' => $this->schedule,
            'Day' => $this->schedule_day,
            'reservation_area' => '',//$this->location->name,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
