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

Route::get('/', function () {
    return view('master');
});


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

    Route::resource('categories', 'CategoryController');

    // Route::get('/category/index', 'CategoryController@index')->name('category.index');
    // Route::get('/category/create', 'CategoryController@create');
    // Route::post('/category', 'CategoryController@store');
    Route::get('/category/manage', 'CategoryController@managecategory');


    // Admin Discount
    Route::get('/discount', 'ProductController@indexdiscount');

});