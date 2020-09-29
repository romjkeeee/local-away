<?php

namespace App\Http\Controllers\Api\V1;

use App\Collection;
use App\Http\Controllers\Controller;
use App\Http\Requests\LikeRequest;
use App\ShowRoomLike;
use Illuminate\Http\Request;

/**
 * @group Show Room
 *
 * APIs for
 */
class ShowRoomController extends Controller
{

    /**
     * List
     * Show room list
     *
     * @response 200
     */
    public function index(Request $request)
    {
        return response([
            'status' => 'success',
            'pagination' => Collection::query()
                ->where('active', true)
                ->whereHas('products', function ($query) {
                    return $query->where('active', true);
                })
                ->paginate($request->perPage ?? 5)
        ]);
    }

    /**
     * Last collection by gender
     *
     * @queryParam gender_id required
     *
     * @response 200
     */
    public function last_collection(Request $request)
    {
        return response([
            'status' => 'success',
            'data' => Collection::query()
                ->where('active', true)
                ->where('gender_id', $request->gender_id)
                ->inRandomOrder()
                ->limit(3)
                ->get()
        ]);
    }

    /**
     * Like
     * Like product
     *
     * @bodyParam product_id
     * @bodyParam type like/dislike
     * @authenticated required
     *
     * @response 201
     */
    public function like(LikeRequest $request)
    {
        $user_like = auth()->user()->showRoomLike()
            ->where('type', 'like')
            ->where('product_id', $request->product_id)
            ->first();
        if ($user_like) {
            $user_like->delete();
            if ($user_like->type != $request->type) {
                return response([
                    'status' => 'success',
                    'data' => auth()->user()->showRoomLike()->create($request->validated())
                ], 201);
            }
            return response([
                'status' => 'success',
                'data' => ''
            ], 204);
        }
        $user_dislike = auth()->user()->showRoomLike()->where('product_id', $request->product_id)->where('type', 'dislike')->first();
        if ($user_dislike) {
            $user_dislike->delete();
            if ($user_dislike->type != $request->type) {
                return response([
                    'status' => 'success',
                    'data' => auth()->user()->showRoomLike()->create($request->validated())
                ], 201);
            }
            return response([
                'status' => 'success',
                'data' => ''
            ], 204);
        }
        return response([
            'status' => 'success',
            'data' => auth()->user()->showRoomLike()->create($request->validated())
        ], 201);
    }
}
