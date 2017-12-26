<?php

namespace Tests\Feature\Administrator\Users;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Role;
use Tests\TestCase;

class UserAttributesTest extends TestCase
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

    public function publishUsers($overrides = [])
    {
        $role = factory(Role::class)->create([
            'name' => 'administrator',
        ]);

        $this->withExceptionHandling()->signInWithRole($role);

        $post = make(User::class, $overrides);

        return $this->post(route('lerova.administrator.users.store', $post->toArray()));
    }


    /** @test */
    function a_user_requires_a_name()
    {
        $this->publishUsers(['name' => null])
            ->assertSessionHasErrors('name');
    }

    /** @test */
    function a_user_requires_a_email()
    {
        $this->publishUsers(['email' => null])
            ->assertSessionHasErrors('email');
    }

    /** @test */
    function a_user_requires_a_password()
    {
        $this->publishUsers(['email' => null])
            ->assertSessionHasErrors('email');
    }


    /** @test */
    function a_user_requires_a_role_id()
    {
        $this->publishUsers(['role_id' => null])
            ->assertSessionHasErrors('role_id');
    }

}
