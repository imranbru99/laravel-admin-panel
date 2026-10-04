<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    {!! \ImranDevBD\LaravelAdminPanel\Facades\AdminPanel::renderHook(\ImranDevBD\LaravelAdminPanel\Support\RenderHook::HEAD_START) !!}
    @include('admin-panel::layouts.partials.head')
</head>
<body class="h-full bg-[var(--admin-bg)] text-[var(--admin-text)] antialiased">
    {!! \ImranDevBD\LaravelAdminPanel\Facades\AdminPanel::renderHook(\ImranDevBD\LaravelAdminPanel\Support\RenderHook::BODY_START) !!}

    <div class="admin-layout">
        <!-- Sidebar Navigation -->
        @include('admin-panel::layouts.partials.sidebar')

        <!-- Mobile Drawer Backdrop Overlay -->
        @include('admin-panel::layouts.partials.mobile-drawer')

        <!-- Main Workspace Area -->
        <div class="admin-main">
            <!-- Topbar Navigation -->
            @include('admin-panel::layouts.partials.topbar')

            <!-- Page Content -->
            <main class="admin-content {{ config('admin-panel.layout.max_width') === '7xl' ? 'container-7xl' : 'container-full' }}">
                {!! \ImranDevBD\LaravelAdminPanel\Facades\AdminPanel::renderHook(\ImranDevBD\LaravelAdminPanel\Support\RenderHook::PAGE_BEFORE_CONTENT) !!}

                {{ $slot ?? '' }}
                @yield('content')

                {!! \ImranDevBD\LaravelAdminPanel\Facades\AdminPanel::renderHook(\ImranDevBD\LaravelAdminPanel\Support\RenderHook::PAGE_AFTER_CONTENT) !!}
            </main>
        </div>
    </div>

    <!-- Global Interactive Command Palette (Cmd+K) -->
    <x-admin-panel::command-palette />

    <!-- Global Toast Notifications Container -->
    <x-admin-panel::toast />

    @include('admin-panel::layouts.partials.footer')
</body>
</html>
