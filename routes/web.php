<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//services
Auth::get('services/{method}/{type}/{id?}','ServicesController@main');
Auth::post('services/{method}/{type}/{id?}','ServicesController@main');
