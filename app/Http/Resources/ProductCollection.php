<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        foreach ($this as $item) {
            $data[] = $item->product;
            $item->product['count'] = $item->count;
            $item->product['order_product_id'] = $item->id;
            if ($item->status_id >= 6) {
                $item->product['return'] = true;
            } else {
                $item->product['return'] = false;
            }
        }

        return $data ?? [];
    }
}
