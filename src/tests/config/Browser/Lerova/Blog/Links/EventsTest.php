<?php

namespace Tests\Browser\Lerova\Events;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Event;
use Smart6ate\Lerova\App\Models\Page;
use Smart6ate\Lerova\App\Models\Post;
use Smart6ate\Lerova\App\Models\Role;
use Tests\CreatesApplication;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class EventsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use CreatesApplication;
    use DatabaseMigrations;


    /** @test */
    public function an_unauthenticated_user_can_not_view_the_events_page()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit(route('lerova.events.index'))
                ->assertRouteIs('login');
        });
    }



    /** @test */
    public function authenticated_user_can_view_the_events_page()
    {
        $user = factory(User::class)->create([
            'email' => 'max.mustermann@smartgate.ch',
        ]);

        $role = factory(Role::class)->create([
            'name' => 'events',
        ]);

        $user->roles()->attach($role);

        $this->browse(function (Browser $browser) use ($user){

            $browser->loginAs($user)
                ->visit(route('lerova.events.index'))
                ->assertRouteIs('lerova.events.index')
                 ->assertAuthenticatedAs($user);
        });
    }

    /** @test */
    public function authenticated_user_can_view_the_events_archived_page()
    {
        $user = factory(User::class)->create([
            'email' => 'max.mustermann@smartgate.ch',
        ]);

        $role = factory(Role::class)->create([
            'name' => 'events',
        ]);

        $user->roles()->attach($role);

        $this->browse(function (Browser $browser) use ($user){

            $browser->loginAs($user)
                ->visit(route('lerova.events.archived'))
                ->assertRouteIs('lerova.events.archived')
                ->assertAuthenticatedAs($user);
        });

    }

    /** @test */
    public function authenticated_user_can_view_the_events_create_page()
    {
        $user = factory(User::class)->create([
            'email' => 'max.mustermann@smartgate.ch',
        ]);

        $role = factory(Role::class)->create([
            'name' => 'events',
        ]);

        $user->roles()->attach($role);

        $page = factory(Page::class)->create([
            'title' => 'events',

        ]);

        $page->published = true;

        $page->save();

        $this->browse(function (Browser $browser) use ($user){

            $browser->loginAs($user)
                ->visit(route('lerova.events.create'))
                ->assertRouteIs('lerova.events.create')
                ->assertAuthenticatedAs($user);
        });

    }

    /** @test */
    public function an_authenticated_user_can_view_the_edit_event_page()
    {
        $user = factory(User::class)->create([
            'name' => 'Max',
            'email' => 'max.mustermann@smartgate.ch',
        ]);

        $role = factory(Role::class)->create([
            'name' => 'events',
        ]);
        $user->roles()->attach($role);

        $page = factory(Page::class)->create([
            'title' => 'events',

        ]);

        $page->published = true;

        $page->save();

        $event = create(Event::class);

        $this->browse(function (Browser $browser) use ($user, $event){

            $browser->loginAs($user)
                ->visit(route('lerova.events.edit', $event))
                ->assertRouteIs('lerova.events.index',$event)
                ->assertSee($event->title);
        });
    }
}
