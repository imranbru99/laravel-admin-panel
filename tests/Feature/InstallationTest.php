<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Tests\Feature;

use ImranDevBD\LaravelAdminPanel\Tests\TestCase;

class InstallationTest extends TestCase
{
    public function test_install_command_runs_successfully(): void
    {
        $this->artisan('admin-panel:install', ['--force' => true])
            ->expectsConfirmation('Would you like to run migrations now?', 'no')
            ->assertSuccessful();
    }

    public function test_publish_command_runs_successfully(): void
    {
        $this->artisan('admin-panel:publish', ['--config' => true, '--force' => true])
            ->assertSuccessful();
    }
}
