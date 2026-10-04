<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Route Prefix & Domain
    |--------------------------------------------------------------------------
    |
    | Define the base URL route prefix and optional custom domain for the default
    | admin panel. You may customize this via the ADMIN_PANEL_PREFIX env var.
    |
    */

    'prefix' => env('ADMIN_PANEL_PREFIX', 'admin'),

    'domain' => env('ADMIN_PANEL_DOMAIN', null),

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    |
    | The middleware stack applied to all admin panel routes. The package's
    | context middleware is automatically appended to initialize panel state.
    |
    */

    'middleware' => [
        'web',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication & Guard
    |--------------------------------------------------------------------------
    |
    | Choose which guard and user provider model the admin panel should use.
    |
    */

    'auth' => [
        'guard' => env('ADMIN_PANEL_GUARD', 'web'),
        'user_model' => env('ADMIN_PANEL_USER_MODEL', 'App\\Models\\User'),
        'enable_registration' => env('ADMIN_PANEL_REGISTRATION', false),
        'enable_password_reset' => env('ADMIN_PANEL_PASSWORD_RESET', true),
        'enable_2fa' => env('ADMIN_PANEL_2FA', true),
        'enable_passkeys' => env('ADMIN_PANEL_PASSKEYS', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Theme & Branding
    |--------------------------------------------------------------------------
    |
    | The default theme settings for panels. Consumers and end-users can adjust
    | mode (light, dark, system) and color palette without recompiling any CSS.
    | Built-in palettes: zinc, slate, blue, indigo, violet, emerald, rose, amber.
    |
    */

    'theme' => [
        'brand_name' => env('ADMIN_PANEL_NAME', 'Admin Panel'),
        'brand_logo' => null,
        'brand_logo_dark' => null,
        'default_mode' => 'system', // 'light', 'dark', 'system'
        'default_palette' => 'indigo', // zinc, slate, blue, indigo, violet, emerald, rose, amber
        'sidebar_variant' => 'inset', // classic, inset, floating
        'density' => 'comfortable', // comfortable, compact
        'radius' => 'md', // sm, md, lg, xl
        'font_family' => 'Inter, system-ui, sans-serif',
    ],

    /*
    |--------------------------------------------------------------------------
    | Navigation & Layout
    |--------------------------------------------------------------------------
    |
    | Configure default layout settings such as container width, collapsed
    | sidebar by default, and breadcrumb rendering.
    |
    */

    'layout' => [
        'max_width' => 'full', // 'full', '7xl', '6xl'
        'sidebar_collapsed' => false,
        'breadcrumbs' => true,
        'sticky_header' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Modular Features
    |--------------------------------------------------------------------------
    |
    | Enable or disable built-in modules. Each feature is cleanly toggleable
    | so unneeded modules never load routes, migrations, or navigation items.
    |
    */

    'features' => [
        'rbac' => true,
        'media_library' => true,
        'audit_log' => true,
        'activity_feed' => true,
        'notifications' => true,
        'global_search' => true,
        'system_health' => true,
        'settings' => true,
        'api' => false,
        'tenancy' => false,
        'ai' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Precompiled Asset Settings
    |--------------------------------------------------------------------------
    |
    | By default, the panel serves precompiled assets from the published
    | public directory `public/vendor/admin-panel`. When developing or in
    | local fallback, the package can serve directly from package assets.
    |
    */

    'assets' => [
        'publish_path' => 'vendor/admin-panel',
        'serve_fallback' => true,
    ],

];
