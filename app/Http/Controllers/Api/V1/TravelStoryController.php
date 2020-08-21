<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\Products;
use App\Product;
use App\TravelStory;
use Illuminate\Http\Request;

/**
 * @group Travel Story
 *
 * APIs for
 */
class TravelStoryController extends Controller
{
    /**
     * List of all stories with paginate
     *
     * @queryParam page
     * @queryParam perPage
     *
     * @response 200
     *
     */
    public function index(Request $request)
    {
        $tavel_stories = TravelStory::query()->paginate($request->perPage);
        return response([
            'status' => 'success',
            'currentPage' => $tavel_stories->currentPage(),
            'data' => $tavel_stories->items(),
            'total' => $tavel_stories->count(),
            'next_page' => $tavel_stories->nextPageUrl(),
            'prev_page' => $tavel_stories->previousPageUrl(),
        ]);
    }

    /**
     * List for home page
     *
     * @response 200
     *
     */
    public function home_page()
    {
        return response(['status' => 'success', 'data' => TravelStory::query()->where('is_to_homepage', 1)->get(['id', 'name', 'alias', 'preview_image', 'description'])]);
    }

    /**
     * Show
     * @queryParam gender_id
     * @response 200
     *
     */
    public function show(TravelStory $travel_story, Request $request)
    {
        $travel_story = TravelStory::query()->where('id', $travel_story->id)->with('storyStyle')
            ->when($request->gender_id, function ($query) use ($request) {
                return $query->whereHas('storyStyle', function ($q) use ($request) {
                    return $q->where('gender_id', $request->gender_id);
                })->get();
            })->first();
        $products = str_split(str_replace(',', '', $travel_story['product_ids']));
        foreach ($products as $product) {
            if ($product != null) {
                $data[] = new ProductCollection(Product::query()->with('colorImage')
                    ->where('id', $product)
                    ->when($request->gender_id, function ($query) use ($request) {
                        return $query->where('gender_id', $request->gender_id);
                    })
                    ->first());
            }
        }

        $travel_story['products'] = $data;
        return response(['status' => 'success', 'data' => $travel_story]);
    }
}
