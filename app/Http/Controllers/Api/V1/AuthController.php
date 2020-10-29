<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Services\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use phpseclib\Crypt\Hash;

/**
 * @group Auth
 *
 * APIs for
 */
class AuthController extends Controller
{
    /**
     * Sign-up
     *
     *
     * @bodyParam first_name string
     * @bodyParam last_name string
     * @bodyParam email string required
     * @bodyParam password string required
     * @bodyParam password_confirmation string required
     * @bodyParam user_agreement boolean required
     *
     * @response 201
     */
    public function signup(SignUpRequest $request)
    {
        if ($request->user_agreement == true) {
            $user = new User($request->validated());
            $user->save();
            $user->attachRole('user');
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();

            $message_id = '2368920';
            $send_message_url = 'https://esputnik.com/api/v1/message/'.$message_id.'/smartsend';
            $json_value = new \stdClass();
            $json_value->recipients = array(array('email'=>$user->email));
            $mailing = new Mail();
            $mailing->send_request($send_message_url, $json_value);

            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'Agreement must be true'
            ], 401);
        }
    }

    /**
     * Login user and create token
     *
     * @bodyParam email string required
     * @bodyParam password string required
     * @bodyParam remember_me boolean
     *
     * @response 200
     */
    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'status' => 'failed',
                'message' => 'Password is incorrect'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user
     *
     * @authenticated required
     * @response 200
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response(['message' => 'Successfully logged out']);
    }
}
