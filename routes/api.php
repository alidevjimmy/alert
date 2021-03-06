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

Route::group([
    'namespace' => 'Api\v1',
    'as' => 'v1.',
    'prefix' => 'v1'
], function () {
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/register', 'UserController@register');
    Route::post('/checkcode', 'UserController@checkCode');
    Route::get('/voices', 'VoiceController@all');
    Route::get('/voices/{id}', 'VoiceController@find');
    Route::get('/notifications', 'NotificationController@all');
    Route::get('/notifications/{id}', 'NotificationController@find');
    Route::post('/sendtoken' , 'TokenController@sendToken');
});
