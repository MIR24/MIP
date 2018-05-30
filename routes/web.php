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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::redirect('/', '/list', 301);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/list', function () {
    return view('dummy');
});

Route::resource('topics', 'TopicController');

Route::get('/platformcraft/url', 'TopicController@platformcraftUrl')->name('platformcraftUrl');
Route::post('/video/save', 'TopicController@saveVideo')->name('saveVideo');
