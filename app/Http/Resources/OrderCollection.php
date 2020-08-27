<?php

namespace App\Http\Resources;

use App\Product;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Request;

class OrderCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
            $data = [
                'id' => $this->id,
                'user_id' => $this->user_id,
                'sum' => $this->sum,
                'status' => $this->status->name,
                'products' => ($this->status_id == 5 && isset($this->quiz) || !isset($this->quiz)) ? ProductCollection::make($this->order_products) : 'WAIT DELIVERING',
            ];

        return $data;
    }
}
