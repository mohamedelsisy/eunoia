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

Route::group(['namespace' => 'Site'], function (){
    Route::get('/', 'HomeController@index')->name('site.home');

    Route::group(['prefix' => 'cart', 'middleware' => 'auth'], function (){
        Route::get('/', 'CartController@index')->name('site.cart.index');

        Route::post('add-to-cart', 'CartController@addToCart')->name('site.cart.create');
        Route::get('delete/{id}','CartController@destroy')->name('site.cart.destroy');
        Route::get('delete-all','CartController@deleteAll')->name('site.cart.delete-all');


    });

});



Auth::routes();

