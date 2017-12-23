<?php


namespace Smart6ate\Lerova\App\Console\Commands;


use App\Models\Lerova\Role;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class InstallComposer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'composer:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Lerovas Composer Dependencies';

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
        /** Install Composer Dependencies */
        if (File::exists(config_path('lerova/composer.php'))) {

            $live = config('lerova.composer.live');
            $dev = config('lerova.composer.dev');

            $value = count($live) + count($dev);

            $bar = $this->output->createProgressBar($value);

            if (!App::environment('production', 'staging'))
            {
                foreach (config('lerova.composer.dev') as $package) {
                    $bar->advance();
                    shell_exec('composer require --dev ' . $package);
                }
            }

            foreach (config('lerova.composer.live') as $package) {
                $bar->advance();
                shell_exec('composer require ' . $package);
            }

            $bar->finish();

            $this->info('You have successfully installed Lerovas Composer Dependencies ');
        }
        else
        {
            $this->info('Before you can INSTALL Lerovas Composer Dependences, you have to INSTALL Lerova using the command: "php artisan lerova:install"');

        }

        /** End Install Composer Dependencies */

    }


}
