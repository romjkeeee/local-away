<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QaShow extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'alias' => $this->alias,
            'name' => $this->city->name ?? 'no name',
            'location_image' => $this->location_image,
            'lead_image' => $this->lead_image,
            'lead_description' => $this->lead_description,
            'lead_lower_image' => $this->lead_lower_image,
            'email' => $this->email
        ];
    }
}
