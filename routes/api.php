<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('CountNotification', 'Api\CountNotificationController@CountNotification');
Route::get('get_change_group_dish/{group_id}', 'Api\CountNotificationController@get_change_group_dish');
Route::post('ready', 'Api\CountNotificationController@ready');

