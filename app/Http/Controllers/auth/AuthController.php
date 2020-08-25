<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function passwordGrant(Request $request)
    {
        $http = new \GuzzleHttp\Client;
        $response = $http->post(
            '/oauth/token',
            [
                'grant_type' => 'password',
                'client_id' => $request->clientId,
                'client_secret' => $request->clientSecret,
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '',
            ]
        );

        return json_decode((string) $response->getBody(), true);
    }
}
