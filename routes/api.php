<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['namespace' => 'API'], function () {

    Route::group(['prefix' => 'users'], function () {
        Route::post('login', 'AuthController@login'); // users/login
        Route::post('register/client', 'AuthController@registerClient'); // users/register/client
        Route::post('register/supplier', 'AuthController@registerSupplier'); // users/register/supplier
        Route::post('register/contractor', 'AuthController@registerContractor'); // users/register/contractor
    });

    Route::group(['prefix' => 'settings'], function () {
        Route::get('cities', 'SettingsController@cities'); // settings/cities
        Route::get('categories', 'SettingsController@categories'); // settings/categories
    });

    Route::group(['prefix' => 'home'], function () {
        Route::get('/', 'HomeController@index'); // home
        Route::get('sliders', 'HomeController@sliders'); // home/sliders
        Route::get('news', 'HomeController@news'); // home/news
        Route::get('categories/{level}', 'HomeController@categories'); // home/categories/
        Route::get('products', 'HomeController@products'); // home/products
        Route::get('products/show', 'HomeController@oneProduct'); // home/products/
    });


    Route::group(['prefix' => 'supplires'], function () {
        Route::get('/', 'SupplireController@index'); // supplires
    });

    Route::group(['prefix' => 'contractors'], function () {
        Route::get('/', 'ContractorController@index'); // supplires
        Route::get('/show', 'ContractorController@show'); // supplires
    });


    //Route::middleware('auth:api')->group(function () {

        Route::group(['prefix' => 'users'], function () {
            Route::post('logout', 'AuthController@logout'); // users/logout
        });



    //});


});
