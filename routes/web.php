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

Route::get('/heart-memory', function () {
    return \App\Http\Controllers\TopicController::buildIndex('indexes.wow_index', 2);
})->name('topics.index.wow-front');

Route::get('/30-years-sng', function () {
    return \App\Http\Controllers\TopicController::buildIndex('indexes.wow_index', 3);
})->name('topics.index.front');


Route::post('/topics/search', 'TopicController@search')
    ->name('topics.search.front');

Route::get('/api/organizations/{organization}/topics/row/{days_ago}', 'TopicController@row')
    ->name('api.organizations.topics.index.row');

Route::get('/api/topics/next', 'TopicController@next')
    ->name('api.organizations.topics.index.next');

Route::get('/organizations/{org_id}', 'OrganizationController@participantPage')
    ->where('org_id', '[0-9]+')
    ->name('organizations.participant.page');

Route::get('/about', 'StaticController@about')
    ->name('static.about');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::post('/api/topics', 'TopicController@indexDT')
        ->name('api.topics.index');

    Route::middleware(['role:admin'])->group(function () {
        Route::post('/api/stats', 'StatsController@indexDT')
            ->name('api.stats.index');
        Route::resource('stats', 'StatsController');
    });

    Route::resource('topics', 'TopicController');
    Route::resource('videos', 'VideoController');
    Route::resource('organizations', 'OrganizationController');

    Route::get('/platformcraft/url', 'VideoController@platformcraftUrl')
        ->name('platformcraftUrl');
});
