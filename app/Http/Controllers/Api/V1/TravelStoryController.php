<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\Products;
use App\Product;
use App\TravelStory;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
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
        if ($request->perPage == 0) {
            $per_page = TravelStory::query()->where('active', 1)->count();
        } else {
            $per_page = $request->perPage;
        }
        $tavel_stories = TravelStory::query()->where('active', 1)->paginate($per_page);
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
        return response([
            'status' => 'success',
            'data' => TravelStory::query()
                ->where('is_to_homepage', 1)
                ->where('active', 1)
                ->get(['id', 'name', 'alias', 'preview_image', 'description'])
        ]);
    }

    /**
     * Show
     * @queryParam gender_id
     * @queryParam per_page
     * @queryParam page
     *
     *
     * @response 200
     *
     */
    public function show($id, Request $request)
    {
        $travel_story = TravelStory::query()->where('id', $id)->where('active', true)->first();
        if ($travel_story) {
            $products = explode(',', $travel_story['product_ids']);
            foreach ($products as $product) {
                $prod = Product::query()
                    ->where('id', $product)
                    ->where('status', 'active')
                    ->when($request->gender_id, function ($query) use ($request) {
                        return $query->where('gender_id', $request->gender_id);
                    })
                    ->first();
                if ($prod) {
                    $data[] = $prod;
                }
            }

            if (isset($data)) {
                $paginator = $this->paginate($data, $request->per_page ?? 15, $request->page ?? 1);
                $travel_story['products'] = $paginator->values();
            } else {
                $travel_story['products'] = [];
            }

//        $after_image = $travel_story->travel_story_image_gender()->where('gender_id', $request->gender_id)->select('image')->first();
            $travel_story['storyStyle'] = $travel_story->storyStyle()->where('gender_id', $request->gender_id)->get();
//        if ($after_image) {
//            $travel_story['after_text_image'] = $after_image->image;
//        }
            return response(['status' => 'success', 'data' => $travel_story]);
        }else{
            return response(['status' => 'success', 'data' => null], 404);
        }
    }

    /* Пагинация для массива */
    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
