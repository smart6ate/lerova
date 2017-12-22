<?php

Route::group(['prefix' => '/blog'], function () {
    Route::get('/', 'Lerova\Blog\BlogController@index')->name('lerova.blog.index');

    Route::patch('/publish/{blog}', 'Lerova\Blog\BlogController@publish')->name('lerova.blog.publish');
    Route::patch('/withdraw/{blog}', 'Lerova\Blog\BlogController@withdraw')->name('lerova.blog.withdraw');

    Route::patch('/archive/{blog}', 'Lerova\Blog\BlogController@archive')->name('lerova.blog.archive');
    Route::get('/archived', 'Lerova\Blog\BlogController@archived')->name('lerova.blog.archived');
    Route::patch('/restore/{uuid}', 'Lerova\Blog\BlogController@restore')->name('lerova.blog.restore');

    Route::delete('/destroy/{uuid}', 'Lerova\Blog\BlogController@destroy')->name('lerova.blog.destroy');


    Route::group(['prefix' => '/posts'], function () {
        Route::get('/create', 'Lerova\Blog\Posts\PostsController@create')->name('lerova.blog.posts.create');
        Route::post('/store', 'Lerova\Blog\Posts\PostsController@store')->name('lerova.blog.posts.store');
        Route::get('/edit/{blog}', 'Lerova\Blog\Posts\PostsController@edit')->name('lerova.blog.posts.edit');
        Route::patch('/update/{blog}', 'Lerova\Blog\Posts\PostsController@update')->name('lerova.blog.posts.update');
    });

    Route::group(['prefix' => '/images'], function () {
        Route::get('/create', 'Lerova\Blog\Images\ImagesController@create')->name('lerova.blog.images.create');
        Route::post('/store', 'Lerova\Blog\Images\ImagesController@store')->name('lerova.blog.images.store');
        Route::get('/edit/{blog}', 'Lerova\Blog\Images\ImagesController@edit')->name('lerova.blog.images.edit');
        Route::patch('/update/{blog}', 'Lerova\Blog\Images\ImagesController@update')->name('lerova.blog.images.update');

    });

    Route::group(['prefix' => '/events'], function () {
        Route::get('/create', 'Lerova\Blog\Events\EventsController@create')->name('lerova.blog.events.create');
        Route::post('/store', 'Lerova\Blog\Events\EventsController@store')->name('lerova.blog.events.store');
        Route::get('/edit/{blog}', 'Lerova\Blog\Events\EventsController@edit')->name('lerova.blog.events.edit');
        Route::patch('/update/{blog}', 'Lerova\Blog\Events\EventsController@update')->name('lerova.blog.events.update');

    });

    Route::group(['prefix' => '/links'], function () {
        Route::get('/create', 'Lerova\Blog\Links\LinksController@create')->name('lerova.blog.links.create');
        Route::post('/store', 'Lerova\Blog\Links\LinksController@store')->name('lerova.blog.links.store');
        Route::get('/edit/{blog}', 'Lerova\Blog\Links\LinksController@edit')->name('lerova.blog.links.edit');
        Route::patch('/update/{blog}', 'Lerova\Blog\Links\LinksController@update')->name('lerova.blog.links.update');

    });

});
