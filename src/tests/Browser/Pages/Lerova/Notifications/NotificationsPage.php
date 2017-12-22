<?php

namespace Tests\Browser\Pages\Lerova\Dashboard\Notiications;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

class NotificationsPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */

    public function url()
    {
        return route('lerova.notifications.index');
    }


    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs(route('lerova.notifications.index'));

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
