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

    Route::get('/api/topics/row', 'TopicController@row')
        ->name('api.topics.row.index');

    Route::get('/api/organizations/{id}/topics/row', 'OrganizationController@topicsRow')
        ->where('id', '[0-9]+')
        ->name('api.organizations.topics.row.index');

    Route::get('/organizations/{id}/topics', 'OrganizationController@topics')
        ->where('id', '[0-9]+')
        ->name('organizations.topics.index');

    Route::resource('topics', 'TopicController');
    Route::resource('videos', 'VideoController');
    Route::resource('organizations', 'OrganizationController');

    Route::get('/platformcraft/url', 'VideoController@platformcraftUrl')
        ->name('platformcraftUrl');
});
