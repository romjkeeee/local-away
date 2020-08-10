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


Route::group(['namespace' => 'Api\V1','middleware'=> ['cors']], function () {
    Route::post('contact-form', 'ContactFormController@create');
    Route::post('subscribe', 'SubscribeController@create');

    //Q&A
    Route::group(['prefix' => 'qa'], function() {
        Route::get('/cities', 'QaController@cities_list');
        Route::get('/{id}', 'QaController@show');
        Route::post('/create', 'QaController@create');
    });
    //Travel stories
    Route::group(['prefix' => 'travel-stories'], function() {
        Route::get('/home-page', 'TravelStoryController@home_page');
        Route::get('/', 'TravelStoryController@index');
        Route::get('/{travel_story}', 'TravelStoryController@show');

    });
    //Partnership
    Route::group(['prefix' => 'partnership'], function() {
        Route::get('/', 'PartnershipController@list');
        Route::post('/create', 'PartnershipController@create');
    });
    //Auth
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', 'AuthController@login')->name('login-api');
        Route::post('signup', 'AuthController@signup')->name('sign-up');
        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('logout', 'AuthController@logout');
            Route::get('user', 'AuthController@user');
        });
    });
});
