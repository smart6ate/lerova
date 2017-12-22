<?php

namespace Tests\Feature\Contacts;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ContactActivitiesTest extends TestCase
{
    use DatabaseMigrations;


    protected function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
    }

    /** @test */
    function a_contact_activity_is_true()
    {
        $this->assertTrue(true);
    }

}
