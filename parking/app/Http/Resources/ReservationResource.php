<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
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
            'plat_number' => $this->vehicle->plat_number,
            'schedule' => $this->schedule,
            'schedule_day' => $this->schedule_day,
            'status' => $this->status,
        ];
    }
}
