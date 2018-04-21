<?php

//essential routes
Route::get('/', 'WelcomePageController@index');
Route::get('/welcome_panel', 'WelcomePageController@panel');

//tabs and sections
Route::resource('/welcome_sections','WelcomeSectionController');
Route::resource('/welcome_tabs','WelcomeTabController');
Route::view('/welcome_new_section', 'welcome_partials.new_section');
Route::view('/welcome_new_tab', 'welcome_partials.new_tab');


//login
Route::view('/welcome_login', 'welcome_partials.login');
Route::post('/welcome_login', 'WelcomePageController@login');

//manage
Route::get('/welcome_positions', 'WelcomePageController@positions');
Route::put('/welcome_positions', 'WelcomeManageController@positions');
Route::get('/welcome_page/{partial}/{id?}', 'WelcomePageController@load');
Route::patch('/welcome_page/{partial}/{id?}', 'WelcomeManageController@update');
Route::put('/welcome_action/{id}/{action}/{type}', 'WelcomeManageController@action');
