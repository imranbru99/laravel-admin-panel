<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use ImranDevBD\LaravelAdminPanel\Console\InstallCommand;
use ImranDevBD\LaravelAdminPanel\Console\PublishCommand;
use ImranDevBD\LaravelAdminPanel\Navigation\NavigationManager;
use ImranDevBD\LaravelAdminPanel\Panel\Panel;
use ImranDevBD\LaravelAdminPanel\Panel\PanelManager;
use ImranDevBD\LaravelAdminPanel\Panel\PanelRegistry;
use ImranDevBD\LaravelAdminPanel\Themes\Theme;
use ImranDevBD\LaravelAdminPanel\Themes\ThemeRegistry;

class AdminPanelServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/admin-panel.php',
            'admin-panel'
        );

        $this->app->singleton(PanelRegistry::class, function () {
            return new PanelRegistry;
        });

        $this->app->singleton(PanelManager::class, function ($app) {
            return new PanelManager($app->make(PanelRegistry::class));
        });

        $this->app->singleton(ThemeRegistry::class, function () {
            $registry = new ThemeRegistry;

            $configTheme = new Theme(
                palette: (string) config('admin-panel.theme.default_palette', 'indigo'),
                mode: (string) config('admin-panel.theme.default_mode', 'system')
            );
            $configTheme->brandName((string) config('admin-panel.theme.brand_name', 'Admin Panel'));
            $configTheme->brandLogo(
                config('admin-panel.theme.brand_logo'),
                config('admin-panel.theme.brand_logo_dark')
            );
            $configTheme->radius((string) config('admin-panel.theme.radius', 'md'));
            $configTheme->density((string) config('admin-panel.theme.density', 'comfortable'));
            $configTheme->sidebarVariant((string) config('admin-panel.theme.sidebar_variant', 'inset'));
            $configTheme->fontFamily((string) config('admin-panel.theme.font_family', 'Inter, system-ui, sans-serif'));

            $registry->register('default', $configTheme);
            $registry->setDefaultTheme($configTheme);

            return $registry;
        });

        $this->app->singleton(NavigationManager::class, function () {
            return new NavigationManager;
        });

        $this->app->singleton(AdminPanel::class, function ($app) {
            $adminPanel = new AdminPanel(
                $app->make(PanelRegistry::class),
                $app->make(PanelManager::class),
                $app->make(ThemeRegistry::class)
            );

            // Register default panel from config
            $defaultPanel = Panel::make('admin')
                ->path((string) config('admin-panel.prefix', 'admin'))
                ->domain(config('admin-panel.domain'))
                ->guard((string) config('admin-panel.auth.guard', 'web'))
                ->middleware((array) config('admin-panel.middleware', ['web']))
                ->theme($app->make(ThemeRegistry::class)->getDefaultTheme())
                ->default(true);

            $adminPanel->registerPanel($defaultPanel);

            return $adminPanel;
        });

        $this->app->alias(AdminPanel::class, 'admin-panel');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerPublishing();
        $this->registerResources();
        $this->registerRoutes();
        $this->registerBladeComponents();
    }

    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                PublishCommand::class,
            ]);
        }
    }

    protected function registerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            // Config
            $this->publishes([
                __DIR__.'/../config/admin-panel.php' => config_path('admin-panel.php'),
            ], 'admin-panel-config');

            // Precompiled assets
            $this->publishes([
                __DIR__.'/../dist' => public_path(config('admin-panel.assets.publish_path', 'vendor/admin-panel')),
            ], 'admin-panel-assets');

            // Views
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/admin-panel'),
            ], 'admin-panel-views');

            // Translations
            $this->publishes([
                __DIR__.'/../resources/lang' => $this->app->langPath('vendor/admin-panel'),
            ], 'admin-panel-lang');
        }
    }

    protected function registerResources(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin-panel');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'admin-panel');
    }

    protected function registerRoutes(): void
    {
        /** @var AdminPanel $adminPanel */
        $adminPanel = $this->app->make(AdminPanel::class);

        foreach ($adminPanel->getPanels() as $panel) {
            $route = Route::prefix($panel->getPath());

            if ($domain = $panel->getDomain()) {
                $route->domain($domain);
            }

            $route->group(function () {
                $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
            });
        }
    }

    protected function registerBladeComponents(): void
    {
        Blade::componentNamespace('ImranDevBD\\LaravelAdminPanel\\View\\Components', 'admin-panel');

        // Anonymous Blade components under resources/views/components/
        $components = [
            'icon' => 'admin-panel::components.icon',
            'button' => 'admin-panel::components.button',
            'badge' => 'admin-panel::components.badge',
            'card' => 'admin-panel::components.card',
            'input' => 'admin-panel::components.input',
            'modal' => 'admin-panel::components.modal',
            'dropdown' => 'admin-panel::components.dropdown',
            'theme-toggle' => 'admin-panel::components.theme-toggle',
            'empty-state' => 'admin-panel::components.empty-state',
            'command-palette' => 'admin-panel::components.command-palette',
            'toast' => 'admin-panel::components.toast',
        ];

        foreach ($components as $alias => $view) {
            Blade::component($view, 'admin-panel::'.$alias);
        }
    }
}
