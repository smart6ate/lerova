<?php

namespace Tests\Feature\Posts;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Post;
use Smart6ate\Lerova\App\Models\Role;
use Tests\TestCase;

class PostAttributesTest extends TestCase
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

    public function publishPosts($overrides = [])
    {
        $role = factory(Role::class)->create([
            'name' => 'posts',
        ]);

        $this->withExceptionHandling()->signInWithRole($role);

        $post = make(Post::class, $overrides);

        return $this->post(route('lerova.posts.store', $post->toArray()));
    }

    /** @test */
    function a_post_requires_a_title()
    {
        $this->publishPosts(['title' => null])
            ->assertSessionHasErrors('title');
    }

    /** @test */
    function a_post_requires_a_teaser()
    {
        $this->publishPosts(['teaser' => null])
            ->assertSessionHasErrors('teaser');
    }

    /** @test */
    function a_post_requires_a_body()
    {
        $this->publishPosts(['body' => null])
            ->assertSessionHasErrors('body');
    }

    /** @test */
    function a_post_requires_tags()
    {
        $this->publishPosts(['tags' => null])
            ->assertSessionHasErrors('tags');
    }


    /** @test */
    function a_post_requires_a_image()
    {
        $this->publishPosts(['image' => null])
            ->assertSessionHasErrors('image');
    }

}
