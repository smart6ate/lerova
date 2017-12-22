<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Role;
use Tests\TestCase;

class UserTest extends TestCase
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
    function a_user_can_have_one_role()
    {
        $role = create(Role::class);
        $user = create(User::class);

        $user->roles()->attach($role);

        $this->assertTrue($user->roles->contains('name',$role->name));
    }


    /** @test */
    function a_user_can_have_multiple_roles()
    {
        $role_one = create(Role::class);
        $role_two = create(Role::class);

        $user = create(User::class);

        $user->roles()->attach($role_one);
        $user->roles()->attach($role_two);

        $this->assertTrue($user->roles->contains('name',$role_one->name));
        $this->assertTrue($user->roles->contains('name',$role_two->name));
    }


}

