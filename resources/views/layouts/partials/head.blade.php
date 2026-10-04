@php
    $panel = $currentPanel ?? admin_panel()->getCurrentPanel();
    $theme = $currentTheme ?? $panel?->getTheme() ?? admin_panel()->getThemeRegistry()->getDefaultTheme();
    $cssAsset = file_exists(public_path(config('admin-panel.assets.publish_path', 'vendor/admin-panel') . '/css/admin-panel.css'))
        ? asset(config('admin-panel.assets.publish_path', 'vendor/admin-panel') . '/css/admin-panel.css')
        : route('admin-panel.asset', ['file' => 'admin-panel.css']);
@endphp

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="admin-panel-prefix" content="{{ $panel?->getPath() ?? config('admin-panel.prefix', 'admin') }}">

<title>{{ isset($title) ? $title . ' - ' : '' }}{{ $theme->getBrandName() }}</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

<!-- Synchronous Anti-Flash Theme Engine (Runs before CSS render) -->
<script>
(function() {
    try {
        var storedMode = localStorage.getItem('admin_panel_theme_mode') || '{{ $theme->getMode() }}';
        var isSystemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        var root = document.documentElement;

        if (storedMode === 'dark' || (storedMode === 'system' && isSystemDark)) {
            root.classList.add('dark');
        } else {
            root.classList.remove('dark');
        }

        var storedPalette = localStorage.getItem('admin_panel_theme_palette') || '{{ $theme->getPalette() }}';
        if (storedPalette) {
            root.setAttribute('data-palette', storedPalette);
        }

        var sidebarState = localStorage.getItem('admin_panel_sidebar_collapsed');
        if (sidebarState === 'true') {
            root.setAttribute('data-sidebar-collapsed', 'true');
        }
    } catch (e) {}
})();
</script>

<!-- Dynamic Theme CSS Tokens -->
<style id="admin-panel-tokens">
{!! $theme->renderCss() !!}
</style>

<!-- Precompiled Stylesheet -->
<link rel="stylesheet" href="{{ $cssAsset }}">

{!! \ImranDevBD\LaravelAdminPanel\Facades\AdminPanel::renderHook(\ImranDevBD\LaravelAdminPanel\Support\RenderHook::HEAD_END) !!}
