<?php

namespace Canvas\Tests\Console;

use Canvas\Tests\TestCase;

class PublishCommandTest extends TestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function publish_assets_and_configuration()
    {
        $this->artisan('canvas:publish')
            ->expectsOutput('[✔] Canvas assets have published successfully.')
            ->assertExitCode(0);
        $this->assertFileExists(config_path('canvas.php'));
        $this->assertDirectoryExists(public_path('vendor/canvas'));
    }
}
