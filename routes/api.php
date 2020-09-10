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


Route::group(['namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::post('shippo/mister-hook', 'ShippoController@webhook');
    Route::post('contact-form', 'ContactFormController@create');
    Route::post('subscribe', 'SubscribeController@create');
    Route::post('beta-form', 'BetaFormController@store');
    Route::get('cities', 'CityController@index');
    Route::get('countries', 'CityController@list');
    Route::get('genders', 'GenderController@index');
    Route::get('founders', 'FounderController@index');
    Route::get('document-about-us', 'DocumentController@about_us');
    Route::get('track-status/show/{id}', 'TrackOrderController@show');

    Route::group(['prefix' => 'orders'], function () {
        Route::post('/refund/{id}', 'OrderController@refund');
        Route::post('create', 'OrderController@store');
        Route::get('/', 'OrderController@index');
        Route::get('/last', 'OrderController@show_last');
        Route::get('/refund-list', 'OrderController@refund_list');
    });

    //fb-auth
    Route::get('/callback', 'SocialAuthFacebookController@callback');

    //Q&A
    Route::group(['prefix' => 'qa'], function () {
        Route::get('/cities', 'QaController@cities_list');
        Route::get('/show/{alias}', 'QaController@show');
        Route::post('/create', 'QaController@create');
    });

    //User address
    Route::group(['prefix' => 'user-address'], function () {
        Route::get('/', 'UserAddressController@index');
        Route::post('/delete/{id}', 'UserAddressController@delete');
        Route::post('/{id}/edit', 'UserAddressController@edit');
        Route::post('/create', 'UserAddressController@store');
        Route::get('/set-default', 'UserAddressController@set_default');
    });

    //Products
    Route::group(['prefix' => 'products'], function () {
        Route::get('/show/{product}', 'ProductController@show');
    });

    //User settings
    Route::group(['prefix' => 'user-settings'], function () {
        Route::get('/preference', 'UserPreferenceController@index')->name('preference');
        Route::post('/preference', 'UserPreferenceController@update')->name('preference-update');
        Route::get('/metrics', 'UserSettingController@index')->name('metrics');
        Route::get('/get-user', 'UserController@index')->name('get-user');
//        Route::post('/set-metrics', 'UserSettingController@update')->name('set-metrics');
        Route::post('/update-info', 'UserController@update_info')->name('update-info');
        Route::post('/update-avatar', 'UserController@update_avatar')->name('update-avatar');
        Route::post('/change-password', 'UserController@changePassword')->name('change-password');
        Route::delete('/remove-avatar', 'UserController@remove_avatar')->name('remove-avatar');
    });

    //Quiz
    Route::group(['prefix' => 'quiz'], function () {
        Route::get('/package_for', 'QuizController@package_for');
        Route::get('/travel-purposes', 'QuizController@travel_purposes');
        Route::get('/personal-style', 'QuizController@personal_style');
        Route::get('/styled', 'QuizController@styled');
        Route::get('/body-type', 'QuizController@body_type');
        Route::get('/sizing-info', 'QuizController@sizing_info');
        Route::get('/costs', 'QuizController@costs');
        Route::get('/preference', 'QuizController@preference');
    });

    //Show Room
    Route::group(['prefix' => '/show-room'], function () {
        Route::get('/', 'ShowRoomController@index');
        Route::get('/last-collection', 'ShowRoomController@last_collection');
        Route::post('/like', 'ShowRoomController@like')->middleware('auth:api');
    });

    //Travel stories
    Route::group(['prefix' => 'travel-stories'], function () {
        Route::get('/home-page', 'TravelStoryController@home_page');
        Route::get('/', 'TravelStoryController@index');
        Route::get('/{travel_story}', 'TravelStoryController@show');

    });
    //Partnership
    Route::group(['prefix' => 'partnership'], function () {
        Route::get('/', 'PartnershipController@list');
        Route::post('/create', 'PartnershipController@create');
    });
    //Auth
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', 'AuthController@login')->name('login-api');
        Route::post('signup', 'AuthController@signup')->name('sign-up');
        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('logout', 'AuthController@logout');
        });
    });

    //Payments
    Route::group(['prefix' => 'payment'], function () {
        Route::post('create', 'PaymentController@create')->name('payment.create');
        Route::any('process/{processor}', 'PaymentController@process')->name('payment.process');
        Route::get('success/{transaction:token}', 'PaymentController@success')->name('payment.success');
        Route::get('fail/{transaction:token}', 'PaymentController@fail')->name('payment.fail');
    });
});
