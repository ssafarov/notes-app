<?php

    namespace Tests\Unit;

    use Tests\TestCase;

    class ApiTest extends TestCase
    {
        /**
         * A basic unit api test for note creation.
         *
         * @return void
         */
        public function testNoteCreateApi()
        {
            $response = $this->json('PUT', 'api/note/create',
                ['title' => 'Test note from API UT', 'content' => 'Test note content from API UT']);

            $response
                ->assertStatus(200)
                ->assertJson([
                    'title' => 'Test note from API UT', 'content' => 'Test note content from API UT'
                ]);

        }
    }
