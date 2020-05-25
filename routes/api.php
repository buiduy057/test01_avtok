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

Route::group(['middleware' => ['client_credentials']], function () {

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
     Route::group(['namespace' => 'Api'], function(){
            Route::group([
                'prefix' => 'auth'
            ], function () {
                Route::post('login', 'AuthController@login');
                Route::post('signup', 'AuthController@signup');
              
                Route::group([
                  'middleware' => 'auth:api'
                ], function() {
                    Route::get('logout', 'AuthController@logout');
                    Route::get('user', 'AuthController@user');
                });
            });
             Route::group([
                'prefix' => 'sms'
            ], function () {
                 Route::get('list-message','SMSController@list_message');
                 Route::get('list-phone-number','SMSController@list_phone_number');
                 Route::get('list-phone','SMSController@list_phone');
                 Route::get('seach-id/{id}','SMSController@search_id');
                 Route::get('search-phone/{search}','SMSController@search_phone');
                 Route::get('search-from-phone/{search}','SMSController@search_from_phone');
                 Route::get('search-chat/{search}','SMSController@search_chat');
                 Route::post('send-message','SMSController@send_message');
                 Route::post('search-message','SMSController@search_message');
                 Route::post('remove-message','SMSController@remove_message');

             });
             
    });
});