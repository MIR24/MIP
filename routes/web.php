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

Route::post('/topics/search', 'TopicController@search')
    ->name('api.topics.index.search');

Route::get('/api/organizations/{id}/topics/row/{num}', 'OrganizationController@topicsRow')
    ->where('id', '[0-9]+')
    ->name('api.organizations.topics.index.row');

Route::get('/organization/{org_id}', 'OrganizationController@participantPage')
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
Route::get('/detail', function () {
    return view('detailPage');
});
