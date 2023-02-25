<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'plat_number' => $this->plat_number,
            'brand' => $this->name,
            'type' => $this->type,
            'customer' => $this->customer_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
