<?php

namespace Tests\Browser\Lerova\Profile;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\CreatesApplication;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ProfileTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use CreatesApplication;
    use DatabaseMigrations;


    /** @test */
    public function an_unauthenticated_user_can_not_view_the_profile_page()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit(route('lerova.profile.index'))
                ->assertRouteIs('login');
        });
    }


    /** @test */
    public function authenticated_user_can_view_the_profile_page()
    {
        $user = factory(User::class)->create([
            'email' => 'max.mustermann@smartgate.ch',
        ]);

        $this->browse(function (Browser $browser) use ($user){

            $browser->loginAs($user)
                ->visit(route('lerova.profile.index'))
                ->assertRouteIs('lerova.profile.index')
                ->assertAuthenticatedAs($user);
        });
    }
}
