<?php

namespace Tests\Feature\About;

use Smart6ate\Lerova\App\Models\About;
use Smart6ate\Lerova\App\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AboutActivitiesTest extends TestCase
{

    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
    }

    /** @test */
    function guests_may_not_update_about()
    {
        $this->withExceptionHandling();

        $this->get(route('lerova.about.edit'))
            ->assertRedirect(route('login'));

    }
}
