<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Navigation;

use ImranDevBD\LaravelAdminPanel\Panel\Panel;

class NavigationManager
{
    /**
     * @return array<int, NavigationItem|NavigationGroup>
     */
    public function getNavigation(Panel $panel): array
    {
        $customNav = $panel->getNavigation();

        if (! empty($customNav)) {
            return $customNav;
        }

        // Default navigation if none explicitly configured:
        $defaultNav = [
            NavigationItem::make(__('admin-panel::admin-panel.dashboard'))
                ->icon('layout-dashboard')
                ->url($panel->url('/'))
                ->active(fn () => request()->is($panel->getPath()) || request()->is($panel->getPath().'/dashboard')),
        ];

        return $defaultNav;
    }
}
