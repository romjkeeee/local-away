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
        $price_product = 0;
        if (count($this->order_products_all)) {
            foreach ($this->order_products_all as $product) {
                if ($product->status_id >= 10) {
                    $price_product += $product->price * $product->count;
                }
            }
        }

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'products' => ProductCollection::make($this->order_products_all) ?? [],
            'sum' => $price_product,
//            'quiz' => (count($this->quiz) ? TravelBox::make($this) : ''),
            'created_at' => $this->created_at
        ];
    }
}
