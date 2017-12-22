<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\SignInPage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class SignInTest extends DuskTestCase
{

    use DatabaseMigrations;


    /** @test */
    public function a_user_can_sign_in()
    {
        $user = factory(User::class)->create([

            'name' => 'Max Mustermann',
            'email' => 'max.mustermann@smartgate.ch',
            'password' => bcrypt('normal')

        ]);

        $this->browse(function (Browser $browser) use ($user){
            $browser->visit(new SignInPage)
                ->signIn($user->email, 'normal')
                ->assertPathIs('/leads')
                ->assertSeeIn('.navbar',$user->name) ;
        });
    }
}
