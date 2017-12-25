<?php


namespace Smart6ate\Lerova\App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class LerovaInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lerova:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Lerova';

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
        if (!File::exists(config_path('lerova/core.php'))) {

            if ($this->confirm('Install Lerova?')) {

                File::delete(base_path('app/Http/Controllers/HomeController.php'));

                $this->call('vendor:publish', array('--tag' => 'lerova-install', '--force' => true));
                $this->call('vendor:publish', array('--tag' => 'lerova-update', '--force' => true));

                $this->call('lerova:reset');

            }

        } else {
            $this->info('Already installed');

        }
    }
}
