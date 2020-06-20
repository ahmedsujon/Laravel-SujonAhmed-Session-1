<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/')->namespace('Web\App')->group(function () {

    Route::get('/', 'ProductsController@welcome');
    Route::get('product_cart', 'ProductsController@cart')->name('product_cart');
    Route::get('add-to-cart/{id}', 'ProductsController@addToCart');
    Route::patch('update-cart', 'ProductsController@update');
    Route::delete('remove-from-cart', 'ProductsController@remove');

});


Route::prefix('/')->namespace('Web\Admin')->group(function () {

    Route::resource('category', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('cupon', 'CuponController');

});

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
