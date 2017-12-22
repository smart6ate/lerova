<?php


namespace Smart6ate\Lerova\App\Console\Commands;

use App\Models\Lerova\Role;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ResetLerova extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lerova:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset Lerova';

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
        if ($this->confirm('Are you sure you want to RESET Lerova?'))
        {
            if (File::exists(config_path('lerova/core.php')))
            {
                $this->info('Hey there! I would like to guide you through the Lerova reset process');

                $name = $this->ask('Can I may have your full name please?');

                $email = $this->ask('Please choose your prefered email & password ');

                $password = $this->secret('Set your password');

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


                $this->info('Thank you '. $name .'You have successfully resetted Lerova ' . env('LEROVA_VERSION'));


                $this->call('cache:clear');
                $this->call('config:clear');
                $this->call('view:clear');
                $this->call('route:clear');

                $this->info('Lerova was successfully updated');

            }

            else
            {
                $this->info('Before you can RESET Lerova, you have to INSTALL Lerova using the command: "php artisan lerova:install"');

            }

        }

    }
}
