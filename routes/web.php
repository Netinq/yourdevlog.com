<?php

Auth::routes();
Route::resource('websites', 'WebsitesController');
Route::resource('users', 'UserController');
Route::resource('articles', 'ArticlesController');
Route::resource('data', 'ExportDataController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/devlog', 'PublicController@devlog')->name('devlog');
Route::get('/', 'PublicController@welcome')->name('welcome');

Auth::routes();
