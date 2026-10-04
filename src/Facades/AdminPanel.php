<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Facades;

use Illuminate\Support\Facades\Facade;
use ImranDevBD\LaravelAdminPanel\Panel\Panel;

/**
 * @method static string version()
 * @method static \ImranDevBD\LaravelAdminPanel\AdminPanel registerPanel(Panel $panel)
 * @method static Panel getPanel(?string $id = null)
 * @method static ?Panel getCurrentPanel()
 * @method static void setCurrentPanel(Panel $panel)
 * @method static array<string, \ImranDevBD\LaravelAdminPanel\Panel\Panel> getPanels()
 * @method static \ImranDevBD\LaravelAdminPanel\Themes\ThemeRegistry getThemeRegistry()
 * @method static \Illuminate\Support\HtmlString renderHook(string $name, array<string, mixed> $scopes = [])
 * @method static void registerRenderHook(string $name, \Closure|string|\Illuminate\Contracts\Support\Htmlable $callback)
 *
 * @see \ImranDevBD\LaravelAdminPanel\AdminPanel
 */
class AdminPanel extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \ImranDevBD\LaravelAdminPanel\AdminPanel::class;
    }
}
