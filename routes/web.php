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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('products/{product}/inventory/create', 'InventoryController@create')->name('inventory.create');
//Route::post('products/{product}/inventory/', 'InventoryController@store')->name('inventory.store');

Route::get('/', 'InventoryController@welcome')->name('inventory.welcome');
Route::resource('inventory','InventoryController');


Route::get('cart/', 'CartController@show')->name('cart-show');
Route::get('cart/add/{product}/{price}', 'CartController@add')->name('cart-add');
