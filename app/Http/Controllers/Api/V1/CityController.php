<?php

namespace App\Http\Controllers\Api\V1;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group City
 *
 * APIs for
 */
class CityController extends Controller
{
    /**
     * List cities
     *
     * @response 200
     *
     */
    public function index()
    {
        return response([
            'status'=>'success',
            'data' => City::query()->where('status',1)->with('country')->get()]);
    }
}
