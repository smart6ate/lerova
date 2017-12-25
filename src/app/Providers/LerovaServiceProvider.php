<?php

namespace Smart6ate\Lerova\App\Providers;

use App\Providers\Lerova\RoleServiceProvider;
use Carbon\Carbon;

use App\Models\Lerova\Notification;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

use Smart6ate\Lerova\App\Console\Commands\ComposerInstall;
use Smart6ate\Lerova\App\Console\Commands\LerovaInstall;
use Smart6ate\Lerova\App\Console\Commands\ComposerRemove;
use Smart6ate\Lerova\App\Console\Commands\LerovaRemove;
use Smart6ate\Lerova\App\Console\Commands\LerovaReset;
use Smart6ate\Lerova\App\Console\Commands\LerovaUpdate;

class LerovaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
        Carbon::setLocale('de');
        setlocale (LC_TIME, 'de_DE');

        $this->commands([ComposerInstall::class]);
        $this->commands([ComposerRemove::class]);
        $this->commands([LerovaInstall::class]);
        $this->commands([LerovaUpdate::class]);
        $this->commands([LerovaReset::class]);
        $this->commands([LerovaRemove::class]);

        /* Install Lerova */
        $this->publishes([
            __DIR__ . '/../../config/lerova.php' => config_path('lerova.php'),
            __DIR__.'/../../routes/web.php' => base_path('routes/web.php'),

            __DIR__.'/../../data/' => base_path('data'),

            __DIR__ . '/../../ressources/views/welcome.blade.php' => base_path('resources/views/welcome.blade.php'),

            __DIR__ . '/../../app/Http/Middleware/RedirectIfAuthenticated.php' => base_path('app/Http/Middleware/RedirectIfAuthenticated.php'),

            __DIR__ . '/../../app/Providers/AuthServiceProvider.php' => base_path('app/Providers/AuthServiceProvider.php'),

        ], 'lerova-install');

        /** Update Lerova */
        $this->publishes([
            __DIR__ . '/../../config/lerova/' => config_path('lerova/'),

            __DIR__ . '/../../app/Console/Commands/Lerova' => base_path('app/Console/Commands/Lerova/'),

            __DIR__ . '/../../app/Models/User.php' => base_path('app/User.php'),

            __DIR__ . '/../../app/Http/Controllers/RSSController.php' => base_path('app/Http/Controllers/RSSController.php'),
            __DIR__ . '/../../app/Http/Controllers/StoreNotificationRequest.php' => base_path('app/Http/Controllers/StoreNotificationRequest.php'),


            __DIR__ . '/../../app/Models/Lerova/' => base_path('app/Models/Lerova/'),
            __DIR__ . '/../../app/Notifications/' => base_path('app/Notifications/Lerova/'),

            __DIR__ . '/../../app/Http/Controllers/Lerova/' => base_path('app/Http/Controllers/Lerova/'),
            __DIR__ . '/../../app/Http/Controllers/Auth/' => base_path('app/Http/Controllers/Auth/'),
            __DIR__ . '/../../app/Http/Middleware/Lerova/' => base_path('app/Http/Middleware/Lerova/'),
            __DIR__ . '/../../app/Http/Requests/Lerova/' => base_path('app/Http/Requests/Lerova/'),

            __DIR__ . '/../../app/Policies/' => base_path('app/Policies/Lerova/'),
            __DIR__ . '/../../app/Providers/Lerova/' => base_path('app/Providers/Lerova/'),
            __DIR__ . '/../../app/Traits/' => base_path('app/Traits/Lerova/'),

            __DIR__.'/../../database/' => base_path('database'),

            __DIR__.'/../../ressources/views/lerova/' => base_path('resources/views/lerova'),
            __DIR__.'/../../ressources/views/errors/' => base_path('resources/views/errors'),
            __DIR__.'/../../ressources/views/email/' => base_path('resources/views/email'),
            __DIR__.'/../../ressources/views/auth/' => base_path('resources/views/auth'),

            __DIR__.'/../../public/' => public_path('assets'),
            __DIR__.'/../../routes/lerova/' => base_path('routes/lerova'),

            __DIR__.'/../../tests/Unit' => base_path('tests/Unit/Lerova'),
            __DIR__.'/../../tests/Feature' => base_path('tests/Feature/Lerova'),
            __DIR__.'/../../tests/Browser' => base_path('tests/Browser/Lerova'),

        ], 'lerova-update');

        /** Remove Lerova */
        $this->publishes([
            __DIR__ . '/../../settings/default/Database/' => base_path('database'),
            __DIR__ . '/../../settings/default/Resources/' => base_path('resources'),
            __DIR__ . '/../../settings/default/Routes/' => base_path('routes'),
            __DIR__ . '/../../settings/default/Public/' => base_path('public'),
            __DIR__ . '/../../settings/default/Tests/' => base_path('tests'),

            __DIR__ . '/../../settings/default/Models/User.php' => base_path('app/User.php'),
            __DIR__ . '/../../settings/default/Controllers/Auth/' => base_path('app/Http/Controllers/Auth/'),
            __DIR__ . '/../../settings/default/Middleware/' => base_path('app/Http/Middleware/'),
            __DIR__ . '/../../settings/default/Providers/' => base_path('app/Providers/'),
        ], 'lerova-remove');


        if (File::exists(config_path('lerova/composer.php'))) {

            if(Schema::hasTable('notifications'))
            {
                \View::composer('*', function($view)
                {
                    $count_notifications = Notification::all()->count();

                    $view->with(compact('count_notifications'));

                });

            }

            if(config('lerova.core.settings.company'))
            {
                \View::composer('*', function($view)
                {
                    $company = json_decode(File::get(base_path('data/company.json')));

                    $view->with(compact('company'));

                });
            }


            \View::composer('*', function($view)
            {
                $analytics = json_decode(File::get(base_path('data/analytics.json')));
                $view->with(compact('analytics'));
            });


            if(config('lerova.core.settings.links'))
            {
                \View::composer('*', function($view)
                {
                    $links = json_decode(File::get(base_path('data/links.json')));
                    $view->with(compact('links'));
                });
            }


            if (File::exists(config_path('lerova/core.php')))
            {
                $this->app->register(
                    RoleServiceProvider::class
                );

                $this->app->booted(function () {
                    $schedule = app(Schedule::class);
                    $schedule->command('generate:sitemap')->daily();
                    $schedule->command('auth:clear-tokens')->daily();

                });
            }
        }




    }

    /**
     * Register the application services.
     *
     * @return void
     */

    public function register()
    {
        //
    }
}
