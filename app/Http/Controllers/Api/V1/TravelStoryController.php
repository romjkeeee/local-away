<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
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
        return response(['status' => 'success', 'data' => TravelStory::query()->where('is_to_homepage', 1)->get(['name', 'alias', 'preview_image', 'description'])]);
    }

    /**
     * Show
     *
     * @response 200
     *
     */
    public function show(TravelStory $travel_story)
    {
        $products = str_split(str_replace(',','', $travel_story['product_ids']));
        foreach ($products as $product){
            $data[] = Product::query()->where('id',$product)->first();
        }
        $travel_story['products'] = $data;
        return response(['status' => 'success', 'data' => $travel_story]);
    }
}