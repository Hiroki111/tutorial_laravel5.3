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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', 'AdminEntryController@index');
Route::get('/admin/entries', 'AdminEntryController@entries');
Route::get('/admin/entries/create', 'AdminEntryController@create');


//Create another controller dedicated to setting operations
// Route::get('/admin/settings', 'AdminPageController@settings');


