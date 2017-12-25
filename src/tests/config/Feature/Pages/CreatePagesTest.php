<?php

namespace Tests\Feature\Pages;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Page;
use Tests\TestCase;

class CreatePagesTest extends TestCase
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
    function create_a_page()
    {
        $page = make(Page::class);

        $this->assertInstanceOf(Page::class, $page);
    }

}
