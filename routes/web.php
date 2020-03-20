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

/*
  ISN, mise à disposition du projet YOURDEVLOG pour les élèves
*/
Route::group(['middleware' => ['auth']], function () {
  Route::get('/isn/home', 'ISNController@home')->name('isn.home');
  Route::get('/isn/create', 'ISNController@create')->name('isn.create');
});
Route::get('/isn/login', 'ISNController@login')->name('isn.login');
Route::get('/isn/register', 'ISNController@register')->name('isn.register');
Route::get('/isn/global', 'ISNController@global')->name('isn.global');
Route::get('/isn/view/{id}', 'ISNController@view')->name('isn.view');
Route::get('/isn/byUser/{id}/{name}', 'ISNController@byUser')->name('isn.byuser');