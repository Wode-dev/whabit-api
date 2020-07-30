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
// Route::middleware(['cors'])->group(function(){
    Route::apiResource('habit', 'v1\HabitController');
    Route::apiResource('accomplishment', 'v1\AccomplishmentController');
    Route::apiResource('habit.accomplishments','v1\HabitAccomplishmentsController');
// });
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});