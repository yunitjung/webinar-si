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

Route::group(['namespace' => 'User'], function(){
    Route::get('/', 'ProductController@index')->name('index');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function(){
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'as' => 'auth.'], function (){
        Route::get('/login', 'LoginController@index')->name('login');
        Route::post('/try-login', 'LoginController@tryLogin')->name('try-login');
    });

    Route::group(['middleware' => 'check.admin.session'], function (){
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::group(['prefix'=>'product'], function (){
            Route::get('/', 'ProductController@index')->name('product.index');
        });
    });
});