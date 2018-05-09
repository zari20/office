<?php

//welcome routes
require('welcome_routes.php');

//laravel basics
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//resources
Route::resource('reserves','ReserveController')->except( ['edit','update'] );
Route::resource('periods','PeriodController')->except( ['show'] );
Route::resource('discounts','DiscountCodeController')->except( ['show'] );
Route::resource('bookings','BookingController')->except( ['show','edit','update'] );
Route::resource('users','UserController')->except( ['create','store'] );


//services
Route::get('services/{method}/{type}/{id?}','ServicesController@main');
Route::post('services/{method}/{type}/{id?}','ServicesController@main');

//other
Route::post('new_user','ReserveController@create_user');
Route::get('reserve_logmein','ReserveController@logmein');
Route::view('uc','partials.under_construction');

//users change password
Route::get('change_password/{user}','UserController@change_password_form');
Route::put('change_password/{user}','UserController@change_password');

//ajax requests
Route::post('ajax/{method}','AjaxController@main');

//Zarin Pal
Route::get('zarinpal/callback/{type}','ZarinPalController@authority');
