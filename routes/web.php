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

Route::get('/', 'AllNewsController@index')->name('index');
Auth::routes();
Route::group(['prefix' => 'news'], function () {
    Route::get('/home', 'HomeController@panel')->name('home');
    Route::get('/create', 'NewsController@showCreateNews')->name('show#createNews');
    Route::post('/create', 'NewsController@createNews')->name('create#news');
    Route::get('/edit/{id}', 'NewsController@showEdit');
    Route::get('/delete/{id}', 'NewsController@deleteNews')->name('delete#news');
    Route::patch('/update/{id}', 'NewsController@updateNews');
});

Route::group(['prefix'=>'password'],function(){
    Route::get('/change','PasswordController@changeView')->name('change#view');
    Route::post('/change','PasswordController@changePassword')->name('change#password');
});


