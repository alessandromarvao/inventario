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

// Route::get('item/show', 'ItemController@index')->name('show');

Route::prefix('item')->group(function()
{
    Route::resource('/', 'ItemController');
    Route::match(['get', 'post'],'/find', 'ItemController@search')->name('itens.search');
});

Route::prefix('sala')->group(function(){
    Route::resource('/', 'SalaController');
    Route::match(['get', 'post'],'/find', 'SalaController@search')->name('salas.search');
});
