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

// Admin Home Page
Route::get('/admin/home', 'AdminController@home');

// Admin Product
Route::get('/admin/product/index', 'AdminController@index')->name('product.index');
Route::get('/admin/product/create', 'AdminController@create');
Route::post('/admin/product', 'AdminController@store')->name('product.save');
Route::get('/admin/product/manage', 'AdminController@manageproduct');
Route::get('/admin/category/index', 'CategoryController@index')->name('category.index');
Route::get('/admin/category/create', 'CategoryController@create');
Route::post('/admin/category', 'CategoryController@store');
Route::get('/admin/category/manage', 'CategoryController@managecategory');


// Admin Discount
Route::get('/admin/discount', 'AdminController@indexdiscount');
