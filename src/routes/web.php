<?php


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rss', 'RSSController@index')->name('frontend.rss.index');

include('lerova/core.php');




