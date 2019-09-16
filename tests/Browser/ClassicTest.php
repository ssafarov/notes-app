<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Throwable;

class ClassicTest extends DuskTestCase
{
    /**
     * A Dusk test for add new note in classic app.
     *
     * @return void
     * @throws Throwable
     */
    public function testClassicAddNewNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Simple')
                ->click('#app-classic')
                ->waitForLocation('/notes')
                ->click('.ann-lnk')
                ->waitForLocation('/notes/create')
                ->assertSee('Creating new note')
                ->type('title', 'Test Note Title - '.microtime())
                ->type('content', 'Test Note Content is here.')
                ->clear('title')
                ->press('Add note')
                ->assertSee('Something went wrong')
                ->type('title', 'Test Note Title - '.microtime())
                ->type('content', 'Test Note Content is here.')
                ->press('Add note')
                ->waitForLocation('/notes')
                ->assertSee('Note created successfully!');
        });
    }

    /**
     * A Dusk test for view note in classic app.
     *
     * @return void
     * @throws Throwable
     */
    public function testClassicViewNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Simple')
                ->click('#app-classic')
                ->waitForLocation('/notes')
                ->with('#laravel_crud', function ($table) {
                    $table->assertSee('View')
                        ->clickLink('View');
                })
                ->assertSee('Show Note')
                ->click('.btn-secondary')
                ->waitForLocation('/notes');
        });
    }

    /**
     * A Dusk test for edit note in classic app.
     *
     * @return void
     * @throws Throwable
     */
    public function testClassicEditNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Simple')
                ->click('#app-classic')
                ->waitForLocation('/notes')
                ->with('#laravel_crud', function ($table) {
                    $table->assertSee('Edit')
                        ->clickLink('Edit');
                })
                ->assertSee('Update Note')
                ->type('title', 'Test note updated')
                ->click('.btn-primary')
                ->waitForLocation('/notes')
                ->assertSee('Note updated successfully!')
                ->assertSee('Test note updated')
                ->with('#laravel_crud', function ($table) {
                    $table->assertSee('Edit')
                        ->clickLink('Edit');
                })
                ->assertSee('Update Note')
                ->click('.btn-secondary')
                ->waitForLocation('/notes')
                ->assertSee('Test note updated');
        });
    }

    /**
     * A Dusk test for delete note in classic app.
     *
     * @return void
     * @throws Throwable
     */
    public function testClassicDeleteNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Simple')
                ->click('#app-classic')
                ->waitForLocation('/notes')
                ->with('#laravel_crud', function ($table) {
                    $table->assertSee('Delete')
                        ->Press('Delete');
                })
                ->waitForLocation('/notes')
                ->assertSee('Note deleted successfully!');
        });
    }
}
