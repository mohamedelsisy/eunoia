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

//define('PAGINATION_COUNT', 6);

Route::group(['namespace'=>'Admin','middleware' => 'auth:admin'], function() {
    Route::post('logout' ,'LoginController@logout') -> name('admin.logout');

    Route::get('/', 'DashboardController@index') -> name('admin.dashboard');



    /* ############## Begin Admins  Routes ################ */
    Route::group(['prefix' => 'admins'], function (){
        Route::get('/','AdminsController@index')->name('admin.admins');

        Route::get('create','AdminsController@create')->name('admin.admins.create');
        Route::post('store','AdminsController@store')->name('admin.admins.store');

        Route::get('edit/{id}','AdminsController@edit')->name('admin.admins.edit');
        Route::post('update','AdminsController@update')->name('admin.admins.update');

        Route::get('delete/{id}','AdminsController@destroy')->name('admin.admins.destroy');
    });
    /* ############### End Admins  Routes ################# */


    /* ############## Begin Categories  Routes ################ */
    Route::group(['prefix' => 'categories'], function (){
        Route::get('/','CategoriesController@index')->name('admin.categories');

        Route::get('create','CategoriesController@create')->name('admin.categories.create');
        Route::post('store','CategoriesController@store')->name('admin.categories.store');

        Route::get('edit/{id}','CategoriesController@edit')->name('admin.categories.edit');
        Route::post('update','CategoriesController@update')->name('admin.categories.update');

        Route::get('delete/{id}','CategoriesController@destroy')->name('admin.categories.destroy');
    });
    /* ############### End Categories  Routes ################# */


    /* ############## Begin Comments  Routes ################ */
    Route::group(['prefix' => 'comments'], function (){
        Route::get('/','CommentsController@index')->name('admin.comments');

        Route::get('edit/{id}','CommentsController@edit')->name('admin.comments.edit');
        Route::post('update','CommentsController@update')->name('admin.comments.update');

        Route::get('delete/{id}','CommentsController@destroy')->name('admin.comments.destroy');
    });
    /* ############### End Comments  Routes ################# */


    /* ############## Begin Contacts  Routes ################ */
    Route::group(['prefix' => 'contacts'], function (){

        Route::get('/','ContactsController@index')->name('admin.contacts');


        Route::get('answer/{id}','ContactsController@answer')->name('admin.contacts.answer');
        Route::post('send','ContactsController@send')->name('admin.contacts.send');

        Route::get('delete/{id}','ContactsController@destroy')->name('admin.contacts.destroy');
    });
    /* ############### End Contacts  Works ################# */


    /* ############## Begin Products  Routes ################ */
    Route::group(['prefix' => 'products'], function (){
        Route::get('/','ProductsController@index')->name('admin.products');

        Route::get('create','ProductsController@create')->name('admin.products.create');
        Route::post('store','ProductsController@store')->name('admin.products.store');

        Route::get('edit/{id}','ProductsController@edit')->name('admin.products.edit');
        Route::post('update','ProductsController@update')->name('admin.products.update');

        Route::get('delete/{id}','ProductsController@destroy')->name('admin.products.destroy');
    });
    /* ############### End Products  Routes ################# */


    /* ############## Begin Orders  Routes ################ */
    Route::group(['prefix' => 'orders'], function (){
        Route::get('/','OrdersController@index')->name('admin.orders');

        Route::get('edit/{id}','OrdersController@edit')->name('admin.orders.edit');
        Route::post('update','OrdersController@update')->name('admin.orders.update');

        Route::get('delete/{id}','OrdersController@destroy')->name('admin.orders.destroy');
    });
    /* ############### End Orders  Routes ################# */




    /* ############## Begin Profiles  Routes ################ */
    Route::group(['prefix' => 'profiles'], function (){
        Route::get('/','ProfilesController@index')->name('admin.profiles');

        Route::get('edit/{id}','ProfilesController@edit')->name('admin.profiles.edit');
        Route::post('update','ProfilesController@update')->name('admin.profiles.update');

        Route::get('delete/{id}','ProfilesController@destroy')->name('admin.profiles.destroy');
    });
    /* ############### End Profiles  Routes ################# */


    /* ############## Begin Users  Routes ################ */
    Route::group(['prefix' => 'users'], function (){
        Route::get('/','UsersController@index')->name('admin.users');

        Route::get('create','UsersController@create')->name('admin.users.create');
        Route::post('store','UsersController@store')->name('admin.users.store');

        Route::get('edit/{id}','UsersController@edit')->name('admin.users.edit');
        Route::post('update','UsersController@update')->name('admin.users.update');

        Route::get('delete/{id}','UsersController@destroy')->name('admin.users.destroy');
    });
    /* ############### End Users  Routes ################# */




});



Route::group(['namespace'=>'Admin','middleware' => 'guest:admin'], function(){
    Route::get('login' ,'LoginController@getLogin')-> name('get.admin.login');
    Route::post('login' ,'LoginController@login') -> name('admin.login');
});



