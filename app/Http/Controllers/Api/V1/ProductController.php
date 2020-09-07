<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

/**
 * @group Product
 *
 * APIs for
 */
class ProductController extends Controller
{
    /**
     * Show
     *
     * @response 200
     *
     */
    public function show(Product $product)
    {
        foreach ($product->colors as $color) {
            foreach ($product->colorImage()->where('color_id', $color->id)->get() as $image) {
                $data[$color->name][] = $product->getMedia('images')->where('id',$image->media_id)->first()->getFullUrl();
            }
        }

        return response([
            'status' => 'success',
            'data' => [
                'product' => $product,
                'images_by_color' => $data
            ]
        ]);
    }
}
