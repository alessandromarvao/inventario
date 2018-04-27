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
    // return view('welcome');
	return view('teste');
});

// Route::get('item/show', 'ItemController@index')->name('show');

Route::get('/itens', 'ItemController@index')->name('show');
Route::resource('item', 'ItemController');

// Route::resource('/itens/{id}', 'ItemController');
