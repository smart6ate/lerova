<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Event;
use Smart6ate\Lerova\App\Models\Image;
use Smart6ate\Lerova\App\Models\Page;
use Smart6ate\Lerova\App\Models\Post;
use Tests\TestCase;

class PageTest extends TestCase
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
    public function a_page_consists_of_posts()
    {
        $page = create(Page::class);
        $post = create(Post::class, ['page_id' => $page->id]);

        $this->assertTrue($page->posts->contains($post));
    }

    /** @test */
    public function a_page_consists_of_events()
    {
        $page = create(Page::class);
        $event = create(Event::class, ['page_id' => $page->id]);

        $this->assertTrue($page->events->contains($event));
    }

    /** @test */
    public function a_page_consists_of_images()
    {
        $page = create(Page::class);
        $image = create(Image::class, ['page_id' => $page->id]);

        $this->assertTrue($page->images->contains($image));
    }


}
