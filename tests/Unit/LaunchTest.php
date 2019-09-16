<?php

    namespace Tests\Unit;

    use Tests\TestCase;

    class LaunchTest extends TestCase
    {
        /**
         * A basic unit test to launch app.
         *
         * @return void
         */
        public function testLaunch()
        {
            $response = $this->get('/');
            $response->assertStatus(200);
        }
    }
