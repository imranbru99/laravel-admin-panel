<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Navigation;

use Closure;

class NavigationItem
{
    protected string $label;

    protected ?string $icon = null;

    protected ?string $url = null;

    protected ?string $badge = null;

    protected ?string $badgeColor = 'primary';

    protected int $sort = 0;

    protected bool|Closure $visible = true;

    protected bool|Closure|null $active = null;

    public function __construct(string $label)
    {
        $this->label = $label;
    }

    public static function make(string $label): static
    {
        return new static($label);
    }

    public function label(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function icon(?string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function url(?string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url ?? '#';
    }

    public function badge(?string $badge, string $color = 'primary'): static
    {
        $this->badge = $badge;
        $this->badgeColor = $color;

        return $this;
    }

    public function getBadge(): ?string
    {
        return $this->badge;
    }

    public function getBadgeColor(): string
    {
        return $this->badgeColor ?? 'primary';
    }

    public function sort(int $sort): static
    {
        $this->sort = $sort;

        return $this;
    }

    public function getSort(): int
    {
        return $this->sort;
    }

    public function visible(bool|Closure $condition): static
    {
        $this->visible = $condition;

        return $this;
    }

    public function isVisible(): bool
    {
        if ($this->visible instanceof Closure) {
            return (bool) ($this->visible)();
        }

        return $this->visible;
    }

    public function active(bool|Closure $active): static
    {
        $this->active = $active;

        return $this;
    }

    public function isActive(): bool
    {
        if ($this->active instanceof Closure) {
            return (bool) ($this->active)();
        }

        if (is_bool($this->active)) {
            return $this->active;
        }

        if ($this->url !== null && function_exists('request')) {
            $req = request();

            return $req->fullUrlIs($this->url) || $req->is(trim($this->url, '/').'*');
        }

        return false;
    }
}
