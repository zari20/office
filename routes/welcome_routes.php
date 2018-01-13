<?php

//essential routes
Route::get('/', 'WelcomePageController@index');
Route::get('/welcome_panel', 'WelcomePageController@panel');

//tabs and sections
Route::resource('/welcome_sections','WelcomeSectionController');
Route::resource('/welcome_tabs','WelcomeTabController');
Route::view('/welcome_new_section', 'welcome_partials.new_section');
Route::view('/welcome_new_tab', 'welcome_partials.new_tab');

Route::view('/welcome_positions', 'welcome_partials.positions');

//login
Route::view('/welcome_login', 'welcome_partials.login');
Route::post('/welcome_login', 'WelcomePageController@login');

//manage
Route::get('/welcome_page/{partial}/{id?}', 'WelcomePageController@load');
Route::patch('/welcome_page/{partial}/{id?}', 'WelcomeManageController@update');
Route::put('/welcome_action/{id}/{action}/{partial}', 'WelcomeManageController@action');
