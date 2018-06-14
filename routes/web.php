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

Route::post('/topics/search', 'TopicController@search')
    ->name('api.topics.index.search');

Route::get('/api/organizations/{organization}/topics/row/{days_ago}', 'TopicController@row')
    ->name('api.organizations.topics.index.row');

Route::get('/organizations/{org_id}', 'OrganizationController@participantPage')
    ->where('org_id', '[0-9]+')
    ->name('organizations.participant.page');


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
