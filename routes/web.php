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

Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth')->group(function () {
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
    Route::get('/cart', 'CartController@showCartPage')->name('cart');
});