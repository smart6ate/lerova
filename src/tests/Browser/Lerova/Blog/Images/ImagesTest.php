<?php

namespace Tests\Browser\Lerova\Images;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Page;
use Smart6ate\Lerova\App\Models\Post;
use Smart6ate\Lerova\App\Models\Role;
use Tests\CreatesApplication;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ImagesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use CreatesApplication;
    use DatabaseMigrations;


    /** @test */
    public function an_unauthenticated_user_can_not_view_the_images_page()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit(route('lerova.posts.index'))
                ->assertRouteIs('login');
        });
    }


    /** @test */
    public function authenticated_user_can_view_the_images_page()
    {
        $user = factory(User::class)->create([
            'email' => 'max.mustermann@smartgate.ch',
        ]);

        $role = factory(Role::class)->create([
            'name' => 'images',
        ]);

        $user->roles()->attach($role);

        $page = factory(Page::class)->create([
            'title' => 'images',

        ]);

        $page->published = true;

        $page->save();

        $this->browse(function (Browser $browser) use ($user){

            $browser->loginAs($user)
                ->visit(route('lerova.posts.index'))
                ->assertRouteIs('lerova.posts.index')
                 ->assertAuthenticatedAs($user);
        });
    }

    /** @test */
    public function authenticated_user_can_view_the_images_archived_page()
    {
        $user = factory(User::class)->create([
            'email' => 'max.mustermann@smartgate.ch',
        ]);


        $role = factory(Role::class)->create([
            'name' => 'images',
        ]);

        $user->roles()->attach($role);


        $this->browse(function (Browser $browser) use ($user){

            $browser->loginAs($user)
                ->visit(route('lerova.images.archived'))
                ->assertRouteIs('lerova.images.archived')
                ->assertAuthenticatedAs($user);
        });

    }

    /** @test */
    public function authenticated_user_can_view_the_images_create_page()
    {
        $user = factory(User::class)->create([
            'email' => 'max.mustermann@smartgate.ch',
        ]);


        $role = factory(Role::class)->create([
            'name' => 'images',
        ]);

        $user->roles()->attach($role);

        $this->browse(function (Browser $browser) use ($user){

            $browser->loginAs($user)
                ->visit(route('lerova.images.create'))
                ->assertRouteIs('lerova.images.create')
                ->assertAuthenticatedAs($user);
        });
    }
}
