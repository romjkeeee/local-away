<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Services\SocialAccountsService;

class SocialAuthFacebookController extends Controller
{
    /**
     * Create a redirect method to facebook api.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @param SocialAccountsService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function callback(Request $request)
    {
        /**
         * Check if the 'fb_token' as passed.
         */
        if ($request->get('fb_token')) {

            /**
             * Initialise Facebook SDK.
             */
            $fb = new Facebook([
                'app_id'                => config('facebook.app.id'),
                'app_secret'            => config('facebook.app.secret'),
                'default_graph_version' => 'v2.5',
            ]);
            $fb->setDefaultAccessToken($request->get('fb_token'));
            /**
             * Make the Facebook request.
             */
            $response = $fb->get('/me?locale=en_GB&fields=first_name,last_name,email');
            $fbUser = $response->getDecodedBody();

            /**
             * Create a new user if they haven't already signed up.
             */
            $facebook_id_column = config('facebook.registration.facebook_id', 'facebook_id');
            $name_column = config('facebook.registration.name', 'name');
            $first_name_column = config('facebook.registration.first_name', 'first_name');
            $last_name_column = config('facebook.registration.last_name', 'last_name');
            $email_column = config('facebook.registration.email', 'email');


            if(isset($fbUser['email'])) {
                $user_email = User::where($email_column, $fbUser['email'])
                    ->first();

                if ($user_email) {
                    $user_email->facebook_id = $fbUser['id'];
                    $user_email->save();
                }
            }
            $user = User::where($facebook_id_column, $fbUser['id'])
                ->first();

            if (!$user) {
                $user = new User();
                $user->{$facebook_id_column} = $fbUser['id'];

                if ($name_column) {
                    $user->{$name_column} = $fbUser['first_name'];
                }
                $user->password = '';
                if (isset($fbUser['email'])) {
                    $user->{$email_column} = $fbUser['email'];
                }else{
                    $user->{$email_column} = $fbUser['id'].'@fb.nomail.com';
                }
                $user->save();

                $user->profile()
                    ->create([
                        $first_name_column => $fbUser['first_name'],
                        $last_name_column  => $fbUser['last_name'],
                    ]);
                /**
                 * Attach a role to the user.
                 */
                if (!is_null(config('facebook.registration.attach_role'))) {
                    $user->roles()
                        ->attach(config('facebook.registration.attach_role'));
                }
            }

            return response()->json(['token' => $user->generateToken()]);
        }

        return null;
    }
}
