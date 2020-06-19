<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/')->namespace('Web\App')->group(function () {

    Route::resource('consultations', 'ConsultationController');

    Route::get('/appproduct', 'ProductController@index');
    Route::get('cart', 'ProductController@cart');

    Route::get('add-to-cart/{id}', 'ProductController@addToCart');
});


Route::prefix('/')->namespace('Web\Admin')->group(function () {

    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');

});

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

// Route::get('auth/social', 'Auth\LoginController@show')->name('social.login');
// Route::get('oauth/{driver}', 'Auth\LoginController@redirectToProvider')->name('social.oauth');
// Route::get('oauth/{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
