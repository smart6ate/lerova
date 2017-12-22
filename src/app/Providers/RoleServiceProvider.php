<?php

namespace Smart6ate\Lerova\App\Providers;

use App\Http\Middleware\Lerova\RoleMiddleware;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
        $this->app['router']->aliasMiddleware('role', RoleMiddleware::class);

        Blade::directive('role', function ($role) {
            return "<?php if (auth()->check() && auth()->user()->hasRole({$role})): ?>";
        });

        Blade::directive('endrole', function ($role) {
            return "<?php endif; ?>";
        });
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
