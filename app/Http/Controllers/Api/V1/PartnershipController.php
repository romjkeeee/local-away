<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactFormRequest;
use App\Http\Requests\CreateSubscribeRequest;
use App\Subscribe;

/**
 * @group Partnership
 *
 * APIs for
 */
class PartnershipController extends Controller
{
    /**
     * Create
     * Request to partners
     * @bodyParam email string require
     *
     * @response 201
     *
     * @param CreateSubscribeRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function create(CreateSubscribeRequest $request)
    {
        return response(Subscribe::query()->create($request->validated()), 201);
    }
}
