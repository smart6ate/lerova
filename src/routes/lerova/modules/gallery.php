<?php


Route::group(['prefix' => '/gallery'], function () {
    Route::get('/', 'Lerova\Gallery\GalleryController@index')->name('lerova.gallery.index');
});