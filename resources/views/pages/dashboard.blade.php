@extends('admin-panel::layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Page Header with Modern Actions -->
    <div class="page-header">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-[var(--admin-primary-subtle)] text-[var(--admin-primary-subtle-text)]">
                    ⚡ 2027 Production Ready
                </span>
                <span class="text-xs text-[var(--admin-text-muted)]">• Last synced 2m ago</span>
            </div>
            <h1 class="page-title">{{ $title ?? __('admin-panel::admin-panel.dashboard') }}</h1>
            <p class="page-subtitle">{{ __('admin-panel::admin-panel.dashboard_subtitle') }}</p>
        </div>
        <div class="page-actions">
            <x-admin-panel::button
                variant="secondary"
                icon="search"
                onclick="window.AdminPanel.openCommandPalette()"
            >
                Quick Jump (⌘K)
            </x-admin-panel::button>
            <x-admin-panel::button
                variant="primary"
                icon="sparkles"
                onclick="window.AdminPanel.toast({ type: 'success', message: 'Real-time telemetry updated!' })"
            >
                Live Refresh
            </x-admin-panel::button>
        </div>
    </div>

    <!-- Stat Metrics Row with High-Definition Sparklines -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.25rem;">
        <!-- Card 1: Revenue -->
        <x-admin-panel::card>
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
                <span style="font-size: 0.8125rem; font-weight: 500; color: var(--admin-text-muted);">Total Revenue</span>
                <div style="width: 2rem; height: 2rem; border-radius: var(--admin-radius); background: var(--admin-primary-subtle); color: var(--admin-primary-subtle-text); display: flex; align-items: center; justify-content: center;">
                    <x-admin-panel::icon name="sparkles" class="w-4 h-4" />
                </div>
            </div>
            <div style="display: flex; align-items: baseline; justify-content: space-between;">
                <span style="font-size: 1.75rem; font-weight: 700; color: var(--admin-text);">$48,250.00</span>
                <x-admin-panel::badge variant="success">+14.2%</x-admin-panel::badge>
            </div>
            <!-- Sparkline SVG -->
            <div class="mt-3">
                <svg viewBox="0 0 100 24" class="w-full h-7 stroke-[var(--admin-primary)] fill-none stroke-[2.2]">
                    <path d="M0,18 Q15,8 30,14 T60,6 T85,12 T100,2" />
                </svg>
            </div>
            <p style="font-size: 0.75rem; color: var(--admin-text-muted); margin-top: 0.375rem;">+ $5,820 vs last month</p>
        </x-admin-panel::card>

        <!-- Card 2: Active Users -->
        <x-admin-panel::card>
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
                <span style="font-size: 0.8125rem; font-weight: 500; color: var(--admin-text-muted);">Active Users</span>
                <div style="width: 2rem; height: 2rem; border-radius: var(--admin-radius); background: rgba(59, 130, 246, 0.15); color: #3b82f6; display: flex; align-items: center; justify-content: center;">
                    <x-admin-panel::icon name="users" class="w-4 h-4" />
                </div>
            </div>
            <div style="display: flex; align-items: baseline; justify-content: space-between;">
                <span style="font-size: 1.75rem; font-weight: 700; color: var(--admin-text);">2,845</span>
                <x-admin-panel::badge variant="success">+8.1%</x-admin-panel::badge>
            </div>
            <!-- Sparkline SVG -->
            <div class="mt-3">
                <svg viewBox="0 0 100 24" class="w-full h-7 stroke-blue-500 fill-none stroke-[2.2]">
                    <path d="M0,16 Q20,12 40,15 T70,8 T100,4" />
                </svg>
            </div>
            <p style="font-size: 0.75rem; color: var(--admin-text-muted); margin-top: 0.375rem;">+ 214 new this week</p>
        </x-admin-panel::card>

        <!-- Card 3: Orders -->
        <x-admin-panel::card>
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
                <span style="font-size: 0.8125rem; font-weight: 500; color: var(--admin-text-muted);">Total Orders</span>
                <div style="width: 2rem; height: 2rem; border-radius: var(--admin-radius); background: rgba(16, 185, 129, 0.15); color: #10b981; display: flex; align-items: center; justify-content: center;">
                    <x-admin-panel::icon name="package" class="w-4 h-4" />
                </div>
            </div>
            <div style="display: flex; align-items: baseline; justify-content: space-between;">
                <span style="font-size: 1.75rem; font-weight: 700; color: var(--admin-text);">1,290</span>
                <x-admin-panel::badge variant="warning">+2.4%</x-admin-panel::badge>
            </div>
            <!-- Sparkline SVG -->
            <div class="mt-3">
                <svg viewBox="0 0 100 24" class="w-full h-7 stroke-emerald-500 fill-none stroke-[2.2]">
                    <path d="M0,20 Q25,16 50,12 T80,14 T100,6" />
                </svg>
            </div>
            <p style="font-size: 0.75rem; color: var(--admin-text-muted); margin-top: 0.375rem;">34 pending fulfillment</p>
        </x-admin-panel::card>

        <!-- Card 4: System Health -->
        <x-admin-panel::card>
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
                <span style="font-size: 0.8125rem; font-weight: 500; color: var(--admin-text-muted);">System Health</span>
                <div style="width: 2rem; height: 2rem; border-radius: var(--admin-radius); background: rgba(139, 92, 246, 0.15); color: #8b5cf6; display: flex; align-items: center; justify-content: center;">
                    <x-admin-panel::icon name="shield" class="w-4 h-4" />
                </div>
            </div>
            <div style="display: flex; align-items: baseline; justify-content: space-between;">
                <span style="font-size: 1.75rem; font-weight: 700; color: var(--admin-text);">100%</span>
                <x-admin-panel::badge variant="success">Healthy</x-admin-panel::badge>
            </div>
            <!-- Sparkline SVG -->
            <div class="mt-3">
                <svg viewBox="0 0 100 24" class="w-full h-7 stroke-purple-500 fill-none stroke-[2.2]">
                    <path d="M0,10 L25,10 L30,4 L35,18 L40,10 L70,10 L75,2 L80,16 L85,10 L100,10" />
                </svg>
            </div>
            <p style="font-size: 0.75rem; color: var(--admin-text-muted); margin-top: 0.375rem;">OPcache & Workers optimal</p>
        </x-admin-panel::card>
    </div>

    <!-- Main Content Grid -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 1.5rem; margin-top: 1.5rem;">
        <!-- Card: Welcome & Interactive Palette Switcher -->
        <x-admin-panel::card
            title="Getting Started with ImranDevBD Admin Panel"
            description="Your all-in-one, high-performance Laravel administration panel."
        >
            <div class="space-y-4 text-sm text-[var(--admin-text)]">
                <p>
                    Welcome to your new admin panel. Light, dark, and system modes are pre-configured with zero-flash rendering and 8 vibrant color schemes.
                </p>

                <!-- Color Palette Instant Switcher -->
                <div class="p-3 rounded-lg bg-[var(--admin-surface-hover)] border border-[var(--admin-border)]">
                    <span class="text-xs font-semibold uppercase tracking-wider text-[var(--admin-text-muted)] block mb-2">
                        Instant Live Theme Swatches:
                    </span>
                    <div class="flex items-center gap-2 flex-wrap">
                        @foreach (['indigo' => '#6366f1', 'blue' => '#3b82f6', 'emerald' => '#10b981', 'violet' => '#8b5cf6', 'rose' => '#f43f5e', 'amber' => '#f59e0b', 'zinc' => '#71717a', 'slate' => '#64748b'] as $pName => $pColor)
                            <button
                                type="button"
                                onclick="window.AdminPanel.theme.setPalette('{{ $pName }}')"
                                title="{{ ucfirst($pName) }}"
                                class="w-7 h-7 rounded-full transition transform hover:scale-110 shadow-sm border border-white/20"
                                style="background-color: {{ $pColor }};"
                            ></button>
                        @endforeach
                    </div>
                </div>

                <div class="p-3 rounded bg-[var(--admin-surface-hover)] border border-[var(--admin-border)] font-mono text-xs">
                    php artisan admin-panel:make-resource Product
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <x-admin-panel::button
                        variant="primary"
                        icon="sparkles"
                        onclick="window.AdminPanel.toast({ type: 'success', message: 'AI Assistant ready!' })"
                    >
                        Trigger Toast
                    </x-admin-panel::button>
                    <x-admin-panel::button
                        variant="secondary"
                        icon="search"
                        onclick="window.AdminPanel.openCommandPalette()"
                    >
                        Open ⌘K Palette
                    </x-admin-panel::button>
                </div>
            </div>
        </x-admin-panel::card>

        <!-- Card: Real-Time Audit Activity Timeline -->
        <x-admin-panel::card title="Recent Activity" description="Live audit log stream">
            <div class="space-y-4">
                <div class="flex items-start gap-3">
                    <div class="w-7 h-7 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <x-admin-panel::icon name="check" class="w-3.5 h-3.5" />
                    </div>
                    <div class="flex-1 text-xs">
                        <p class="font-semibold text-[var(--admin-text)]">Product "Cloud Enterprise SaaS" created</p>
                        <p class="text-[var(--admin-text-muted)]">By Admin User • 4 minutes ago</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div class="w-7 h-7 rounded-full bg-indigo-500/10 text-indigo-500 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <x-admin-panel::icon name="shield" class="w-3.5 h-3.5" />
                    </div>
                    <div class="flex-1 text-xs">
                        <p class="font-semibold text-[var(--admin-text)]">Passkey WebAuthn enrolled</p>
                        <p class="text-[var(--admin-text-muted)]">YubiKey 5C NFC • 18 minutes ago</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div class="w-7 h-7 rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <x-admin-panel::icon name="sparkles" class="w-3.5 h-3.5" />
                    </div>
                    <div class="flex-1 text-xs">
                        <p class="font-semibold text-[var(--admin-text)]">Autonomous AI schema scan completed</p>
                        <p class="text-[var(--admin-text-muted)]">Ollama local model • 1 hour ago</p>
                    </div>
                </div>
            </div>
        </x-admin-panel::card>
    </div>
</div>
@endsection
