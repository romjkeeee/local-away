<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\WebSiteConfig;
use Illuminate\Http\Request;

/**
 * @group Home page settings
 *
 * APIs for
 */
class WebSiteConfigController extends Controller
{
    /**
     * List
     *
     * @response 200
     */
    public function index()
    {
        return response([
            'status' => 'success',
            'data' => WebSiteConfig::all()
        ]);
    }
}
