<?php

namespace Tests\Browser\Lerova\Administrator\Users;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Role;
use Tests\CreatesApplication;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class UsersTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use CreatesApplication;
    use DatabaseMigrations;

    /** @test */
    public function an_unauthenticated_user_can_not_view_the_administrators_users_page()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit(route('lerova.administrator.users.index'))
                ->assertRouteIs('login');
        });
    }


    /** @test */
    public function an_authorized_user_can_view_the_administrators_users_page()
    {
        $user = factory(User::class)->create([
            'email' => 'max.mustermann@smartgate.ch',
        ]);

        $role = factory(Role::class)->create([
            'name' => 'administrator',
        ]);

        $user->roles()->attach($role);

        $this->browse(function (Browser $browser) use ($user){

            $browser->loginAs($user)
                ->visit(route('lerova.administrator.users.index'))
                ->assertRouteIs('lerova.administrator.users.index')
                ->assertAuthenticatedAs($user);
        });
    }

    /** @test */
    public function an_authorized_user_can_view_the_administrators_users_create_page()
    {
        $user = factory(User::class)->create([
            'email' => 'max.mustermann@smartgate.ch',
        ]);

        $role = factory(Role::class)->create([
            'name' => 'administrator',
        ]);

        $user->roles()->attach($role);

        $this->browse(function (Browser $browser) use ($user){

            $browser->loginAs($user)
                ->visit(route('lerova.administrator.users.create'))
                ->assertRouteIs('lerova.administrator.users.create')
                ->assertAuthenticatedAs($user);
        });
    }

}
