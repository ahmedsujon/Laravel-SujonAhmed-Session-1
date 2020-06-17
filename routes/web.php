<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/')->namespace('Web\App')->group(function () {

    Route::resource('consultations', 'ConsultationController');

});


// Route::prefix('/')->namespace('Web\Admin')->group(function () {

//     Route::resource('schools', 'SchoolController');

// });



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
