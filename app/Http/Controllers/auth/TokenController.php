<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TokenController extends Controller
{
    public function passwordGrant(Request $request)
    {
        $req = Request::create(
            '/oauth/token',
            'POST',
            [
                'grant_type' => 'password',
                'client_id' => $request->id,
                'client_secret' => $request->secret,
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '',
            ]
        );

        $response = app()->handle($req);

        return
            response()->json(json_decode($response->getContent()), $response->status());
    }
}
