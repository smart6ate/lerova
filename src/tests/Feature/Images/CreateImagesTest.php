<?php

namespace Tests\Feature\Posts;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Image;
use Tests\TestCase;

class CreateImagesTest extends TestCase
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
    function create_new_a_image()
    {
        $image = make(Image::class);

        $this->assertInstanceOf(Image::class, $image);
    }

}
