<?php

declare(strict_types=1);

use ImranDevBD\LaravelAdminPanel\AdminPanel;
use ImranDevBD\LaravelAdminPanel\Panel\Panel;

if (! function_exists('admin_panel')) {
    /**
     * Get the AdminPanel singleton or a specific panel instance.
     */
    function admin_panel(?string $id = null): AdminPanel|Panel
    {
        $adminPanel = app(AdminPanel::class);

        if ($id !== null) {
            return $adminPanel->getPanel($id);
        }

        return $adminPanel;
    }
}
