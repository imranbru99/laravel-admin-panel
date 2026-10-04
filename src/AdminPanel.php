<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel;

use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use ImranDevBD\LaravelAdminPanel\Panel\Panel;
use ImranDevBD\LaravelAdminPanel\Panel\PanelManager;
use ImranDevBD\LaravelAdminPanel\Panel\PanelRegistry;
use ImranDevBD\LaravelAdminPanel\Support\RenderHook;
use ImranDevBD\LaravelAdminPanel\Themes\ThemeRegistry;

class AdminPanel
{
    public const VERSION = '1.0.0';

    protected PanelRegistry $panelRegistry;

    protected PanelManager $panelManager;

    protected ThemeRegistry $themeRegistry;

    public function __construct(
        PanelRegistry $panelRegistry,
        PanelManager $panelManager,
        ThemeRegistry $themeRegistry
    ) {
        $this->panelRegistry = $panelRegistry;
        $this->panelManager = $panelManager;
        $this->themeRegistry = $themeRegistry;
    }

    public function version(): string
    {
        return self::VERSION;
    }

    public function registerPanel(Panel $panel): static
    {
        $this->panelRegistry->register($panel);

        return $this;
    }

    public function getPanel(?string $id = null): Panel
    {
        if ($id === null) {
            $current = $this->getCurrentPanel();
            if ($current !== null) {
                return $current;
            }
            $default = $this->panelRegistry->getDefault();
            if ($default !== null) {
                return $default;
            }
            throw new \RuntimeException('No default admin panel is registered.');
        }

        return $this->panelRegistry->get($id);
    }

    public function getCurrentPanel(): ?Panel
    {
        return $this->panelManager->getCurrentPanel();
    }

    public function setCurrentPanel(Panel $panel): void
    {
        $this->panelManager->setCurrentPanel($panel);
    }

    /**
     * @return array<string, Panel>
     */
    public function getPanels(): array
    {
        return $this->panelRegistry->all();
    }

    public function getThemeRegistry(): ThemeRegistry
    {
        return $this->themeRegistry;
    }

    /**
     * @param  array<string, mixed>  $scopes
     */
    public function renderHook(string $name, array $scopes = []): HtmlString
    {
        return RenderHook::render($name, $scopes);
    }

    public function registerRenderHook(string $name, Closure|string|Htmlable $callback): void
    {
        RenderHook::register($name, $callback);
    }
}
