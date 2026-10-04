@php
    $panel = $currentPanel ?? admin_panel()->getCurrentPanel();
    $theme = $currentTheme ?? $panel?->getTheme() ?? admin_panel()->getThemeRegistry()->getDefaultTheme();
    $navigationManager = app(\ImranDevBD\LaravelAdminPanel\Navigation\NavigationManager::class);
    $navigation = $panel ? $navigationManager->getNavigation($panel) : [];
@endphp

<aside class="admin-sidebar">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <a href="{{ $panel?->url('/') ?? url('/') }}" class="sidebar-brand">
            @if ($theme->getBrandLogo())
                <img src="{{ $theme->getBrandLogo() }}" alt="{{ $theme->getBrandName() }}" class="h-8 w-auto">
            @else
                <div class="sidebar-logo-icon">
                    <x-admin-panel::icon name="sparkles" class="w-4 h-4" />
                </div>
            @endif
            <span class="sidebar-brand-name">{{ $theme->getBrandName() }}</span>
        </a>

        <button
            type="button"
            onclick="window.AdminPanel.sidebar.toggle()"
            class="admin-btn-ghost p-1 rounded hidden lg:inline-flex"
            title="Toggle Sidebar"
            aria-label="Toggle Sidebar"
        >
            <x-admin-panel::icon name="panel-left-close" class="w-4 h-4" />
        </button>
    </div>

    {!! \ImranDevBD\LaravelAdminPanel\Facades\AdminPanel::renderHook(\ImranDevBD\LaravelAdminPanel\Support\RenderHook::SIDEBAR_HEADER) !!}

    <!-- Navigation List -->
    <nav class="sidebar-nav">
        @foreach ($navigation as $entry)
            @if ($entry instanceof \ImranDevBD\LaravelAdminPanel\Navigation\NavigationGroup)
                @if ($entry->isVisible())
                    <div class="sidebar-group">
                        <div class="sidebar-group-title">{{ $entry->getLabel() }}</div>
                        @foreach ($entry->getItems() as $item)
                            <a
                                href="{{ $item->getUrl() }}"
                                class="sidebar-link {{ $item->isActive() ? 'active' : '' }}"
                                title="{{ $item->getLabel() }}"
                            >
                                @if ($item->getIcon())
                                    <x-admin-panel::icon :name="$item->getIcon()" class="sidebar-icon" />
                                @endif
                                <span class="sidebar-text">{{ $item->getLabel() }}</span>
                                @if ($item->getBadge())
                                    <span class="sidebar-badge">{{ $item->getBadge() }}</span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                @endif
            @elseif ($entry instanceof \ImranDevBD\LaravelAdminPanel\Navigation\NavigationItem)
                @if ($entry->isVisible())
                    <a
                        href="{{ $entry->getUrl() }}"
                        class="sidebar-link {{ $entry->isActive() ? 'active' : '' }}"
                        title="{{ $entry->getLabel() }}"
                    >
                        @if ($entry->getIcon())
                            <x-admin-panel::icon :name="$entry->getIcon()" class="sidebar-icon" />
                        @endif
                        <span class="sidebar-text">{{ $entry->getLabel() }}</span>
                        @if ($entry->getBadge())
                            <span class="sidebar-badge">{{ $entry->getBadge() }}</span>
                        @endif
                    </a>
                @endif
            @endif
        @endforeach
    </nav>

    {!! \ImranDevBD\LaravelAdminPanel\Facades\AdminPanel::renderHook(\ImranDevBD\LaravelAdminPanel\Support\RenderHook::SIDEBAR_FOOTER) !!}

    <!-- Sidebar Footer -->
    <div class="sidebar-footer">
        <div class="flex items-center gap-3">
            <div class="admin-avatar">
                <span>{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</span>
            </div>
            <div class="sidebar-text">
                <p class="text-xs font-semibold leading-tight text-[var(--admin-text)]">
                    {{ auth()->user()->name ?? 'Admin User' }}
                </p>
                <p class="text-[11px] text-[var(--admin-text-muted)] leading-tight">
                    {{ auth()->user()->email ?? 'admin@example.com' }}
                </p>
            </div>
        </div>
    </div>
</aside>
