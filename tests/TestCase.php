<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Tests;

use ImranDevBD\LaravelAdminPanel\AdminPanelServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            AdminPanelServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('app.key', 'base64:6Cu/ozMDhuCQ455+hWJ6m4J2o6n0N/uHk9sF8xU+y0k=');
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
        $app['config']->set('admin-panel.prefix', 'admin');
        $app['config']->set('admin-panel.theme.default_palette', 'indigo');
    }
}
