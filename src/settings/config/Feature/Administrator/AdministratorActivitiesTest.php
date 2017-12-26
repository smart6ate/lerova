<?php

namespace Tests\Feature\Administrator;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdministratorActivitiesTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
    }

    /** @test */
    function an_administrator_activity_is_true()
    {
        $this->assertTrue(true);
    }

}

