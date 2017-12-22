<?php

Route::group(['prefix' => '/notifications'], function () {
    Route::get('/', 'Lerova\Notifications\NotificationsController@index')->name('lerova.notifications.index');
    Route::get('/{notification}/show', 'Lerova\Notifications\NotificationsController@show')->name('lerova.notifications.show');
    Route::post('/{notification}/archive', 'Lerova\Notifications\NotificationsController@archive')->name('lerova.notifications.archive');
    Route::get('/archived', 'Lerova\Notifications\NotificationsController@archived')->name('lerova.notifications.archived');
    Route::post('/{id}/restore', 'Lerova\Notifications\NotificationsController@restore')->name('lerova.notifications.restore');
    Route::post('/{id}/delete', 'Lerova\Notifications\NotificationsController@delete')->name('lerova.notification.delete');
});