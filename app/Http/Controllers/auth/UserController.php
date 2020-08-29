<?php

namespace App\Http\Controllers\auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userArray = $request->toArray();
        $userArray["password"] =
            Hash::make($request->password);
        $user = User::create($userArray);
        if ($user) {
            return (new UserResource($user))->response()->setStatusCode(201);
        } else {
            return response('', 400);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($user->update($request->toArray())) {
            return (new UserResource($user))->response()->setStatusCode(201);
        } else {
            return response('', 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->destroy()) {
            return response('', 204);
        } else {
            return response('', 400);
        }
    }
}
