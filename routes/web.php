<?php

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
    return view('login');
});

Route::get('/login', 'MainController@index');
Route::post('/login/checklogin', 'MainController@checklogin');
Route::get('/dashboard', 'MainController@successlogin');
Route::get('dashboard', 'MainController@successlogin'); 
Route::get('logout', 'MainController@logout');

Route::get('/', 'MainController@successlogin')->name('home');

// Product Masterfile

Route::get('/product', 'ProductMasterfileController@index')->name('product');

// Category Masterfile

Route::get('/category', 'CategoryMasterfileController@index')->name('category');

// Brand Masterfile

Route::get('/brand', 'BrandMasterfileController@index')->name('brand');

//Unit Masterfile

Route::get('/unit', 'UnitMasterfileController@index')->name('unit');

// Color Masterfile

Route::get('/color', 'ColorMasterfileController@index')->name('color');