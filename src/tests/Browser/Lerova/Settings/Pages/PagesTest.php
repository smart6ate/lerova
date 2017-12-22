<?php

namespace Tests\Browser\Lerova\Settings\Pages;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Role;
use Tests\CreatesApplication;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class PagesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use CreatesApplication;
    use DatabaseMigrations;


    /** @test */
    public function an_unauthenticated_user_can_not_view_the_settings_pages_page()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit(route('lerova.settings.pages.index'))
                ->assertRouteIs('login');
        });
    }



    /** @test */
    public function authenticated_user_can_view_the_setings_pages_page()
    {
        $user = factory(User::class)->create([
            'email' => 'max.mustermann@smartgate.ch',
        ]);


        $role = factory(Role::class)->create([
            'name' => 'settings',
        ]);

        $user->roles()->attach($role);

        $this->browse(function (Browser $browser) use ($user){

            $browser->loginAs($user)
                ->visit(route('lerova.settings.pages.index'))
                ->assertRouteIs('lerova.settings.pages.index')
                ->assertAuthenticatedAs($user);
        });
    }
}
