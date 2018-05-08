<?php

//welcome routes
require('welcome_routes.php');

//laravel basics
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//resources
Route::resource('reserves','ReserveController');
Route::resource('periods','PeriodController');
Route::resource('discounts','DiscountCodeController');
Route::resource('bookings','BookingController');
Route::resource('users','UserController');


//services
Route::get('services/{method}/{type}/{id?}','ServicesController@main');
Route::post('services/{method}/{type}/{id?}','ServicesController@main');

//other
Route::post('new_user','ReserveController@create_user');
Route::get('reserve_logmein','ReserveController@logmein');

//ajax requests
Route::post('ajax/{method}','AjaxController@main');

//Zarin Pal
Route::get('zarinpal/callback/{type}','ZarinPalController@authority');
