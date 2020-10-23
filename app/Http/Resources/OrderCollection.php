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
                if ($product->status_id >= 7 && $product->status_id != 11){
                    $price_product += $product->price * $product->count;
                }
            }
        }
        $not_quiz_prod = 0;
        if (count($this->order_products)) {
            foreach ($this->order_products as $not_quiz) {
                if ($not_quiz->status_id != 11){
                    $not_quiz_prod += $not_quiz->price * $not_quiz->count;
                }
            }
        }
        $quiz_price = 0;
        if (count($this->quiz)) {
            foreach ($this->quiz as $quiz) {
                $quiz_price += $quiz->price;
            }
        }
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'sum' => $price_product + $not_quiz_prod + $quiz_price,
            'status' => $this->status,
            'products' => ProductCollection::make($this->order_products) ?? [],
            'travel_box_price' => Box::query()->first(),
            'quiz' => TravelBox::collection($this->quiz) ?? [],
//            'quiz_products' => $this->status_id == 5 ? ProductCollection::make($this->quiz_products) : [],
            'created_at' => $this->created_at
        ];
    }
}
