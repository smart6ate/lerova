<?php

namespace Tests\Feature\Posts;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Post;
use Tests\TestCase;

class CreatePostsTest extends TestCase
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



    /** @test */
    function create_new_a_post()
    {
        $post = make(Post::class);

        $this->assertInstanceOf(Post::class, $post);
    }

}
