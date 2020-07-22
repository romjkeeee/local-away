<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

/**
 * @group User
 *
 * APIs for
 */
class UserController extends Controller
{
    /**
     * List
     * Список пользователей
     * @queryParam PerPage integer
     * @queryParam page integer
     *
     * @response 200
     */
    public function index(Request $request)
    {
        return response(User::query()->paginate($request->perPage));
    }
}
