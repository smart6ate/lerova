<?php


Route::get('/send/message', 'StoreNotificationRequest@send')->name('send.notification');

Route::get('/login/magic', 'Lerova\Magic\LoginController@show')->name('login.magic');
Route::post('/login/magic', 'Lerova\Magic\LoginController@sendToken')->name('login.magic');
Route::get('/login/magic/{token}', 'Lerova\Magic\LoginController@validateToken');


Route::group(['middleware' => ['web', 'auth']], function () {

    Route::group(['prefix' => '/lerova'], function () {

        Route::get('/', 'Lerova\Dashboard\DashboardController@index')->name('lerova.dashboard.index');

        include('modules/blog.php');
        include('modules/gallery.php');
        include('modules/about.php');
        include('modules/members.php');
        include('modules/notifications.php');

        Route::group(['prefix' => '/profile'], function () {

            Route::get('/', 'Lerova\Users\ProfileController@index')->name('lerova.profile.index');
            Route::post('/update/{user}', 'Lerova\Users\ProfileController@update')->name('lerova.users.profile.update');
            Route::post('/password/update/{user}', 'Lerova\Users\PasswordController@update')->name('lerova.users.password.update');

        });
        Route::group(['prefix' => '/settings'], function () {

            Route::get('/', 'Lerova\Settings\SettingsController@index')->name('lerova.settings.index');

            Route::group(['prefix' => '/general'], function () {

                Route::group(['prefix' => '/company'], function () {
                    Route::get('/', 'Lerova\Settings\Company\CompanyController@edit')->name('lerova.settings.company.edit');
                    Route::patch('/update', 'Lerova\Settings\Company\CompanyController@update')->name('lerova.settings.company.update');
                });

                Route::group(['prefix' => '/contactform'], function () {
                    Route::get('/', 'Lerova\Settings\Form\FormController@edit')->name('lerova.settings.form.edit');
                    Route::patch('/update', 'Lerova\Settings\Form\FormController@update')->name('lerova.settings.form.update');
                });

            });

            Route::group(['prefix' => '/pages'], function () {

                Route::group(['prefix' => '/meta'], function () {

                    Route::get('/', 'Lerova\Settings\Meta\MetaController@index')->name('lerova.settings.meta.index');
                    Route::get('/{page}/edit', 'Lerova\Settings\Meta\MetaController@edit')->name('lerova.settings.meta.edit');
                    Route::post('/{page}/update', 'Lerova\Settings\Meta\MetaController@update')->name('lerova.settings.meta.update');
                });

            });

            Route::group(['prefix' => '/socialmedias'], function () {

                Route::group(['prefix' => '/links'], function () {
                    Route::get('/', 'Lerova\Settings\Links\LinksController@edit')->name('lerova.settings.links.edit');
                    Route::patch('/update', 'Lerova\Settings\Links\LinksController@update')->name('lerova.settings.links.update');
                });
            });

            Route::group(['prefix' => '/legal'], function () {

                Route::group(['prefix' => '/imprint'], function () {
                    Route::get('/', 'Lerova\Settings\Imprint\ImprintController@edit')->name('lerova.settings.imprint.edit');
                    Route::patch('/update', 'Lerova\Settings\Imprint\ImprintController@update')->name('lerova.settings.imprint.update');

                });

                Route::group(['prefix' => '/privacy'], function () {
                    Route::get('/', 'Lerova\Settings\Privacy\PrivacyController@edit')->name('lerova.settings.privacy.edit');
                    Route::patch('/update', 'Lerova\Settings\Privacy\PrivacyController@update')->name('lerova.settings.privacy.update');
                });
            });
        });


        Route::group(['prefix' => '/administrator'], function () {

            Route::get('/', 'Lerova\Administrator\AdministratorController@index')->name('lerova.administrator.index');

            Route::group(['prefix' => '/users'], function () {

                Route::get('/', 'Lerova\Administrator\UsersController@index')->name('lerova.administrator.users.index');
                Route::get('/create', 'Lerova\Administrator\UsersController@create')->name('lerova.administrator.users.create');
                Route::post('/', 'Lerova\Administrator\UsersController@store')->name('lerova.administrator.users.store');
                Route::get('/{user}/edit', 'Lerova\Administrator\UsersController@edit')->name('lerova.administrator.users.edit');
                Route::post('/{user}/update', 'Lerova\Administrator\UsersController@update')->name('lerova.administrator.users.update');
                Route::post('/{user}/archive', 'Lerova\Administrator\UsersController@archive')->name('lerova.administrator.users.archive');

            });

            Route::group(['prefix' => '/pages'], function () {

                Route::get('/', 'Lerova\Administrator\PagesController@index')->name('lerova.administrator.pages.index');
                Route::get('/create', 'Lerova\Administrator\PagesController@create')->name('lerova.administrator.pages.create');
                Route::post('/', 'Lerova\Administrator\PagesController@store')->name('lerova.administrator.pages.store');

                Route::post('/{page}/delete', 'Lerova\Administrator\PagesController@delete')->name('lerova.administrator.pages.delete');

                Route::post('/{page}/publish', 'Lerova\Administrator\PagesController@publish')->name('lerova.administrator.pages.publish');
                Route::post('/{page}/withdraw', 'Lerova\Administrator\PagesController@withdraw')->name('lerova.administrator.pages.withdraw');

            });

            Route::group(['prefix' => '/analytics'], function () {

                Route::get('/edit', 'Lerova\Administrator\AnalyticsController@edit')->name('lerova.administrator.analytics.edit');
                Route::patch('/update', 'Lerova\Administrator\AnalyticsController@update')->name('lerova.administrator.analytics.update');


            });

        });

    });
});