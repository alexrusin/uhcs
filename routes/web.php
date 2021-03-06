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
Auth::routes();

Route::get('/', 'FrontPageController@show');

Route::post('/client-form', 'FormController@storeClient');

Route::get('/admin/dashboard', 'HomeController@index');

Route::get('/admin/messages', 'MessagesController@index')->name('messages');

Route::delete('/admin/messages/{message}', 'MessagesController@delete')->name('messages.delete');


