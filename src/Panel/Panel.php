<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Panel;

use Closure;
use ImranDevBD\LaravelAdminPanel\Navigation\NavigationGroup;
use ImranDevBD\LaravelAdminPanel\Navigation\NavigationItem;
use ImranDevBD\LaravelAdminPanel\Themes\Theme;

class Panel
{
    protected string $id;

    protected string $path = 'admin';

    protected ?string $domain = null;

    protected string $guard = 'web';

    /** @var array<int, string> */
    protected array $middleware = ['web'];

    protected Theme $theme;

    protected bool $isDefault = false;

    /** @var array<int, string> */
    protected array $resources = [];

    /** @var array<int, string> */
    protected array $pages = [];

    /** @var array<int, string> */
    protected array $widgets = [];

    /** @var array<int, NavigationItem|NavigationGroup> */
    protected array $navigationItems = [];

    /** @var array<int, Closure> */
    protected array $bootCallbacks = [];

    public function __construct(string $id)
    {
        $this->id = $id;
        $this->theme = new Theme;
    }

    public static function make(string $id = 'admin'): static
    {
        return new static($id);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function path(string $path): static
    {
        $this->path = trim($path, '/');

        return $this;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function domain(?string $domain): static
    {
        $this->domain = $domain;

        return $this;
    }

    public function getDomain(): ?string
    {
        return $this->domain;
    }

    public function guard(string $guard): static
    {
        $this->guard = $guard;

        return $this;
    }

    public function getGuard(): string
    {
        return $this->guard;
    }

    /**
     * @param  array<int, string>  $middleware
     */
    public function middleware(array $middleware): static
    {
        $this->middleware = $middleware;

        return $this;
    }

    /**
     * @return array<int, string>
     */
    public function getMiddleware(): array
    {
        return $this->middleware;
    }

    public function theme(Theme|string $theme): static
    {
        if (is_string($theme)) {
            $this->theme = new Theme($theme);
        } else {
            $this->theme = $theme;
        }

        return $this;
    }

    public function getTheme(): Theme
    {
        return $this->theme;
    }

    public function default(bool $condition = true): static
    {
        $this->isDefault = $condition;

        return $this;
    }

    public function isDefault(): bool
    {
        return $this->isDefault;
    }

    public function brandName(string $name): static
    {
        $this->theme->brandName($name);

        return $this;
    }

    public function getBrandName(): string
    {
        return $this->theme->getBrandName();
    }

    public function brandLogo(?string $url, ?string $darkUrl = null): static
    {
        $this->theme->brandLogo($url, $darkUrl);

        return $this;
    }

    /**
     * @param  array<int, string>  $resources
     */
    public function resources(array $resources): static
    {
        $this->resources = array_unique(array_merge($this->resources, $resources));

        return $this;
    }

    /**
     * @return array<int, string>
     */
    public function getResources(): array
    {
        return $this->resources;
    }

    /**
     * @param  array<int, string>  $pages
     */
    public function pages(array $pages): static
    {
        $this->pages = array_unique(array_merge($this->pages, $pages));

        return $this;
    }

    /**
     * @return array<int, string>
     */
    public function getPages(): array
    {
        return $this->pages;
    }

    /**
     * @param  array<int, string>  $widgets
     */
    public function widgets(array $widgets): static
    {
        $this->widgets = array_unique(array_merge($this->widgets, $widgets));

        return $this;
    }

    /**
     * @return array<int, string>
     */
    public function getWidgets(): array
    {
        return $this->widgets;
    }

    /**
     * @param  array<int, NavigationItem|NavigationGroup>  $items
     */
    public function navigation(array $items): static
    {
        $this->navigationItems = $items;

        return $this;
    }

    /**
     * @return array<int, NavigationItem|NavigationGroup>
     */
    public function getNavigation(): array
    {
        return $this->navigationItems;
    }

    public function booting(Closure $callback): static
    {
        $this->bootCallbacks[] = $callback;

        return $this;
    }

    public function boot(): void
    {
        foreach ($this->bootCallbacks as $callback) {
            $callback($this);
        }
    }

    /**
     * Generate URL for a path within this panel.
     */
    public function url(string $path = ''): string
    {
        $base = $this->path !== '' ? '/'.$this->path : '';
        $sub = trim($path, '/');

        if ($sub === '') {
            return $base !== '' ? $base : '/';
        }

        return $base.'/'.$sub;
    }
}
