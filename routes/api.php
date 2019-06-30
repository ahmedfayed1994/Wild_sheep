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


Route::group(['namespace'=>'Api'],function () {

    Route::any('login','loginController@login');
    Route::any('register','loginController@register');
    Route::get('logout',function (){
        auth()->logout();
        return response(['status'=>true]);
    });



    Route::any('order','apiController@order');
    Route::any('buy','apiController@buy');
    Route::any('bank','apiController@bank');
    Route::any('rate','apiController@rate');
    Route::any('contact','apiController@contact');
    Route::any('about','apiController@about');
    Route::any('step','apiController@step');
    Route::any('edit','apiController@edit');
    Route::any('request','apiController@Requests');
    Route::any('index','apiController@index');



});
