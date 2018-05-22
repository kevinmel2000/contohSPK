<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/',[
	'uses' => 'GuestController@getGuestHome',
	'as'   =>  'guest.home',
	'middeware' => 'guest'
]);

Route::post('/login',[
	'uses' => 'UserController@postLogin',
	'as' => 'post.login',
	'middleware' => 'guest'
]);

Route::get('/daftar',[
	'uses' => 'GuestController@getSignup',
	'as' => 'guest.daftar',
	'middleware' => 'guest'
]);


Route::get('/user/landing_page_user',[
	'uses' => 'UserController@getLandingPage',
	'as'   =>  'user.landing',
	'middleware' => ['auth','user']
]);

Route::get('/admin/landing_page_admin',[
	'uses' => 'UserController@getLandingPage_Admin',
	'as' => 'admin.landing',
	'middleware' => ['auth','admin']
]);

Route::get('/logout',[
	'uses' => 'UserController@getLogout',
	'as' => 'logout',
	'middleware' => 'auth'
]);

Route::post('/signup',[
  'uses' => 'UserController@postSignup',
  'as' => 'guest.post_daftar',
  'middleware' => 'guest'
]);

Route::get('/user/diagnosa',[
  'uses' => 'UserController@getDiagnosa',
  'as' => 'user.diagnosa',
  'middleware' => ['auth','user']
]);

Route::get('/user/diagnosa/hasil/{total}',[
  'uses' => 'UserController@getHasilDiagnosa',
  'as' => 'user.hasildiagnosa',
  'middleware' => ['auth','user']
]);


Route::post('/user/postdiagnosa',[
  'uses' => 'UserController@postDiagnosa',
  'as' => 'user.postdiagnosa',
  'middleware' => ['auth','user']
]);