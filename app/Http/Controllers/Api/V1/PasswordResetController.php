<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Mail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\User;
use App\PasswordReset;
use Illuminate\Support\Str;
use MailchimpTransactional;

/**
 * @group Password reset
 *
 * APIs for
 */
class PasswordResetController extends Controller
{

    /**
     * Create token password reset
     *
     * @bodyParam email string require
     *
     * @response 201
     *
     */
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user)
            return response()->json([
                'message' => 'We can\'t find a user with that email address.'
            ], 404);
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => Str::random(60)
             ]
        );
        $message_id = '2368907';
        $send_message_url = 'https://esputnik.com/api/v1/message/'.$message_id.'/smartsend';
        $json_value = new \stdClass();
        $json_value->recipients = array(array('email'=>$user->email, 'jsonParam'=>'{"link":"https://localaway.dev-page.site/reset-password?token='.$passwordReset->token.'"}'));
        $mailing = new Mail();
        $mailing->send_request($send_message_url, $json_value);

        return response()->json([
            'message' => 'We have e-mailed your password reset link!'
        ], 201);
    }

    /**
     * Find token password reset
     *
     * @bodyParam token string require
     * @return [json] passwordReset object
     */
    public function find($token)
    {
        $passwordReset = PasswordReset::query()->where('token', $token)
            ->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(60)->isPast()) {
            $passwordReset->delete();
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        }
        return response()->json($passwordReset);
    }
    /**
     * Reset password
     *
     * @bodyParam email string require
     * @bodyParam password string require
     * @bodyParam password_confirmation string require
     * @bodyParam token string require
     *
     * @response 200
     *
     */
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed|min:6',
            'token' => 'required|string'
        ]);
        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        $user = User::where('email', $passwordReset->email)->first();
        if (!$user)
            return response()->json([
                'message' => 'We can\'t find a user with that e-mail address.'
            ], 404);
        $user->password = $request->password;
        $user->save();
        $passwordReset->delete();

        $message_id = '2368915';
        $send_message_url = 'https://esputnik.com/api/v1/message/'.$message_id.'/smartsend';

        $json_value = new \stdClass();
        $json_value->recipients = array(array('email'=>$user->email));

        $mailing = new Mail();
        $mailing->send_request($send_message_url, $json_value);

        return response()->json($user);
    }
}
