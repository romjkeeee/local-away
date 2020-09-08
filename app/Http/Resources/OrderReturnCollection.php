<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderReturnCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'status' => $this->status->name,
            'products' => ProductCollection::make($this->order_products_all) ?? [],
            'quiz' => (count($this->quiz) ? TravelBox::make($this) : ''),
            'created_at' => $this->created_at
        ];
    }
}
