<?php

namespace Smart6ate\Lerova\App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class LerovaUpdate extends Command
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
        if (File::exists(config_path('lerova/core.php'))) {

                File::cleanDirectory(config_path('lerova'));

                File::cleanDirectory(base_path('app/Console/Commands/Lerova'));

                File::cleanDirectory(base_path('app/Models/Lerova'));
                File::cleanDirectory(base_path('app/Notifications/Lerova'));

                File::cleanDirectory(base_path('app/Http/Controllers/Auth'));
                File::cleanDirectory(base_path('app/Http/Controllers/Lerova'));
                File::cleanDirectory(base_path('app/Http/Middleware/Lerova'));
                File::cleanDirectory(base_path('app/Http/Requests/Lerova'));

                File::cleanDirectory(base_path('app/Policies/Lerova'));
                File::cleanDirectory(base_path('app/Providers/Lerova'));
                File::cleanDirectory(base_path('app/Traits/Lerova'));

                File::cleanDirectory(base_path('database'));

                File::cleanDirectory(base_path('resources/lang/lerova'));

                File::cleanDirectory(base_path('resources/views/auth'));
                File::cleanDirectory(base_path('resources/views/email'));
                File::cleanDirectory(base_path('resources/views/errors'));
                File::cleanDirectory(base_path('resources/views/lerova'));

                File::cleanDirectory(base_path('public/assets'));
                File::cleanDirectory(base_path('routes/lerova'));

                File::cleanDirectory(base_path('tests/Unit/Lerova'));
                File::cleanDirectory(base_path('tests/Feature/Lerova'));
                File::cleanDirectory(base_path('tests/Browser/Lerova'));

                $this->call('vendor:publish', array('--tag' => 'lerova-update', '--force' => true));

                $this->call('cache:clear');
                $this->call('config:clear');
                $this->call('view:clear');
                $this->call('route:clear');

                $this->info('Successfully updated!');

        } else {
            $this->info('Install first!');
        }

    }
}
