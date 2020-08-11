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

Route::get('/', 'Admin\HomeController@login');

Auth::routes();

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('home', 'HomeController@index')->name('home');

    Route::resource('users', 'UserController');
    Route::resource('package-types', 'PackageTypeController');
    Route::resource('travel-purposes', 'TravelPurposeController');
    Route::resource('personal-style', 'PersonalStyleController');
    Route::resource('styled', 'StyledController');
    Route::resource('body-type', 'BodyTypeController');
    Route::resource('sizing', 'SizingController');
    Route::resource('sizing-guides', 'SizingGuideController');
    Route::resource('sizing-categories', 'SizingCategoryController');
    Route::resource('sizing-type', 'SizingTypeController');
    Route::resource('costs', 'CostController');
    Route::resource('clothes-categories', 'ClothesCategoryController');
    Route::resource('contact-form', 'ContactFormController');
    Route::resource('partnerships', 'PartnershipController');
    Route::resource('colors', 'ColorController');
    Route::resource('cities', 'CityController');
    Route::resource('genders', 'GenderController');
    Route::resource('subscribes', 'SubscribeController');
    Route::resource('qas', 'QaController');
    Route::resource('qa-forms', 'QaFormController');
    Route::resource('products', 'ProductController');
    Route::resource('product-categories', 'ProductCategoryController');
    Route::get('product/{id}/step2', 'ProductController@step2create');
    Route::put('product/{id}/step2', 'ProductController@store2step');
    Route::get('product/{product}/images', 'ProductController@show_image');
    Route::get('image/{id}/delete', 'ProductController@deleteImage');
    Route::resource('travel-stories', 'TravelStoryController');
    Route::resource('story-styles', 'StoryStyleController');
    Route::resource('collections', 'CollectionController');
    Route::resource('complain-types', 'ComplainTypeController');
    Route::get('complains', 'ComplainController@index');
    Route::get('show-room-like', 'ShowRoomLikeController@index');
    Route::get('user-address', 'UserAddressController@index');


    Route::get('profile','UserController@adminProfile');
});
