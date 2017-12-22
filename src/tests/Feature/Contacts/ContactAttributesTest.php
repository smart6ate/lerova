<?php

namespace Tests\Feature\Contacts;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Contact;
use Smart6ate\Lerova\App\Models\Role;
use Tests\TestCase;

class ContactAttributesTest extends TestCase
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

    public function publishContacts($overrides = [])
    {
        $role = factory(Role::class)->create([
            'name' => 'notifications',
        ]);

        $this->withExceptionHandling()->signInWithRole($role);

        $contact = make(Contact::class, $overrides);

        return $this->post(route('lerova.notifications.store', $contact->toArray()));
    }

    /** @test */
    function a_contact_requires_a_name()
    {
       $this->publishContacts(['name' => null])
            ->assertSessionHasErrors('name');
    }

}
