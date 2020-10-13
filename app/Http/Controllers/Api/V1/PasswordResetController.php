<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\User;
use App\PasswordReset;
use Illuminate\Support\Str;
use MailchimpTransactional;

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
                'message' => 'We can\'t find a user with that e-mail address.'
            ], 404);
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => Str::random(60)
             ]
        );
        if ($user && $passwordReset)
            $mailchimp = new MailchimpTransactional\ApiClient();
        $mailchimp->setApiKey('L0_LgqhnhMl7y39ngfsRMg');

//        $response = $mailchimp->messages->send([
//            "message" => ['
//                "html": "",
//        "text": "",
//        "subject": "",
//        "from_email": "tester@rasd.ds",
//        "from_name": "tester",
//        "to": [{
//        "email":"romjkeeeen@gmail.com",
//            "name":"test",
//            "type":"to"
//        }],
//        "headers": {},
//        "important": false,
//        "track_opens": false,
//        "track_clicks": false,
//        "auto_text": false,
//        "auto_html": false,
//        "inline_css": false,
//        "url_strip_qs": false,
//        "preserve_recipients": false,
//        "view_content_link": false,
//        "bcc_address": "",
//        "tracking_domain": "",
//        "signing_domain": "",
//        "return_path_domain": "",
//        "merge": false,
//        "merge_language": "mailchimp",
//        "global_merge_vars": [],
//        "merge_vars": [],
//        "tags": [],
//        "subaccount": "",
//        "google_analytics_domains": [],
//        "google_analytics_campaign": "",
//        "metadata": {
//        "website": ""
//        },
//        "recipient_metadata": [],
//        "attachments": [],
//        "images": []
//            ']
//        ]);
//        dd($response);
//            $user->notify(
//                new PasswordResetRequest($passwordReset->token)
//            );
        return response()->json([
            'message' => 'We have e-mailed your password reset link!'
        ], 201);
    }
    /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return [string] message
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
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
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
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
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
        $user->password = bcrypt($request->password);
        $user->save();
        $passwordReset->delete();
        $user->notify(new PasswordResetSuccess($passwordReset));
        return response()->json($user);
    }
}
