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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('new_mobile','MobileController@new_mobile');

Route::post('register','RegisterController@register');

Route::post('sign_in','SignInController@sign_in');

Route::get('promotion_mobile','MobileController@promotion_mobile');

Route::get('order_mobile','MobileController@order_mobile');

Route::get('iphone','MobileController@getIphone');

Route::get('android','MobileController@getAndroid');

Route::get('product','MobileController@getPhoneDetail');