<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Image;
use Smart6ate\Lerova\App\Models\Page;
use Tests\TestCase;

class ImageTest extends TestCase
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
    function an_event_has_an_author()
    {
        $image = create(Image::class);

        $this->assertInstanceOf(User::class, $image->author);
    }


    /** @test */
    function a_post_belongs_to_a_page()
    {
        $image = create(Image::class);

        $this->assertInstanceOf(Page::class, $image->page);
    }
}
