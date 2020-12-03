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

    Route::group(['prefix' => 'categories'], function (){

        Route::get('/{id}', 'CategoriesController@show')->name('site.categories.show');

    });

    Route::group(['prefix' => 'products'], function (){
       Route::get('/show/{id}', 'ProductController@show')->name('site.products.show');

       Route::group(['middleware' => 'auth'], function (){

           Route::get('create', 'ProductController@create')->name('site.products.create');
           Route::post('store', 'ProductController@store')->name('site.products.store');

           Route::get('edit/{id}', 'ProductController@edit')->name('site.products.edit');
           Route::post('update', 'ProductController@update')->name('site.products.update');

           Route::get('destroy/{id}', 'ProductController@destroy')->name('site.products.destroy');


       });
    });


    Route::group(['prefix' => 'comments','middleware' => 'auth'], function (){
        Route::post('store', 'CommentsController@store')->name('site.comments.store');
    });


    /* ############## Begin Profiles  Routes ################ */
    Route::group(['prefix' => 'profiles'], function (){
        Route::get('/{id}','ProfilesController@show')->name('site.profiles.show');

        Route::group(['middleware' => 'auth'],function (){
            Route::get('edit/{id}','ProfilesController@edit')->name('site.profiles.edit');
            Route::post('update','ProfilesController@update')->name('site.profiles.update');
            Route::get('delete/{id}','ProfilesController@destroy')->name('site.profiles.destroy');
        });
    });
    /* ############### End Profiles  Routes ################# */











});



Auth::routes();

