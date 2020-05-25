<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
// Route::get('dangnhap','LoginController@getDangnhap');
Route::post('dangnhap','LoginController@dangnhap')->name('dangnhap');
Route::group(['middleware'=>'adminLogin'],function(){

	Route::group(['namespace' => 'Base'], function(){
		Route::get('list-base','ViewController@list_base')->name('list_base');
		Route::get('list-phone-number','ViewController@list_phone_number')->name('list_phone_number');
		Route::get('list-base-list','ViewController@list_base_list')->name('list_base_list');
		Route::get('list-product','ProductController@list');
		Route::post('send-base','ViewController@send_base')->name('send_base');
		Route::post('send-list-base','ViewController@send_list_base')->name('send_list_base');
		Route::get('list-base/{id}','ViewController@list_base_id')->name('list_base_id');
		Route::get('search-chat/{search}','ViewController@search_chat')->name('search_chat');
		Route::get('search-phone/{search}','ViewController@search_phone')->name('search_phone');
	});

	Route::group(['middleware' => 'locale'], function() {
		Route::get('change-language/{language}', 'changeLanguageController@changeLanguage')->name('user.change-language');
	});
});	


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/list-user', 'LoginController@index')->name('home');
// Route::get('messages',function(){
// 	return view('index_test');
// });





