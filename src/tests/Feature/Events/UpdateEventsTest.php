<?php

namespace Tests\Feature\Events;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Event;
use Smart6ate\Lerova\App\Models\Role;
use Tests\TestCase;

class UpdateEventsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();

        $role = factory(Role::class)->create([
            'name' => 'events',
        ]);

        $this->withExceptionHandling()->signInWithRole($role);

    }

    /** @test */
    function a_events_update_requires_a_title()
    {
        $event = create(Event::class);

        $this->post(route('lerova.events.update', $event), [
            'title' => null
        ])->assertSessionHasErrors('title');
    }


    /** @test */
    function a_event_update_requires_a_body()
    {
        $event = create(Event::class);

        $this->post(route('lerova.events.update', $event), [
            'body' => null
        ])->assertSessionHasErrors('body');
    }

    /** @test */
    function a_post_update_requires_tags()
    {
        $event = create(Event::class);

        $this->post(route('lerova.events.update', $event), [
            'tags' => null
        ])->assertSessionHasErrors('tags');
    }


    /** @test */
    function a_post_update_requires_a_image()
    {
        $event = create(Event::class);

        $this->post(route('lerova.events.update', $event), [
            'image' => null
        ])->assertSessionHasErrors('image');
    }

}
