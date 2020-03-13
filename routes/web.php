<?php


Route::redirect('/', '/home');

Auth::routes();
Route::resource('websites', 'WebsitesController');
Route::resource('articles', 'ArticlesController');
Route::resource('data', 'ExportDataController');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
