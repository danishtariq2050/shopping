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

// User Routes
Route::get('/', 'User\UserController@index')->name('user.index');
Route::get('/shop', 'User\UserController@shop')->name('user.shop');

// User Cart Routes
Route::get('/cart', 'User\CartController@cart')->name('user.cart');
Route::get('/add-cart/{id}', 'User\CartController@addToCart')->name('product.addToCart');
Route::get('/remove-cart/{id}', 'User\CartController@removeFromCart')->name('product.removeCart');
Route::get('/delete/{id}', 'User\CartController@deleteFromCart')->name('product.deleteCart');
Route::get('/clear-cart', 'User\CartController@clearCart')->name('product.clearCart');

Route::get('/contact', 'User\UserController@contact')->name('user.contact');

// Admin Routes

Route::prefix('/admin')->group(function () {
    // Admin Home Page
    Route::get('/home', 'ProductController@home')->name('admin.home');

    // Admin Product
    Route::resource('products', 'ProductController');

    // Route::get('/products', 'ProductController@index')->name('product.index');
    // Route::get('/products/create', 'ProductController@create')->name('product.create');
    // Route::post('/products', 'ProductController@store')->name('product.store');
    // Route::get('/products/{product}', 'ProductController@show')->name('product.show');
    // Route::get('/products/{product}/edit', 'ProductController@edit')->name('product.edit');
    // Route::patch('/products/{product}', 'ProductController@update')->name('product.update');
    // Route::delete('/products/{product}', 'ProductController@destroy')->name('product.destroy');


    Route::get('/product/manage', 'ProductController@manageproduct');
    Route::get('/banner/manage', 'ProductController@managebanner')->name('products.banner');




    Route::resource('categories', 'CategoryController');

    // Route::get('/category/index', 'CategoryController@index')->name('category.index');
    // Route::get('/category/create', 'CategoryController@create');
    // Route::post('/category', 'CategoryController@store');
    Route::get('/category/manage', 'CategoryController@managecategory');



    // Admin Discount
    Route::get('/discount', 'ProductController@indexdiscount')->name('products.discount');
    Route::get('/product/add_discount_percentage/{product}', 'ProductController@percentage')->name('products.percentage');
    Route::patch('/add_discount/{product}', 'ProductController@addpercentage')->name('products.addpercentage');

});
