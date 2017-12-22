<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Page;
use Smart6ate\Lerova\App\Models\Post;
use Tests\TestCase;

class PostTest extends TestCase
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
    function a_post_has_an_author()
    {
        $post = create(Post::class);

        $this->assertInstanceOf(User::class, $post->author);
    }


    /** @test */
    function a_post_belongs_to_a_page()
    {
        $post = create(Post::class);

        $this->assertInstanceOf(Page::class, $post->page);
    }
}
