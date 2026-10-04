<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Navigation;

use Closure;

class NavigationGroup
{
    protected string $label;

    protected ?string $icon = null;

    protected bool $collapsible = true;

    protected bool $collapsed = false;

    protected int $sort = 0;

    protected bool|Closure $visible = true;

    /** @var array<int, NavigationItem> */
    protected array $items = [];

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

    public function collapsible(bool $collapsible = true): static
    {
        $this->collapsible = $collapsible;

        return $this;
    }

    public function isCollapsible(): bool
    {
        return $this->collapsible;
    }

    public function collapsed(bool $collapsed = true): static
    {
        $this->collapsed = $collapsed;

        return $this;
    }

    public function isCollapsed(): bool
    {
        return $this->collapsed;
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

    /**
     * @param  array<int, NavigationItem>  $items
     */
    public function items(array $items): static
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @return array<int, NavigationItem>
     */
    public function getItems(): array
    {
        return array_values(array_filter($this->items, fn ($item) => $item->isVisible()));
    }
}
