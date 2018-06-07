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

Route::get('/', 'TopicController@indexFront')
    ->name('topics.index.front');

Route::get('/api/topics/row/{num}', 'TopicController@row')
    ->name('api.topics.index.row');

Route::get('/api/organizations/{id}/topics/row', 'OrganizationController@topicsRow')
    ->where('id', '[0-9]+')
    ->name('api.organizations.topics.index.row');

Route::get('/organizations/{id}/topics', 'OrganizationController@topics')
    ->where('id', '[0-9]+')
    ->name('organizations.topics.index');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::post('/api/topics', 'TopicController@indexDT')
        ->name('api.topics.index');

    Route::resource('topics', 'TopicController');
    Route::resource('videos', 'VideoController');
    Route::resource('organizations', 'OrganizationController');

    Route::get('/platformcraft/url', 'VideoController@platformcraftUrl')
        ->name('platformcraftUrl');
});
Route::get('/detail', function () {
    return view('detailPage');
});
