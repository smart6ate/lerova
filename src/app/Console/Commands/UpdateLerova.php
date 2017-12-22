<?php


namespace Smart6ate\Lerova\App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class UpdateLerova extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lerova:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Lerova';

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

        if (File::exists(config_path('lerova/core.php')))
        {
            File::cleanDirectory(base_path('database'));
            File::cleanDirectory(base_path('resources/lerova'));
            File::cleanDirectory(base_path('routes/lerova'));
            File::cleanDirectory(base_path('public/assets'));

            $this->call('vendor:publish', array('--tag' => 'lerova-update', '--force' => true));

            $this->call('cache:clear');
            $this->call('config:clear');
            $this->call('view:clear');
            $this->call('route:clear');

            $this->info('Lerova was successfully updated');

        }

        else
        {
            $this->info('Before you can UPDATE Lerova, you have to INSTALL Lerova using the command: "php artisan lerova:install"');

        }
    }
}
