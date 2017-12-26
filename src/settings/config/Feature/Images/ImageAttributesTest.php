<?php

namespace Tests\Feature\Posts;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Image;
use Smart6ate\Lerova\App\Models\Role;
use Tests\TestCase;

class ImageAttributesTest extends TestCase
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

    public function publishImages($overrides = [])
    {
        $role = factory(Role::class)->create([
            'name' => 'images',
        ]);

        $this->withExceptionHandling()->signInWithRole($role);

        $image = make(Image::class, $overrides);

        return $this->post(route('lerova.images.store', $image->toArray()));
    }

    /** @test */
    function a_image_requires_a_title()
    {
        $this->publishImages(['title' => null])
            ->assertSessionHasErrors('title');
    }

    /** @test */
    function a_image_requires_tags()
    {
        $this->publishImages(['tags' => null])
            ->assertSessionHasErrors('tags');
    }

    /** @test */
    function a_image_requires_a_image()
    {
        $this->publishImages(['image' => null])
            ->assertSessionHasErrors('image');
    }

}
