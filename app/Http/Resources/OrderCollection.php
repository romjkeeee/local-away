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
                if ($product->status_id >= 7 && isset($product->order_quiz_id)) {
                    $price_product += $product->price;
                }
            }
        }
        if ($this->id == 278) {
            dd($price_product);
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
