<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Route::get('/butikker', 'PagesController@shops');
Route::get('/events', 'PagesController@events');
Route::get('/kultur', 'PagesController@culture');
Route::get('/jobs', 'PagesController@jobs');
Route::get('/udleje', 'PagesController@rental');
Route::get('/kontakt', 'PagesController@contact');
Route::get('/oversigtskort', 'PagesController@overview');
Route::get('/parkering', 'PagesController@parking');
Route::get('/betingelser', 'PagesController@terms');

Route::get('admin', 'AdminController@admin');
Route::get('admin/butikker', 'AdminController@shops');
Route::get('admin/jobs', 'AdminController@jobs');
Route::get('admin/udleje', 'AdminController@rental');
Route::get('admin/events', 'AdminController@events');

Route::get('profil', 'UsersController@profile');
Route::get('tilmeld', 'UsersController@subscribe');

Auth::routes();


