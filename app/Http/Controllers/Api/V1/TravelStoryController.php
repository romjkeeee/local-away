<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\Products;
use App\Product;
use App\TravelStory;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
     *
     *
     * @response 200
     *
     */
    public function show(TravelStory $travel_story, Request $request)
    {
        $travel_story = TravelStory::query()->where('id', $travel_story->id)->first();
        $products = str_split(str_replace(',', '', $travel_story['product_ids']));
        foreach ($products as $product) {
            $prod = Product::query()
                ->where('id', $product)
                ->when($request->gender_id, function ($query) use ($request) {
                    return $query->where('gender_id', $request->gender_id);
                })
                ->first();
            if ($prod) {
                $data[] = $prod;
            }
        }

        if (isset($data)) {
            $travel_story['products'] = $data;
        }

        $travel_story['storyStyle'] = $travel_story->storyStyle()->where('gender_id', $request->gender_id)->get();
        $travel_story['after_text_image'] = $travel_story->travel_story_image_gender()->where('gender_id', $request->gender_id)->get(['image']);
        return response(['status' => 'success', 'data' => $travel_story]);
    }
}
