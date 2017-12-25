<?php

namespace Tests\Feature\Posts;

use Smart6ate\Lerova\App\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostActivitiesTest extends TestCase
{

    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
    }

    /** @test */
    function guests_may_not_create_posts()
    {
        $this->withExceptionHandling();

        $this->get(route('lerova.posts.create'))
            ->assertRedirect(route('login'));

        $this->post(route('lerova.posts.store'))
            ->assertRedirect(route('login'));

    }
}
