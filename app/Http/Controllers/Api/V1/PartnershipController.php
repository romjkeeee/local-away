<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactFormRequest;
use App\Http\Requests\CreatePartnershipRequest;
use App\Http\Requests\CreateSubscribeRequest;
use App\Partnership;
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
     * @bodyParam first_name string require
     * @bodyParam last_name string require
     * @bodyParam email string require
     * @bodyParam company_name string require
     * @bodyParam country string require
     * @bodyParam phone string require
     * @bodyParam image file require
     *
     * @response 201
     *
     * @param CreateSubscribeRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function create(CreatePartnershipRequest $request)
    {
        $partner = Partnership::query()->create($request->validated());
        if ($request->file('image')) {
            $partner->image = $request->file('image')->store('partnership');
            $partner->update();
        }
        return response($partner, 201);
    }

    /**
     * List
     * List of active partners
     *
     * @response 200
     *
     */
    public function list()
    {
        return response(Partnership::query()->where('status','active')->get(['id','company_name','image']));
    }
}
