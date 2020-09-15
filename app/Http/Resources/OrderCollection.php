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
        if (count($this->order_products)) {
            foreach ($this->order_products as $product) {
                $price_product += $product->price;
            }
        }
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'sum' => (isset($this->quiz) && $this->status_id != 5 ? $this->sum + 50 * count($this->quiz) : $this->sum + count($this->quiz) + $price_product),
            'status' => $this->status,
            'products' => ProductCollection::make($this->order_products) ?? [],
            'quiz' => TravelBox::collection($this->quiz) ?? [],
//            'quiz_products' => $this->status_id == 5 ? ProductCollection::make($this->quiz_products) : [],
            'created_at' => $this->created_at
        ];
    }
}
