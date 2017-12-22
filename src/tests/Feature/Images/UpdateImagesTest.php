<?php

namespace Tests\Feature\Images;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Image;
use Smart6ate\Lerova\App\Models\Post;
use Smart6ate\Lerova\App\Models\Role;
use Tests\TestCase;

class UpdateImagesTest extends TestCase
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
            'name' => 'images',
        ]);

        $this->withExceptionHandling()->signInWithRole($role);

    }

    /** @test */
    function a_image_update_requires_a_title()
    {
        $image = create(Image::class);

        $this->post(route('lerova.images.update', $image), [
            'title' => null
        ])->assertSessionHasErrors('title');
    }

    /** @test */
    function a_image_update_requires_tags()
    {
        $image = create(Image::class);

        $this->post(route('lerova.images.update', $image), [
            'tags' => null
        ])->assertSessionHasErrors('tags');
    }


    /** @test */
    function a_image_update_requires_a_image()
    {
        $image = create(Image::class);

        $this->post(route('lerova.images.update', $image), [
            'image' => null
        ])->assertSessionHasErrors('image');
    }

}
