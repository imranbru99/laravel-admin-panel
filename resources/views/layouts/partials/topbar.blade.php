@php
    $panel = $currentPanel ?? admin_panel()->getCurrentPanel();
    $breadcrumbs = $breadcrumbs ?? [
        ['label' => __('admin-panel::admin-panel.dashboard'), 'url' => $panel?->url('/') ?? '#', 'current' => true]
    ];
@endphp

<header class="admin-topbar">
    <div class="topbar-left">
        <!-- Mobile hamburger -->
        <button
            type="button"
            onclick="window.AdminPanel.sidebar.toggleMobile()"
            class="mobile-menu-btn admin-btn-ghost p-1.5 rounded"
            aria-label="Open Navigation"
        >
            <x-admin-panel::icon name="menu" class="w-5 h-5" />
        </button>

        {!! \ImranDevBD\LaravelAdminPanel\Facades\AdminPanel::renderHook(\ImranDevBD\LaravelAdminPanel\Support\RenderHook::TOPBAR_START) !!}

        <!-- Breadcrumbs -->
        <nav class="admin-breadcrumb" aria-label="Breadcrumb">
            @foreach ($breadcrumbs as $crumb)
                @if (! $loop->first)
                    <x-admin-panel::icon name="chevron-right" class="w-3.5 h-3.5 text-gray-400" />
                @endif

                @if ($crumb['current'] ?? false)
                    <span class="current">{{ $crumb['label'] }}</span>
                @else
                    <a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a>
                @endif
            @endforeach
        </nav>
    </div>

    <div class="topbar-right">
        <!-- Search Trigger / Command Palette shortcut -->
        <button
            type="button"
            class="admin-search-trigger"
            onclick="window.dispatchEvent(new CustomEvent('open-command-palette'))"
        >
            <x-admin-panel::icon name="search" class="w-4 h-4" />
            <span class="text-xs">{{ __('admin-panel::admin-panel.search_placeholder') }}</span>
            <kbd class="admin-search-kbd">⌘K</kbd>
        </button>

        {!! \ImranDevBD\LaravelAdminPanel\Facades\AdminPanel::renderHook(\ImranDevBD\LaravelAdminPanel\Support\RenderHook::TOPBAR_ACTIONS) !!}

        <!-- Theme Mode & Palette Toggle -->
        <x-admin-panel::theme-toggle :show-palette-selector="true" />

        <!-- User Dropdown Menu -->
        <x-admin-panel::dropdown align="right">
            <x-slot name="trigger">
                <button type="button" class="flex items-center gap-2 p-1 rounded-full hover:ring-2 hover:ring-[var(--admin-primary)] transition">
                    <div class="admin-avatar">
                        <span>{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</span>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <div class="px-3 py-2 border-b border-[var(--admin-border-subtle)]">
                    <p class="text-xs font-semibold text-[var(--admin-text)]">
                        {{ auth()->user()->name ?? 'Admin User' }}
                    </p>
                    <p class="text-[11px] text-[var(--admin-text-muted)] truncate">
                        {{ auth()->user()->email ?? 'admin@example.com' }}
                    </p>
                </div>

                <a href="{{ $panel?->url('/profile') ?? '#' }}" class="admin-dropdown-item">
                    <x-admin-panel::icon name="user" class="w-4 h-4" />
                    <span>{{ __('admin-panel::admin-panel.profile') }}</span>
                </a>

                <a href="{{ $panel?->url('/settings') ?? '#' }}" class="admin-dropdown-item">
                    <x-admin-panel::icon name="settings" class="w-4 h-4" />
                    <span>{{ __('admin-panel::admin-panel.settings') }}</span>
                </a>

                <div class="my-1 border-t border-[var(--admin-border-subtle)]"></div>

                @if (Route::has('admin-panel.logout'))
                    <form method="POST" action="{{ route('admin-panel.logout') }}">
                        @csrf
                        <button type="submit" class="admin-dropdown-item text-red-600 hover:text-red-700">
                            <x-admin-panel::icon name="log-out" class="w-4 h-4" />
                            <span>{{ __('admin-panel::admin-panel.logout') }}</span>
                        </button>
                    </form>
                @else
                    <button type="button" class="admin-dropdown-item text-red-600 hover:text-red-700">
                        <x-admin-panel::icon name="log-out" class="w-4 h-4" />
                        <span>{{ __('admin-panel::admin-panel.logout') }}</span>
                    </button>
                @endif
            </x-slot>
        </x-admin-panel::dropdown>

        {!! \ImranDevBD\LaravelAdminPanel\Facades\AdminPanel::renderHook(\ImranDevBD\LaravelAdminPanel\Support\RenderHook::TOPBAR_END) !!}
    </div>
</header>
