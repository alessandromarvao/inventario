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

Route::get('/', function () 
{
    // return view('welcome');
	return view('teste');
});

Route::resource('item', 'ItemController');
Route::post('/item/find', 'ItemController@search')->name('item.search');

Route::resource('/sala', 'SalaController');
Route::post('/sala/find', 'SalaController@search')->name('sala.search');

Route::get('teste/predio', 'SalaController@showPredios');
Route::get('teste/sala/{predio}', 'SalaController@showSalas');
