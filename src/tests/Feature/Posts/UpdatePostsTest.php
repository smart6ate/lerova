<?php

namespace Tests\Feature\Posts;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\Post;
use Smart6ate\Lerova\App\Models\Role;
use Tests\TestCase;

class UpdatePostsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    /** @test */
    function a_post_update_activity_is_true()
    {
        $this->assertTrue(true);
    }

}
