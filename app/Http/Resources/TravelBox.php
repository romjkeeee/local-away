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
        $box = Box::query()->first();
        $box['price'] = $this->price;
$cost =  json_decode($this->costs, true);
        $quiz_price_to = $cost['all_cost_to'];
        return [
            'travel_box' => $box,
            'travel_box_cost_to' => $quiz_price_to,
            'products' => $this->status_id >= 7 ? ProductCollection::make($this->quiz_products) : [],
        ];
    }
}
