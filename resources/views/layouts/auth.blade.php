<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    {!! \ImranDevBD\LaravelAdminPanel\Facades\AdminPanel::renderHook(\ImranDevBD\LaravelAdminPanel\Support\RenderHook::HEAD_START) !!}
    @include('admin-panel::layouts.partials.head')
</head>
<body class="h-full bg-[var(--admin-bg)] text-[var(--admin-text)] antialiased flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-6">
        @php
            $panel = $currentPanel ?? admin_panel()->getCurrentPanel();
            $theme = $currentTheme ?? $panel?->getTheme() ?? admin_panel()->getThemeRegistry()->getDefaultTheme();
        @endphp

        <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-[var(--admin-primary)] text-[var(--admin-primary-foreground)] shadow-lg mb-4">
            <x-admin-panel::icon name="sparkles" class="w-6 h-6" />
        </div>

        <h2 class="text-2xl font-bold tracking-tight text-[var(--admin-text)]">
            {{ $title ?? $theme->getBrandName() }}
        </h2>
        @if (isset($subtitle))
            <p class="mt-2 text-sm text-[var(--admin-text-muted)]">
                {{ $subtitle }}
            </p>
        @endif
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="admin-card p-6 sm:p-8">
            {{ $slot ?? '' }}
            @yield('content')
        </div>

        <div class="mt-6 flex justify-center">
            <x-admin-panel::theme-toggle :show-palette-selector="true" />
        </div>
    </div>

    @include('admin-panel::layouts.partials.footer')
</body>
</html>
