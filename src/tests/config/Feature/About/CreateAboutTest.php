<?php

namespace Tests\Feature\About;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Smart6ate\Lerova\App\Models\About;
use Smart6ate\Lerova\App\Models\Post;
use Tests\TestCase;

class CreateAboutTest extends TestCase
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
    function create_about()
    {
        $about = make(About::class);

        $this->assertInstanceOf(About::class, $about);
    }

}
