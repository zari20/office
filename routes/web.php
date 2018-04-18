<?php

//laravel basics
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//resources
Route::resource('reserves','ReserveController');

//services
Route::get('services/{method}/{type}/{id?}','ServicesController@main');
Route::post('services/{method}/{type}/{id?}','ServicesController@main');
