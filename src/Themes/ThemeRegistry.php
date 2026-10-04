<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Themes;

class ThemeRegistry
{
    /**
     * @var array<string, Theme>
     */
    protected array $themes = [];

    protected ?Theme $defaultTheme = null;

    public function register(string $id, Theme $theme): static
    {
        $this->themes[$id] = $theme;

        if ($this->defaultTheme === null) {
            $this->defaultTheme = $theme;
        }

        return $this;
    }

    public function get(string $id): ?Theme
    {
        return $this->themes[$id] ?? null;
    }

    public function has(string $id): bool
    {
        return isset($this->themes[$id]);
    }

    public function getDefaultTheme(): Theme
    {
        if ($this->defaultTheme === null) {
            $this->defaultTheme = new Theme;
        }

        return $this->defaultTheme;
    }

    public function setDefaultTheme(Theme $theme): static
    {
        $this->defaultTheme = $theme;

        return $this;
    }
}
