<?php

namespace App\Http\Controllers\Api\V1;

use App\City;
use App\Country;
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
            'data' => City::query()->where('status',1)->get()
        ]);
    }

    /**
     * List countries
     *
     * @response 200
     *
     */
    public function list()
    {
        return response([
            'status'=>'success',
            'data' => Country::query()->get()
        ]);
    }
}
