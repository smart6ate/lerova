<?php

namespace Tests\Feature\Posts;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Event;
use Smart6ate\Lerova\App\Models\Post;
use Smart6ate\Lerova\App\Models\Role;
use Tests\TestCase;

class EventAttributesTest extends TestCase
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
    }

    public function publishEvents($overrides = [])
    {
        $role = factory(Role::class)->create([
            'name' => 'events',
        ]);

        $this->withExceptionHandling()->signInWithRole($role);

        $post = make(Event::class, $overrides);

        return $this->post(route('lerova.events.store', $post->toArray()));
    }

    /** @test */
    function a_event_requires_a_title()
    {
        $this->publishEvents(['title' => null])
            ->assertSessionHasErrors('title');
    }

    /** @test */
    function a_event_requires_a_body()
    {
        $this->publishEvents(['body' => null])
            ->assertSessionHasErrors('body');
    }

    /** @test */
    function a_event_requires_tags()
    {
        $this->publishEvents(['tags' => null])
            ->assertSessionHasErrors('tags');
    }

    /** @test */
    function a_event_requires_a_image()
    {
        $this->publishEvents(['image' => null])
            ->assertSessionHasErrors('image');
    }

}
