<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group Preference
 *
 * APIs for
 */
class UserPreferenceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Get
     *
     * @authenticated required
     * @response 200
     */
    public function index()
    {
        return response([
            'status' => 'success',
            'data' => auth()->user()->preference()->first()
        ]);
    }

    /**
     * Update
     * @bodyParam age string
     * @bodyParam height string
     * @bodyParam feet string
     * @bodyParam measurement string
     * @bodyParam body_type_id string
     *
     * @authenticated required
     * @response 200
     */
    public function update(Request $request)
    {
        return response([
            'status' => 'success',
            'data' => auth()->user()->preference()->first()->update($request->all())
        ]);
    }
}
