<?php

namespace Canvas\Tests;

use Canvas\CanvasServiceProvider;
use Orchestra\Testbench\TestCase;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeatureTestCase extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase($this->app);
    }

    /**
     * @param Application $app
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            CanvasServiceProvider::class,
        ];
    }

    /**
     * @param Application $app
     * @return void
     */
    protected function resolveApplicationCore($app)
    {
        parent::resolveApplicationCore($app);

        $app->detectEnvironment(function () {
            return 'testing';
        });
    }

    /**
     * @param Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app): void
    {
        $config = $app->get('config');

        $config->set('database.default', 'sqlite');

        $config->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        $config->set('view.paths', [dirname(__DIR__).'/resources/views']);

        $config->set('auth.providers.users.model', User::class);
    }

    /**
     * @param Application $app
     * @return void
     */
    protected function setUpDatabase($app): void
    {
        $this->loadLaravelMigrations();

        $this->loadMigrationsFrom(dirname(__DIR__).'/database/migrations');

        $this->artisan('migrate');
    }
}
