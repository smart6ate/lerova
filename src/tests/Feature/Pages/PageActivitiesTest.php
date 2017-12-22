<?php

namespace Tests\Feature\Pages;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PageActivitiesTest extends TestCase
{

    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
    }

    /** @test */
    function a_page_activity_is_true()
    {
        $this->assertTrue(true);
    }

}
