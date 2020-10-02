<?php

namespace App\Http\Controllers\Api\V1;

use App\Gender;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group Gender
 *
 * APIs for
 */
class GenderController extends Controller
{
    /**
     * List genders
     *
     * @response 200
     *
     */
    public function index()
    {
        return response([
            'status'=>'success',
            'data' => Gender::query()->where('active',1)->get()
        ]);
    }
}
