<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Panel;

use InvalidArgumentException;

class PanelRegistry
{
    /** @var array<string, Panel> */
    protected array $panels = [];

    protected ?string $defaultPanelId = null;

    public function register(Panel $panel): static
    {
        $id = $panel->getId();
        $this->panels[$id] = $panel;

        if ($panel->isDefault() || $this->defaultPanelId === null) {
            $this->defaultPanelId = $id;
        }

        return $this;
    }

    public function get(string $id): Panel
    {
        if (! isset($this->panels[$id])) {
            throw new InvalidArgumentException("No admin panel registered with ID [{$id}].");
        }

        return $this->panels[$id];
    }

    public function has(string $id): bool
    {
        return isset($this->panels[$id]);
    }

    /**
     * @return array<string, Panel>
     */
    public function all(): array
    {
        return $this->panels;
    }

    public function getDefault(): ?Panel
    {
        if ($this->defaultPanelId && isset($this->panels[$this->defaultPanelId])) {
            return $this->panels[$this->defaultPanelId];
        }

        if (! empty($this->panels)) {
            return reset($this->panels);
        }

        return null;
    }
}
