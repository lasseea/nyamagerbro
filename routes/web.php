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
//Front page view
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

//Pages for site visitors
Route::get('/butikker/{shop_type?}', 'PagesController@shops');
Route::get('/butikker/butik/{shop}', 'PagesController@shop');

Route::get('/events', 'PagesController@events');
Route::get('/events/{event}', 'PagesController@event');

Route::get('/jobs', 'PagesController@jobs');
Route::get('/jobs/{job}', 'PagesController@job');

Route::get('/udleje', 'PagesController@rentals');
Route::get('/udleje/{rental}', 'PagesController@rental');

Route::get('/kultur', 'PagesController@culture');
Route::get('/kontakt', 'PagesController@contact');
Route::get('/oversigtskort', 'PagesController@overview');
Route::get('/parkering', 'PagesController@parking');
Route::get('/betingelser', 'PagesController@terms');

//Admin control panel
Route::get('admin', 'AdminController@admin');

//Admin shop moderation
Route::get('admin/nybutik', 'AdminController@newShop');
Route::post('admin/tilføjbutik', 'AdminController@addShop');
Route::get('admin/butikker', 'AdminController@shops');
Route::get('admin/sebutik/{shop}', 'AdminController@editFormShop');
Route::post('admin/retbutik/{shop}', 'AdminController@editShop');
Route::delete('admin/sletbutik/{shop}', 'AdminController@deleteShop');

//Admin event/news moderation
Route::get('admin/nyevent', 'AdminController@newEvent');
Route::post('admin/tilføjevent', 'AdminController@addEvent');
Route::get('admin/events', 'AdminController@events');
Route::get('admin/seevent/{event}', 'AdminController@editFormEvent');
Route::post('admin/retevent/{event}', 'AdminController@editEvent');
Route::delete('admin/sletevent/{event}', 'AdminController@deleteEvent');

//Admin job offer moderation
Route::get('admin/nytjobopslag', 'AdminController@newJob');
Route::post('admin/tilføjjobopslag', 'AdminController@addJob');
Route::get('admin/jobopslag', 'AdminController@jobs');
Route::get('admin/sejobopslag/{job}', 'AdminController@editFormJob');
Route::post('admin/retjobopslag/{job}', 'AdminController@editJob');
Route::delete('admin/sletjobopslag/{job}', 'AdminController@deleteJob');

//Admin room rental moderation
Route::get('admin/nytlokale', 'AdminController@newRental');
Route::post('admin/tilføjlokale', 'AdminController@addRental');
Route::get('admin/lokaler', 'AdminController@rentals');
Route::get('admin/selokale/{rental}', 'AdminController@editFormRental');
Route::post('admin/retlokale/{rental}', 'AdminController@editRental');
Route::delete('admin/sletlokale/{rental}', 'AdminController@deleteRental');

//User profile functionalities
Route::get('profil', 'UsersController@profile');
Route::get('tilmeld/{subscription}/{user}', 'UsersController@subscribe');
Route::get('afmeld/{subscription}/{user}', 'UsersController@unsubscribe');

//Authentication routes
Auth::routes();



