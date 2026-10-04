@extends('admin-panel::layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1 class="page-title">{{ $title ?? __('admin-panel::admin-panel.dashboard') }}</h1>
            <p class="page-subtitle">{{ __('admin-panel::admin-panel.dashboard_subtitle') }}</p>
        </div>
        <div class="page-actions">
            <x-admin-panel::button variant="secondary" icon="search">
                {{ __('admin-panel::admin-panel.quick_links') }}
            </x-admin-panel::button>
            <x-admin-panel::button variant="primary" icon="plus">
                {{ __('admin-panel::admin-panel.buttons.create') }}
            </x-admin-panel::button>
        </div>
    </div>

    <!-- Stat Metrics Row -->
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
            <p style="font-size: 0.75rem; color: var(--admin-text-muted); margin-top: 0.375rem;">All services operational</p>
        </x-admin-panel::card>
    </div>

    <!-- Main Content Grid -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 1.5rem; margin-top: 1.5rem;">
        <!-- Card: Welcome & Quick Start -->
        <x-admin-panel::card
            title="Getting Started with ImranDevBD Admin Panel"
            description="Your all-in-one, high-performance Laravel administration panel."
        >
            <div class="space-y-4 text-sm text-[var(--admin-text)]">
                <p>
                    Welcome to your new admin panel. Light, dark, and system modes are pre-configured with zero-flash rendering and 8 vibrant color schemes.
                </p>

                <div class="p-3 rounded bg-[var(--admin-surface-hover)] border border-[var(--admin-border)] font-mono text-xs">
                    php artisan admin-panel:make-resource Product
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <x-admin-panel::button variant="primary" icon="sparkles">
                        Explore Features
                    </x-admin-panel::button>
                    <x-admin-panel::button variant="secondary" icon="settings">
                        Settings
                    </x-admin-panel::button>
                </div>
            </div>
        </x-admin-panel::card>

        <!-- Empty State Showcase -->
        <x-admin-panel::card title="Resource Showcase" description="Clean empty states with call-to-actions">
            <x-admin-panel::empty-state
                icon="package"
                title="No resources configured yet"
                description="Create your first fluent Resource class or use HasCrud trait to auto-generate management screens."
                action="Create First Resource"
                actionUrl="#"
            />
        </x-admin-panel::card>
    </div>
</div>
@endsection
