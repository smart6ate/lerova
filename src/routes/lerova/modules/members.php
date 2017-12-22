<?php

Route::group(['prefix' => '/members'], function () {
    Route::get('/', 'Lerova\Members\MembersController@index')->name('lerova.members.index');
    Route::get('/archived', 'Lerova\Members\MembersController@archived')->name('lerova.members.archived');
    Route::get('/create', 'Lerova\Members\MembersController@create')->name('lerova.members.create');
    Route::post('/store', 'Lerova\Members\MembersController@store')->name('lerova.members.store');
    Route::get('/edit/{member}', 'Lerova\Members\MembersController@edit')->name('lerova.members.edit');
    Route::patch('/update/{member}', 'Lerova\Members\MembersController@update')->name('lerova.members.update');
    Route::patch('/archive/{member}', 'Lerova\Members\MembersController@archive')->name('lerova.members.archive');
    Route::patch('/restore/{id}', 'Lerova\Members\MembersController@restore')->name('lerova.members.restore');
    Route::delete('/destroy/{id}', 'Lerova\Members\MembersController@destroy')->name('lerova.members.destroy');

    Route::patch('/publish/{member}', 'Lerova\Members\MembersController@publish')->name('lerova.members.publish');
    Route::patch('/withdraw/{member}', 'Lerova\Members\MembersController@withdraw')->name('lerova.members.withdraw');


});