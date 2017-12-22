<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Page;
use Smart6ate\Lerova\App\Models\Post;
use Tests\TestCase;

class RoleTest extends TestCase
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
    function role_test_assert_true()
    {
        $this->assertTrue(true);
    }

}
