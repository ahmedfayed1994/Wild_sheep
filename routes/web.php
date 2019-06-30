<?php

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
    return back();
});

Route::get('login','loginController@login');
Route::post('sign','loginController@sign');
Route::get('index','loginController@index')->middleware('auth');


Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@do']);

Route::get('logout',function (){auth()->logout();
    return redirect('login');
});



Route::get('index','indexController@index')->middleware('auth');
Route::get('product','productsController@products')->middleware('auth');
Route::get('add/product','productsController@add')->middleware('auth');
Route::put('save/product','productsController@store')->middleware('auth');
Route::get('edit/product.{id}','productsController@editproduct')->middleware('auth');
Route::put('update/product/{id}','productsController@update')->middleware('auth');
Route::get('delete/product/{id}','productsController@delete')->middleware('auth');



//*************************************************************//

Route::get('weight','weightController@weight')->middleware('auth');
Route::get('add/weight','weightController@add')->middleware('auth');
Route::put('save/weight','weightController@store')->middleware('auth');
Route::get('edit/weight.{id}','weightController@editWeight')->middleware('auth');
Route::put('update/weight/{id}','weightController@update')->middleware('auth');
Route::get('delete/weight/{id}','weightController@delete')->middleware('auth');

//********************************************************************//



Route::get('user','userController@user')->middleware('auth');
Route::get('edit/user.{id}','userController@edituser')->middleware('auth');
Route::put('update/user/{id}','userController@update')->middleware('auth');
Route::get('delete/user/{id}','userController@delete')->middleware('auth');

//*********************************************************************//

Route::get('order/current','CurrentController@order')->middleware('auth');
Route::get('details/current.{id}','CurrentController@details')->middleware('auth');
Route::get('update/current/{id}','CurrentController@update')->middleware('auth');
Route::get('delete/current/{id}','CurrentController@delete')->middleware('auth');

//*************************************************************************//

Route::get('order/precedent','precedentController@order')->middleware('auth');
Route::get('details/precedent.{id}','precedentController@details')->middleware('auth');
Route::get('delete/precedent/{id}','precedentController@delete')->middleware('auth');

//*************************************************************************//

Route::get('slughter','chippingController@slughter')->middleware('auth');
Route::get('add/slughter','chippingController@add')->middleware('auth');
Route::put('save/slughter','chippingController@store')->middleware('auth');
Route::get('edit/slughter.{id}','chippingController@editslughter')->middleware('auth');
Route::put('update/slughter.{id}','chippingController@update')->middleware('auth');
Route::get('delete/slughter.{id}','chippingController@delete')->middleware('auth');

//*************************************************************************//

Route::get('packing','PackingController@packing')->middleware('auth');
Route::get('add/packing','PackingController@add')->middleware('auth');
Route::put('save/packing','PackingController@store')->middleware('auth');
Route::get('edit/packing.{id}','PackingController@editpacking')->middleware('auth');
Route::put('update/packing.{id}','PackingController@update')->middleware('auth');
Route::get('delete/packing.{id}','PackingController@delete')->middleware('auth');

//*************************************************************************//

Route::get('bank','bankController@bank')->middleware('auth');
Route::get('edit/bank.{id}','bankController@edit')->middleware('auth');
Route::put('update/bank/{id}','bankController@update')->middleware('auth');

//*************************************************************************//

Route::get('about','aboutController@about')->middleware('auth');
Route::get('edit/about.{id}','aboutController@edit')->middleware('auth');
Route::put('update/about/{id}','aboutController@update')->middleware('auth');

