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
    return view('welcome');
});

Route::resource('usstocklist', 'UsstocklistsController');
Route::get('/usstocklist', 'UsstocklistsController@index');
Route::post('/usstocklist', 'UsstocklistsController@store');
Route::get('/usstocklist/create', 'UsstocklistsController@create');
Route::get('/usstocklist/{ticker}', 'UsstocklistsController@show');
Route::put('/usstocklist/{ticker}', 'UsstocklistsController@update');
Route::delete('/usstocklist/{ticker}', 'UsstocklistsController@destroy');
Route::get('/usstocklist/{ticker}/edit', 'UsstocklistsController@edit');
