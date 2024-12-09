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


Auth::routes();

Route::get('/',                        'HomeController@home');
Route::get('/home',                    'HomeController@index')->name('home');
Route::get('/order/{id}',              'OrderController@index')->name('order');
Route::post('/store',                  'OrderController@order')->name('store');
Route::get('/addPizza',                'PizzaController@addPizza')->name('addPizza');
Route::post('/addPizza',               'PizzaController@add_pizza')->name('add_pizza');
Route::get('/kitchenOrder',            'OrderController@kitchenOrder')->name('kitchenOrder');
Route::get('/getOrders',               'OrderController@getOrders')->name('kitchen.orders.data');
Route::get('/success-order',           'OrderController@success')->name('kitchen.success');










