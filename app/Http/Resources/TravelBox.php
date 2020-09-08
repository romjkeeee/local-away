<?php

namespace App\Http\Resources;

use App\Box;
use Illuminate\Http\Resources\Json\JsonResource;

class TravelBox extends JsonResource
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
            'travel_box' => Box::query()->first(),
            'products' => $this->status_id >= 5 ? ProductCollection::make($this->quiz_products) : [],
        ];
    }
}
