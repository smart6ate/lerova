<?php

namespace Smart6ate\Lerova\App\Providers;

use Carbon\Carbon;

use App\Models\Lerova\Notification;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

use Smart6ate\Lerova\App\Console\Commands\InstallComposer;
use Smart6ate\Lerova\App\Console\Commands\InstallLerova;
use Smart6ate\Lerova\App\Console\Commands\RemoveComposer;
use Smart6ate\Lerova\App\Console\Commands\RemoveLerova;
use Smart6ate\Lerova\App\Console\Commands\UpdateLerova;

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

        $this->commands([InstallLerova::class]);
        $this->commands([InstallComposer::class]);
        $this->commands([UpdateLerova::class]);
        $this->commands([RemoveLerova::class]);
        $this->commands([RemoveComposer::class]);

        /** Register Core */
        $this->app->register(
            'Smart6ate\Lerova\App\Providers\RoleServiceProvider'
        );

        /** Install Lerova */
        $this->publishes([
            __DIR__ . '/../../config/lerova/' => config_path('lerova/'),
            __DIR__ . '/../../config/lerova.php' => config_path('lerova.php'),

            __DIR__ . '/../../app/Models/' => base_path('app/Models/Lerova/'),
            __DIR__ . '/../../app/Http/Controllers/' => base_path('app/Http/Controllers/Lerova/'),
            __DIR__ . '/../../app/Http/Middleware/' => base_path('app/Http/Middleware/Lerova/'),
            __DIR__ . '/../../app/Http/Requests/' => base_path('app/Http/Requests/Lerova/'),
            __DIR__ . '/../../app/Policies/' => base_path('app/Policies/Lerova/'),
            __DIR__ . '/../../app/Traits/' => base_path('app/Traits/Lerova/'),

            __DIR__.'/../../database/' => base_path('database'),
            __DIR__.'/../../ressources/views' => base_path('resources/views'),
            __DIR__.'/../../routes/' => base_path('routes'),
            __DIR__.'/../../public/' => public_path('assets'),
            __DIR__.'/../../tests/' => base_path('tests'),
            __DIR__.'/../../data/' => base_path('data'),

            __DIR__ . '/../../settings/overrides/Models/' => base_path('app'),
            __DIR__ . '/../../settings/overrides/Controllers/' => base_path('app/Http/Controllers'),
            __DIR__ . '/../../settings/overrides/Middleware/' => base_path('app/Http/Middleware'),
            __DIR__ . '/../../settings/overrides/Providers/' => base_path('app/Providers'),

        ], 'lerova-install');

        /** Update Lerova */
        $this->publishes([
            __DIR__ . '/../../config/lerova/' => config_path('lerova/'),

            __DIR__ . '/../../app/Models/' => base_path('app/Models/Lerova/'),
            __DIR__ . '/../../app/Http/Controllers/' => base_path('app/Http/Controllers/Lerova/'),
            __DIR__ . '/../../app/Http/Middleware/' => base_path('app/Http/Middleware/Lerova/'),
            __DIR__ . '/../../app/Http/Requests/' => base_path('app/Http/Requests/Lerova/'),
            __DIR__ . '/../../app/Policies/' => base_path('app/Policies/Lerova/'),
            __DIR__ . '/../../app/Traits/' => base_path('app/Traits/Lerova/'),


            __DIR__.'/../../database/' => base_path('database'),
            __DIR__.'/../../ressources/views' => base_path('resources/views'),
            __DIR__.'/../../routes/lerova/' => base_path('routes/lerova'),
            __DIR__.'/../../public/' => public_path('assets'),
            __DIR__.'/../../tests/' => base_path('tests'),

            __DIR__.'/../../database/' => base_path('database'),

        ], 'lerova-update');

        /** Remove Lerova */
        $this->publishes([
            __DIR__ . '/../../settings/default/Database/' => base_path('database'),
            __DIR__ . '/../../settings/default/Resources/' => base_path('resources'),
            __DIR__ . '/../../settings/default/Routes/' => base_path('routes'),
            __DIR__ . '/../../settings/default/Public/' => base_path('public'),
            __DIR__ . '/../../settings/default/Tests/' => base_path('tests'),

            __DIR__ . '/../../settings/default/Models/User.php' => base_path('app/User.php'),
            __DIR__ . '/../../settings/default/Controllers/Auth/' => base_path('app/Http/Controllers/Auth'),
            __DIR__ . '/../../settings/default/Middleware/' => base_path('app/Http/Middleware'),
            __DIR__ . '/../../settings/default/Providers/' => base_path('app/Providers'),
        ], 'lerova-remove');


        if(Schema::hasTable('notifications'))
        {
          \View::composer('*', function($view)
          {
              $count_notifications = Notification::all()->count();

              $view->with(compact('count_notifications'));

          });

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
