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
            $data[] = [
                'id' => $item->id,
                'name' => $item->product->name,
                'price' => $item->price,
//                'image' => $item->product->colorImage->getMedia()
            ];
        }

        return $data;
    }
}
