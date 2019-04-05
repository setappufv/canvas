<?php

namespace Canvas\Tests\Console;

use Canvas\Tests\TestCase;

class InstallCommandTest extends TestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function install_assets_and_configuration()
    {
        $this->artisan('canvas:install')
            ->expectsOutput('Publishing the assets...')
            ->expectsOutput('Publishing the configuration file...')
            ->expectsOutput('Running the database migrations...')
            ->expectsOutput('[✔] Canvas is installed and ready to use. Enjoy!')
            ->assertExitCode(0);
        $this->assertFileExists(config_path('canvas.php'));
        $this->assertDirectoryExists(public_path('vendor/canvas'));
    }
}
