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
            return response(['status' => 'success', 'data' => $addresses]);
        } else {
            return response(['status' => 'error', 'message' => 'Not found'], 404);
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
     * @bodyParam default boolean
     *
     * @authenticated required
     * @response 200
     *
     */
    public function store(StoreUserAddressRequest $request)
    {
        $user_address_default = auth()->user()->userAddress()->where('default', true)->first();
        if ($user_address_default) {
            $user_address_default->update(['default' => false]);
        }
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
     * @bodyParam default boolean
     *
     * @authenticated required
     * @response 200
     *
     */
    public function edit(UpdateUserAddress $request, $id)
    {
        if (auth()->user()->userAddress()->where('id', $id)->first()) {
            return response([
                'status' => 'success',
                'data' => auth()->user()->userAddress()->where('id', $id)->first()->update($request->validated())
            ]);
        } else {
            return response([
                'status' => 'error',
                'message' => 'Not found'
            ], 422);
        }
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
        $user_address = auth()->user()->userAddress()->where('id', $id)->first();
        if ($user_address) {
            if ($user_address->update(['status' => 'hide'])) {
                if ($user_address->default == 1){
                    $user_address->default = 0;
                    $user_address->update();
                }
                return response([
                    'status' => 'success',
                    'message' => 'Successful deleted'
                ], 204);
            } else {
                return response([
                    'status' => 'error',
                    'message' => 'something wrong'
                ], 422);
            }
        } else {
            return response([
                'status' => 'error',
                'message' => 'Not found'
            ], 422);
        }
    }

    /**
     * Set default address
     *
     * @authenticated required
     * @response 204
     *
     */
    public function set_default($id)
    {
        $user_address = auth()->user()->userAddress()->where('id', $id)->first();
        if ($user_address) {
            $user_address_default = auth()->user()->userAddress()->where('default', true)->first();
            if ($user_address_default) {
                $user_address_default->update(['default' => false]);
            }
            if ($user_address->update(['default' => true])) {
                return response([
                    'status' => 'success',
                    'message' => 'Successful set'
                ], 200);
            } else {
                return response([
                    'status' => 'error',
                    'message' => 'something wrong'
                ], 422);
            }
        } else {
            return response([
                'status' => 'error',
                'message' => 'Not found'
            ], 422);
        }
    }

    /**
     * get default address
     *
     * @authenticated required
     * @response 200
     *
     */
    public function get_default()
    {
        return response([
            'status' => 'error',
            'data' => auth()->user()->userAddress()->where('default', true)->first()
        ]);
    }
}
