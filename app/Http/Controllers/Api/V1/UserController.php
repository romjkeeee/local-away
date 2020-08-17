<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

/**
 * @group User
 *
 * APIs for
 */
class UserController extends Controller
{
    /**
     * Get user
     *
     * @response 200
     */
    public function index()
    {
        return response(auth()->user());
    }

    /**
     * Update info
     * First name, last_name, email
     *
     * @response 200
     */
    public function update_info(Request $request)
    {
        return response(auth()->user()->first()->update($request));
    }

    /**
     * Update avatar
     *
     * @response 200
     */
    public function update_avatar(Request $request)
    {
        $user = User::query()->where('id', auth()->id())->first();
        if ($user->avatar){
            Storage::delete($user->avatar);
            if ($request->file('avatar')) {
                $user->avatar = $request->file('avatar')->store('avatar/user'.$user->id);
                $user->update();
            }
        }
        return response();
    }

    /**
     * remove avatar
     *
     * @response 204
     */
    public function remove_avatar()
    {
        $user = User::query()->where('id', auth()->id())->first();
        if ($user->avatar) {
            Storage::delete($user->avatar);
            $user->avatar = null;
            $user->update();
        }
        return response(['status' => 'success','message' => 'Avatar successful remove.'], 204);
    }

    /**
     * change password
     * @bodyParam current_password
     * @bodyParam confirmation_current_password
     * @bodyParam new_password
     *
     * @response 200
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        if (password_verify($request->get('current_password'), $user->password)) {

            $user->password = $request->get('new_password');

            $user->save();

            return response(['status' => 'success','message' => 'Password successful change.']);
        } else {
            return response(['status' => 'error', 'message' => 'Наведені дані недійсні.',
                'errors' => ['current_password' => 'Password incorrect']], 422);
        }
    }
}
