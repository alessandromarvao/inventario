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
	return view('index');
});

// Route::resource('item', 'ItemController');
Route::get('/item/find', 'ItemController@search')->name('item.search');
Route::get('/sala/find', 'SalaController@search')->name('sala.search');

Route::resources([
	'item' => 'ItemController',
	'sala' => 'SalaController',
	'predio' => 'PredioController'
]);

// Route::resource('/sala', 'SalaController');

Route::get('predios', 'PredioController@showPredios')->name('predios.get');
Route::get('salas/{predio}', 'SalaController@showSalas')->name('salas.get');
