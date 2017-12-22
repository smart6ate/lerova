<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\SignUpPage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class SignUpTest extends DuskTestCase
{

    use DatabaseMigrations;

    
    /** @test */
    public function a_user_can_sign_up()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new SignUpPage)
                ->signUp('Tabby Garrett', 'tabby@smartgate.ch','normal','normal')
                ->assertPathIs('/leads')
                ->assertSeeIn('.navbar','Tabby Garrett') ;
        });
    }
}
