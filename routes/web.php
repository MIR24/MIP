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

Route::redirect('/', '/topics', 301);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::post('/api/topics', 'TopicController@indexDT')
        ->name('api.topics.index');
    Route::get('/platformcraft/url', 'VideoController@platformcraftUrl')
        ->name('platformcraftUrl');

    Route::resource('topics', 'TopicController');
    Route::resource('videos', 'VideoController');
});
