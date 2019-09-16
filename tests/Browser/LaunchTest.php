<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Throwable;

class LaunchTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws Throwable
     */
    public function testLaunch(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Simple')
                    ->click('#app-classic')
                    ->waitForLocation('/notes')
                    ->click('.welcome-lnk')
                    ->waitForLocation('/')
                    ->click('#app-modern')
                    ->waitForLocation('/modern')
                    ->click('.welcome-lnk')
                    ->assertSee('Simple');
        });
    }

}
