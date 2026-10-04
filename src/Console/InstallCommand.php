<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin-panel:install
                            {--force : Overwrite existing files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install ImranDevBD Laravel Admin Panel into your application';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->components->info('Installing ImranDevBD Laravel Admin Panel...');

        // 1. Publish Configuration
        $this->components->task('Publishing configuration', function () {
            $params = [
                '--provider' => 'ImranDevBD\\LaravelAdminPanel\\AdminPanelServiceProvider',
                '--tag' => 'admin-panel-config',
            ];

            if ($this->option('force')) {
                $params['--force'] = true;
            }

            return $this->callSilent('vendor:publish', $params) === 0;
        });

        // 2. Publish Precompiled Assets
        $this->components->task('Publishing precompiled CSS & JS assets', function () {
            $params = [
                '--provider' => 'ImranDevBD\\LaravelAdminPanel\\AdminPanelServiceProvider',
                '--tag' => 'admin-panel-assets',
            ];

            if ($this->option('force')) {
                $params['--force'] = true;
            }

            return $this->callSilent('vendor:publish', $params) === 0;
        });

        // 3. Ask to run migrations if any exist
        if ($this->confirm('Would you like to run migrations now?', true)) {
            $this->call('migrate');
        }

        $prefix = (string) config('admin-panel.prefix', 'admin');
        $url = url()->to($prefix);

        $this->newLine();
        $this->components->info('Laravel Admin Panel installed successfully! 🎉');
        $this->components->twoColumnDetail('Dashboard URL', $url);
        $this->components->twoColumnDetail('Config file', config_path('admin-panel.php'));
        $this->newLine();

        return self::SUCCESS;
    }
}
