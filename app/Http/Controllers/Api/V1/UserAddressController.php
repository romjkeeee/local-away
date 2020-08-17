<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserAddressRequest;
use App\Http\Requests\UpdateUserAddress;
use Illuminate\Http\Request;

/**
 * @group User Address
 *
 * APIs for
 */
class UserAddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * List of all user address
     *
     * @authenticated required
     * @response 200
     *
     */
    public function index()
    {
        $addresses = auth()->user()->userAddress()->get();
        if ($addresses) {
            return response(['status'=>'success', 'data' => $addresses]);
        }else{
            return response(['status'=>'error', 'message' => 'Not found'], 404);
        }
    }

    /**
     * Store of all user address
     *
     * @bodyParam address required string
     * @bodyParam zip_code required integer
     * @bodyParam city required string
     * @bodyParam state required string
     * @bodyParam country required string
     * @bodyParam apartment required string
     *
     * @authenticated required
     * @response 200
     *
     */
    public function store(StoreUserAddressRequest $request)
    {
        return response([
            'status' => 'success',
            'data' => auth()->user()->userAddress()->create($request->validated())
        ], 201);
    }

    /**
     * Edit user address by id address
     *
     * @bodyParam address string
     * @bodyParam zip_code integer
     * @bodyParam city string
     * @bodyParam state string
     * @bodyParam country string
     * @bodyParam apartment string
     *
     * @authenticated required
     * @response 200
     *
     */
    public function edit(UpdateUserAddress $request, $id)
    {
        return response(auth()->user()->userAddress()->where('id',$id)->first()->update($request->validated()));
    }

    /**
     * Delete user address by id address
     *
     * @authenticated required
     * @response 204
     *
     */
    public function delete($id)
    {
        if (auth()->user()->userAddress()->where('id',$id)->update('status', 'hide')){
            return response([
                'status' => 'success',
                'message'=> 'Successful deleted'
            ], 204);
        }
    }
}
