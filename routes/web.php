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
    return view('welcome');
});


// Admin Routes

// Admin Home Page
Route::get('/admin/home', 'AdminController@home');

// Admin Product
Route::get('/admin/product', 'AdminController@index');
Route::get('/admin/product/create', 'AdminController@create');
Route::post('/admin/product', 'AdminController@store');
Route::post('/admin/category', 'CategoryController@index');
Route::get('/admin/category/create', 'CategoryController@create');
Route::post('/admin/category', 'CategoryController@store');


// Admin Discount
Route::get('/admin/discount', 'AdminController@indexdiscount');
