<?php

namespace App\Http\Resources;

use App\MediaToColorProduct;
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
            $media = $item->product->colorImage->where('color_id',$item->color_id)->first();
            $image = $item->product->getMedia('images')->where('id',$media->media_id)->first()->getFullUrl();
            $data[] = $item->product;
            $item->product['count'] = $item->count;
            $item->product['order_product_id'] = $item->id;
            $item->product['color_id'] = $item->color_id;
            $item->product['size_id'] = $item->size_id;
            $item->product['selected_color_image'] = $image;
            if ($item->status_id >= 6) {
                $item->product['return'] = true;
            } else {
                $item->product['return'] = false;
            }
        }

        return $data ?? [];
    }
}
