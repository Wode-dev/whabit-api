<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['cors'])->group(function () {

    // Routes for login through API
    Route::group(['prefix' => 'session'], function () {
        Route::put('login', 'auth\TokenController@passwordGrant');
    });

    // Routes for managing user accounts
    Route::apiResource('user', 'auth\UserController')->except([
        'index',
        'show'
    ]);

    Route::delete('habit/{habit}/accomplishments/date', 'v1\HabitAccomplishmentsController@destroyByDate');
    Route::apiResource('habit', 'v1\HabitController');
    // Route::apiResource('accomplishment', 'v1\AccomplishmentController');
    Route::apiResource('habit.accomplishments', 'v1\HabitAccomplishmentsController')->except([
        'show',
        'update'
    ]);
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
