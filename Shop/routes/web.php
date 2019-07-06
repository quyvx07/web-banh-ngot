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

Route::get('/', 'PageController@index')->name('page.index');
Route::get('/product-type/{type}', 'PageController@getProductType')->name('page.getProductType');
Route::get('/product-detail/{id}', 'PageController@getProductDetail')->name('page.getProductDetail');
Route::get('/contact', 'PageController@getContact')->name('page.getContact');
Route::get('/about', 'PageController@getAbout')->name('page.getAbout');
Route::get('/shopping-cart', 'PageController@getShoppingCart')->name('page.getShoppingCart');
Route::get('/ad-cart/{id}', 'ShoppingCartController@addToCart')->name('shopping-cart.getAdCart');
Route::get('/delete-cart/{id}', 'ShoppingCartController@removeProductIntoCart')->name('shopping-cart.removeProductIntoCart');
Route::post('/update-cart/{id}', 'ShoppingCartController@updateProductIntoCart')->name('shopping-cart.updateProductIntoCart');
Route::get('/check-out', 'PageController@checkOut')->name('page.checkOut');
