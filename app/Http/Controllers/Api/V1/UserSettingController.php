<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserSettingsRequest;
use Illuminate\Http\Request;

/**
 * @group User settings
 *
 * APIs for
 */
class UserSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * List
     * Список пользователей
     * @authenticated required
     *
     * @response 200
     */
    public function index()
    {
        return response([
            'status' => 'success',
            'data' => auth()->user()->userSettings()->first()
            ]);
    }


    /**
     * update settings
     *
     * @bodyParam measurement integer
     * @bodyParam height integer
     * @bodyParam feet integer
     * @bodyParam age_range integer
     * @bodyParam body_type_id integer
     *
     * @authenticated required
     * @response 200
     *
     */
    public function update(UpdateUserSettingsRequest $request)
    {
        return response([
            'status' => 'success',
            'data' => auth()->user()->userAddress()->first()->update($request->validated())
        ], 201);
    }
}
