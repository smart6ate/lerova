<?php


namespace Smart6ate\Lerova\App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class LerovaRemove extends Command
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
        if (File::exists(config_path('lerova/core.php'))) {

            if ($this->confirm('Remove Lerova?')) {

                if (!File::exists(base_path('lerova'))) {
                    File::makeDirectory(base_path('lerova'));
                }

                $carbon = Carbon::now();

                File::makeDirectory(base_path('lerova/backup-' . $carbon));

                File::move(base_path('data'), base_path('lerova/backup-' . $carbon .'/data/'));

                $this->call('migrate:reset');

                $this->call('composer:remove');

                File::deleteDirectory(config_path('lerova'));

                File::deleteDirectory(base_path('app/Console/Commands/Lerova'));

                File::deleteDirectory(base_path('app/Models/Lerova'));
                File::deleteDirectory(base_path('app/Notifications/Lerova'));

                File::deleteDirectory(base_path('app/Http/Controllers/Auth'));
                File::deleteDirectory(base_path('app/Http/Controllers/Lerova'));
                File::deleteDirectory(base_path('app/Http/Middleware/Lerova'));
                File::deleteDirectory(base_path('app/Http/Requests/Lerova'));

                File::deleteDirectory(base_path('app/Policies/Lerova'));
                File::deleteDirectory(base_path('app/Providers/Lerova'));
                File::deleteDirectory(base_path('app/Traits/Lerova'));

                File::deleteDirectory(base_path('database'));
                File::deleteDirectory(base_path('data'));

                File::deleteDirectory(base_path('resources/lang/lerova'));
                File::deleteDirectory(base_path('resources/views/lerova'));

                File::deleteDirectory(base_path('public/assets'));
                File::deleteDirectory(base_path('routes/lerova'));

                File::deleteDirectory(base_path('tests/Unit/Lerova'));
                File::deleteDirectory(base_path('tests/Feature/Lerova'));
                File::deleteDirectory(base_path('tests/Browser/Lerova'));


                File::delete(config_path('lerova.php'));
                File::delete(base_path('app/Http/Controllers/RSSController.php'));
                File::delete(base_path('app/Http/Controllers/StoreNotificationRequest.php'));

                /** Overrides */
                $this->call('vendor:publish', array('--tag' => 'lerova-remove', '--force' => true));

                $this->call('make:auth');

                $this->call('migrate');

                $this->call('cache:clear');
                $this->call('config:clear');
                $this->call('view:clear');
                $this->call('route:clear');
                $this->call('clear-compiled');
                $this->call('optimize');

                $this->info('Successfully removed!');
            }
        } else {
            $this->info('Already removed!');
        }
    }
}
