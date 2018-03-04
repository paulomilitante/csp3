<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('feed','EntryController@showFeed');

Route::get('summary/{month}/{year}','EntryController@showSummary');

Route::get('feed/entries','EntryController@infiniteScroll');

Route::post('feed','EntryController@postEntry');

Route::post('editModal','EntryController@editModal');

Route::post('edit','EntryController@updateEntry');

Route::post('delete','EntryController@deleteEntry');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::post('/admin/user/{id}', 'AdminController@editUser');

Route::get('/admin', 'AdminController@admin');

Route::post('/admin','CategoryController@addCategory');

Route::post('editCat','CategoryController@editCat');

Route::post('/category/update/{id}','CategoryController@updateCat');

Route::get('/category/delete/{id}','CategoryController@deleteCat');
