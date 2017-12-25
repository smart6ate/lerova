<?php

namespace Tests\Feature\Contacts;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Contact;
use Tests\TestCase;

class CreateContactsTest extends TestCase
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
        $contacts = make(Contact::class);

        $this->assertInstanceOf(Contact::class, $contacts);
    }

}
