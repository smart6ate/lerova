<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Event;
use Smart6ate\Lerova\App\Models\Page;
use Tests\TestCase;

class EventTest extends TestCase
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
        $event = create(Event::class);

        $this->assertInstanceOf(User::class, $event->author);
    }


    /** @test */
    function a_post_belongs_to_a_page()
    {
        $event = create(Event::class);

        $this->assertInstanceOf(Page::class, $event->page);
    }
}
