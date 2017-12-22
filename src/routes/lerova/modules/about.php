<?php

Route::group(['prefix' => '/about'], function () {
    Route::get('/', 'Lerova\About\AboutController@edit')->name('lerova.about.edit');
    Route::patch('/update', 'Lerova\About\AboutController@update')->name('lerova.about.update');
});
