<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
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
    public function callback(SocialAccountsService $service)
    {
        $user = $service->findOrCreate(Socialite::driver('facebook')->user());
//        auth()->login($user);
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
}
