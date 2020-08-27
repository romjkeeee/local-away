<?php

namespace App\Http\Controllers\Api\V1;

use App\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group Documents
 *
 * APIs for
 */
class DocumentController extends Controller
{
    /**
     * Document for about us
     *
     * @response 200
     *
     */
    public function about_us()
    {
        return response([
            'status' => 'success',
            'data' => Document::query()->where('id',1)->first(),
        ]);
    }
}
