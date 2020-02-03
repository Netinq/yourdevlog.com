<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('websites', 'WebsitesController');
Route::resource('articles', 'ArticlesController');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
