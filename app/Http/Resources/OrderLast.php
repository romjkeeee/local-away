<?php

namespace App\Http\Resources;

use App\Box;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderLast extends JsonResource
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
            'user_id' => $this->user_id,
            'sum' => $this->sum,
            'products' => ProductCollection::make($this->order_products) ?? [],
            'quiz' => $this->quiz ?? [],
            'travel_box_price' => Box::query()->first(),
            'address_id' => $this->address_id,
//            'quiz_products' => $this->status_id == 5 ? ProductCollection::make($this->quiz_products) : [],
            'created_at' => $this->created_at
        ];
    }
}
