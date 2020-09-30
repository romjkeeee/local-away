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
    Route::get('logout', 'HomeController@logout');

    Route::get('image/{id}', 'HomeController@image');

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
    Route::get('product/{id}/refund', 'ProductController@refund_product')->name('product.refund');
    Route::get('product/{product}/images', 'ProductController@show_image');
    Route::get('image/{id}/delete', 'ProductController@deleteImage');
    Route::resource('travel-stories', 'TravelStoryController');
    Route::get('travel-stories/{id}/step2', 'TravelStoryController@step2create');
    Route::put('travel-stories/{id}/step2', 'TravelStoryController@store2step');
    Route::get('travel-stories/{id}/delete', 'TravelStoryController@deleteImage');
    Route::resource('story-styles', 'StoryStyleController');
    Route::resource('collections', 'CollectionController');
    Route::resource('complain-types', 'ComplainTypeController');
    Route::get('complains', 'ComplainController@index');
    Route::get('show-room-like', 'ShowRoomLikeController@index');
    Route::get('user-address', 'UserAddressController@index');
    Route::resource('countries', 'CountryController');
    Route::resource('boxs', 'BoxController')->except('create', 'store');
    Route::resource('user-settings', 'UserSettingController')->only('index');
    Route::resource('orders', 'OrderController');
    Route::get('orders/equip/{id}', 'OrderController@equip')->name('orders.equip');
    Route::post('orders/equip/{id}', 'OrderController@store_equip')->name('orders.equip.store');
    Route::resource('order-products', 'OrderProductController');
    Route::resource('boutiques', 'BoutiqueController');
    Route::resource('beta-forms', 'BetaFormController');
    Route::resource('founders', 'FounderController');
    Route::resource('documents', 'DocumentController');
    Route::resource('show-room-products', 'ShowRoomProductController');

    Route::get('profile','UserController@adminProfile');
    Route::get('edit-profile','UserController@adminEdit');
});

//Route::get('stripe-checkout', function() {
//    return view('payments.stripe-checkout');
//});
Route::get('stripe-checkout', 'Admin\HomeController@stripe');
