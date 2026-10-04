<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Console;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin-panel:publish
                            {--config : Publish configuration file}
                            {--assets : Publish precompiled CSS/JS assets}
                            {--views : Publish Blade views}
                            {--lang : Publish language files}
                            {--force : Overwrite existing files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish Admin Panel assets, configuration, views, and translations';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $all = ! $this->option('config') && ! $this->option('assets') && ! $this->option('views') && ! $this->option('lang');

        $tags = [];

        if ($all || $this->option('config')) {
            $tags[] = 'admin-panel-config';
        }

        if ($all || $this->option('assets')) {
            $tags[] = 'admin-panel-assets';
        }

        if ($all || $this->option('views')) {
            $tags[] = 'admin-panel-views';
        }

        if ($all || $this->option('lang')) {
            $tags[] = 'admin-panel-lang';
        }

        foreach ($tags as $tag) {
            $params = [
                '--provider' => 'ImranDevBD\\LaravelAdminPanel\\AdminPanelServiceProvider',
                '--tag' => $tag,
            ];

            if ($this->option('force')) {
                $params['--force'] = true;
            }

            $this->call('vendor:publish', $params);
        }

        $this->components->info('Published requested Admin Panel resources successfully.');

        return self::SUCCESS;
    }
}
