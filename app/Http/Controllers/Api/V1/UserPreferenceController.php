<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserSettingsRequest;
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
        $data = auth()->user()->preference()->first();
        if ($data) {
            return response([
                'status' => 'success',
                'data' => $data
            ]);
        } else {
            return response([
                'status' => 'error',
                'message' => 'Not found'
            ], 404);
        }

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
    public function update(UpdateUserSettingsRequest $request)
    {
        $user = auth()->user();
        if ($user->preference()->first()) {
            $user->preference()->update($request->validated());
        } else {
            $user->preference()->create($request->validated());
        }
        return response([
            'status' => 'success',
            'data' => $user->preference()->first()
        ]);
    }
}
