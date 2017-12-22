<?php


namespace Smart6ate\Lerova\App\Console\Commands;


use App\Models\Lerova\Role;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallLerova extends Command
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
        if ($this->confirm('Are you sure you want to INSTALL Lerova?'))
        {
            if (!File::exists(config_path('lerova/core.php')))
            {
                $this->info('Hey there! I would like to guide you through the Lerova installation process');

                $name = $this->ask('Can I may have your full name please?');

                $email = $this->ask('Please choose your prefered email & password ');

                $password = $this->secret('Set your password');

                File::cleanDirectory( base_path('app/Http/Controllers'));
                File::cleanDirectory( base_path('resources'));

                $this->call('vendor:publish', array('--tag' => 'lerova-install', '--force' => true));

                $this->call('migrate:reset');
                $this->call('migrate');

                $user = User::create([

                    'name'  => $name,
                    'email' => $email,
                    'password' => bcrypt($password),
                ]);

                $role = factory(Role::class)->create([
                    'name' => 'administrator',
                ]);

                $user->roles()->attach($role);


                $this->info('Thank you '. $name .'You have successfully installed Lerova ' . env('LEROVA_VERSION'));
            }


            else
            {
                $this->info('Lerova ist already installed. You have can UPDATE or REMOVE Lerova using the command: "php artisan lerova:install" or "php artisan lerova:remove');

            }

        }

    }
}
