<?php

namespace App\Http\Resources;

use App\Box;
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
        $price_product = 0;
        if (count($this->quiz_products)) {
            foreach ($this->quiz_products as $product) {
                if ($product->status_id >= 7 && $product->status_id >= 11){
                    $price_product += $product->price;
                }
            }
        }
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'sum' => $this->sum + $price_product ?? 0,
            'status' => $this->status,
            'products' => ProductCollection::make($this->order_products) ?? [],
            'travel_box_price' => Box::query()->first(),
            'quiz' => TravelBox::collection($this->quiz) ?? [],
//            'quiz_products' => $this->status_id == 5 ? ProductCollection::make($this->quiz_products) : [],
            'created_at' => $this->created_at
        ];
    }
}
