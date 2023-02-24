<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
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
            'parking_area' => $this->parking->name,
            'parking_number' => $this->parking_number,
            'type' => $this->type,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
