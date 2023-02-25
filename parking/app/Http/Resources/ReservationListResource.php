<?php
namespace App\Http\Resources;

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
        return [
            'id' => $this->id,
			'location_id' => $this->location->id,
            'plat' => $this->vehicle->plat_number,
            'Marca' => $this->vehicle->name,
            'Schedule' => $this->schedule,
            'Day' => $this->schedule_day,
            'reservation_area' => $this->location->name,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
