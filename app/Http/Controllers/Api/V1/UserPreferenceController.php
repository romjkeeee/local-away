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
     * @queryParam gender_id integer required
     * @authenticated required
     * @response 200
     */
    public function index(Request $request)
    {
        $data = auth()->user()->preference()->orderByDesc('updated_at')->first();
        if ($data) {
            return response([
                'status' => 'success',
                'data' => $data
            ]);
        } else {
            return response([
                'status' => 'error',
                'message' => 'Not found'
            ], 204);
        }

    }

    /**
     * Update
     * @bodyParam age string
     * @bodyParam height string
     * @bodyParam feet string
     * @bodyParam measurement string
     * @bodyParam body_type_id string
     * @bodyParam sizing array
     * @bodyParam gender_id integer
     *
     * @authenticated required
     * @response 200
     */
    public function update(UpdateUserSettingsRequest $request)
    {
        $user = auth()->user();
        $preference = $user->preference()->where('gender_id', $request->gender_id)->first();
        if ($preference) {
            $preference->update($request->validated());
        } else {
            $user->preference()->create($request->validated());
        }
        return response([
            'status' => 'success',
            'data' => $preference
        ]);
    }
}
