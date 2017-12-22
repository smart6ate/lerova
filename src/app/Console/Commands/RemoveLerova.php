<?php


namespace Smart6ate\Lerova\App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class RemoveLerova extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lerova:remove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove Lerova';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    public function handle()
    {
        if ($this->confirm('Are you sure you want to REMOVE Lerova?')) {

            if (File::exists(config_path('lerova/core.php'))) {

                $this->call('migrate:reset');

                $this->call('composer:remove');

                File::deleteDirectory(base_path('config/lerova'));
                File::deleteDirectory(base_path('app/Models/Lerova'));
                File::deleteDirectory(base_path('app/Http/Controllers/Lerova'));
                File::deleteDirectory(base_path('app/Http/Middleware/Lerova'));
                File::deleteDirectory(base_path('app/Http/Requests/Lerova'));
                File::deleteDirectory(base_path('app/Traits/Lerova'));

                File::deleteDirectory(base_path('data'));
                File::cleanDirectory(base_path('database'));

                File::cleanDirectory(base_path('resources/views/lerova'));

                File::deleteDirectory(base_path('routes/lerova'));
                File::cleanDirectory(base_path('public/assets'));

                File::cleanDirectory(base_path('tests'));

                File::delete(config_path('lerova.php'));

                /** Overrides */
                $this->call('vendor:publish', array('--tag' => 'lerova-remove', '--force' => true));

                $this->call('make:auth');
                $this->call('migrate');
                $this->call('cache:clear');
                $this->call('config:clear');
                $this->call('view:clear');
                $this->call('route:clear');

                $this->info('Lerova was successfully removed');
            } else {
                $this->info('Before you can REMOVE Lerova, you have to INSTALL Lerova using the command: "php artisan lerova:install"');

            }


        }

    }
}
