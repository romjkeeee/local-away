<?php

namespace App\Http\Controllers\Api\V1;

use App\Founder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group Founder
 *
 * APIs for
 */
class FounderController extends Controller
{
    /**
     * List founders
     *
     * @response 200
     *
     */
    public function index()
    {
        return response([
            'status' => 'success',
            'data' => Founder::query()->where('status','active')->get()
        ]);
    }
}
