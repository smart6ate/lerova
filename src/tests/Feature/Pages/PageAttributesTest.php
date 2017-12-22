<?php

namespace Tests\Feature\Posts;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Page;
use Smart6ate\Lerova\App\Models\Post;
use Smart6ate\Lerova\App\Models\Role;
use Tests\TestCase;

class PageAttributesTest extends TestCase
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

    public function publishPages($overrides = [])
    {
        $role = factory(Role::class)->create([
            'name' => 'administrator',
        ]);

        $this->withExceptionHandling()->signInWithRole($role);

        $page = make(Page::class, $overrides);

        return $this->post(route('lerova.administrator.meta.store', $page->toArray()));
    }

    /** @test */
    function a_post_requires_a_title()
    {
        $this->publishPages(['title' => null])
            ->assertSessionHasErrors('title');
    }



}
