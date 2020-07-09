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

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('is_admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('/product-category', 'ProductCategoryController')->except(['show']);
    Route::resource('/brand', 'BrandController')->except(['show']);
    Route::resource('/product', 'ProductController');
});

Route::get('/', 'HomeController@index')->name('frontend.home');

Route::name('frontend.')->namespace('Frontend')->group(function() {
    Route::get('/shop', 'ShopController@index')->name('shop');
    Route::get('/product-category/{slug}', 'ProductCategoryController@show')->name('product_category');
    Route::get('/brand/{slug}', 'BrandController@show')->name('brand');
    Route::get('/product/{slug}', 'ProductController@show')->name('product');
    Route::post('/add-to-cart', 'CartController@add_to_cart')->name('add-to-cart');
    Route::post('/remove-from-cart', 'CartController@remove_from_cart')->name('remove-from-cart');
    Route::get('/cart', 'CartController@showCartPage')->name('cart');
    Route::post('/cart-update', 'CartController@update_cart')->name('cart-update');
    Route::get('/checkout', 'OrderController@checkout')->name('checkout');
    Route::post('/order', 'OrderController@store')->name('place-order');

    Route::middleware('auth')->group(function() {
        Route::get('/user/dashboard', 'UserDashboardController@dashbaord')->name('user-dashboard');
        Route::get('/user/orders', 'UserDashboardController@orders')->name('user-orders');
        Route::get('/user/order/{order}', 'UserDashboardController@order_details')->name('user-order-details');
    });
});