<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Google\Auth\ApplicationDefaultCredentials;
use Illuminate\Http\Request;

/**
 * @group User settings
 *
 * APIs for
 */
class SocialAuthGoogleController extends Controller
{
    public function callback(Request $request)
    {
        $client_id = '321934335118-fhpi6i4cpvp3643tvb7ipaha7qb48j3r.apps.googleusercontent.com'; // Client ID
        $client_secret = 'hHQRLbR6RJzHPSBPaF4T-Hk0'; // Client secret
        $redirect_uri = 'http://localhost/google-auth'; // Redirect URIs

        $url = 'https://accounts.google.com/o/oauth2/auth';

        $params = array(
            'redirect_uri' => $redirect_uri,
            'response_type' => 'code',
            'client_id' => $client_id,
            'scope' => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
        );


        if ($request->get('code')) {
            $result = false;

            $params = array(
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'redirect_uri' => $redirect_uri,
                'grant_type' => 'authorization_code',
                'code' => $_GET['code']
            );

            $url = 'https://accounts.google.com/o/oauth2/token';

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($curl);
            curl_close($curl);
            $tokenInfo = json_decode($result, true);

            if (isset($tokenInfo['access_token'])) {
                $params['access_token'] = $tokenInfo['access_token'];

                $userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo' . '?' . urldecode(http_build_query($params))), true);
                if (isset($userInfo['id'])) {
                    $userInfo = $userInfo;
                    $result = true;
                }
            }
        }

    }
}
