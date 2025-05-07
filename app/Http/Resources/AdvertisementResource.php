<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'type_id' => $this->type_id,
            'type_name' => $this->advertisementType->type,
            'details' => $this->details,
            'status' => $this->status,
            'clicks' => $this->clicks,
        ];
    }
}
