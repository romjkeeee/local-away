<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateUserAvatar;
use App\Http\Requests\UpdateUserInfo;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

/**
 * @group User settings
 *
 * APIs for
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Get user
     * @authenticated required
     * @response 200
     */
    public function index()
    {
        return response(['status'=> 'success', 'data' => auth()->user()]);
    }

    /**
     * Update info
     * First name, last_name, email
     * @authenticated required
     * @response 200
     */
    public function update_info(UpdateUserInfo $request)
    {
        return response(['status' => 'success', 'data' => auth()->user()->first()->update($request->validated())]);
    }

    /**
     * Update avatar
     * @authenticated required
     * @response 200
     */
    public function update_avatar(UpdateUserAvatar $request)
    {
        $user = User::query()->where('id', auth()->id())->first();
        if ($user->avatar){
            Storage::delete($user->avatar);
            if ($request->file('avatar')) {
                $user->avatar = $request->file('avatar')->store('avatar/user'.$user->id);
                $user->update();
            }
        }
        return response(['status' => 'success','message' => 'Avatar successful update.', 'data' => $user], 200);
    }

    /**
     * remove avatar
     * @authenticated required
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
     * @authenticated required
     * @response 200
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $user = User::query()->where('id', auth()->id())->first();

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
