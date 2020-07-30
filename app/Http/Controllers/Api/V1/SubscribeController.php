<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactFormRequest;
use App\Subscribe;

/**
 * @group Subscribe
 *
 * APIs for
 */
class SubscribeController extends Controller
{
    /**
     * Create
     * Subscribe
     * @bodyParam email string require
     *
     * @response 201
     *
     * @param CreateContactFormRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function create(CreateContactFormRequest $request)
    {
        return response(Subscribe::query()->create($request->validated()), 201);
    }
}
