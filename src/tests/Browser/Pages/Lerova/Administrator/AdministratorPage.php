<?php

namespace Tests\Browser\Pages\Lerova\Dashboard\Administrator;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

class AdministratorPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */

    public function url()
    {
        return route('lerova.administrator.index');
    }


    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs(route('lerova.administrator.index'));

    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [

        ];
    }
}
