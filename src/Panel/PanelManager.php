<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Panel;

class PanelManager
{
    protected PanelRegistry $registry;

    protected ?Panel $currentPanel = null;

    public function __construct(PanelRegistry $registry)
    {
        $this->registry = $registry;
    }

    public function getRegistry(): PanelRegistry
    {
        return $this->registry;
    }

    public function setCurrentPanel(Panel $panel): void
    {
        $this->currentPanel = $panel;
    }

    public function getCurrentPanel(): ?Panel
    {
        return $this->currentPanel ?? $this->registry->getDefault();
    }
}
