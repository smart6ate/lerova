<?php

namespace Tests\Browser\Pages\Lerova\Settings\Modules;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

class PrivacyPage
    extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */

    public function url()
    {
        return route('lerova.settings.index');
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs(route('lerova.settings.index'));

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
