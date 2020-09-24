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
    public function __construct()
    {
        $this->middleware('auth:api')->except('last_collection');
    }

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
            'pagination' => Collection::query()->with('products')->paginate($request->perPage ?? 5)
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
                ->where('gender_id',$request->gender_id)
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
        return response([
            'status' => 'success',
            'data' => auth()->user()->showRoomLike()->create($request->validated())], 201);
    }
}
