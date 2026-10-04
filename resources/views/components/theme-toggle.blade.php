@props([
    'showPaletteSelector' => false,
])

<div x-data="{
    mode: localStorage.getItem('admin_panel_theme_mode') || 'system',
    palette: localStorage.getItem('admin_panel_theme_palette') || 'indigo',
    updateMode(newMode) {
        this.mode = newMode;
        if (window.AdminPanel) {
            window.AdminPanel.theme.setMode(newMode);
        }
    },
    updatePalette(newPalette) {
        this.palette = newPalette;
        if (window.AdminPanel) {
            window.AdminPanel.theme.setPalette(newPalette);
        }
    }
}" class="flex items-center gap-1">
    <x-admin-panel::dropdown align="right">
        <x-slot name="trigger">
            <button
                type="button"
                class="theme-toggle-btn"
                title="{{ __('admin-panel::admin-panel.theme.toggle') }}"
                aria-label="{{ __('admin-panel::admin-panel.theme.toggle') }}"
            >
                <template x-if="mode === 'light'">
                    <x-admin-panel::icon name="sun" class="w-4 h-4 text-amber-500" />
                </template>
                <template x-if="mode === 'dark'">
                    <x-admin-panel::icon name="moon" class="w-4 h-4 text-indigo-400" />
                </template>
                <template x-if="mode === 'system'">
                    <x-admin-panel::icon name="monitor" class="w-4 h-4 text-gray-500" />
                </template>
            </button>
        </x-slot>

        <x-slot name="content">
            <div class="px-3 py-1.5 text-xs font-semibold uppercase tracking-wider text-gray-400">
                {{ __('admin-panel::admin-panel.theme.mode') }}
            </div>

            <button
                type="button"
                @click="updateMode('light')"
                class="admin-dropdown-item"
                :class="{ 'font-semibold text-primary': mode === 'light' }"
            >
                <x-admin-panel::icon name="sun" class="w-4 h-4" />
                <span>{{ __('admin-panel::admin-panel.theme.light') }}</span>
                <template x-if="mode === 'light'">
                    <x-admin-panel::icon name="check" class="w-3.5 h-3.5 ml-auto text-primary" />
                </template>
            </button>

            <button
                type="button"
                @click="updateMode('dark')"
                class="admin-dropdown-item"
                :class="{ 'font-semibold text-primary': mode === 'dark' }"
            >
                <x-admin-panel::icon name="moon" class="w-4 h-4" />
                <span>{{ __('admin-panel::admin-panel.theme.dark') }}</span>
                <template x-if="mode === 'dark'">
                    <x-admin-panel::icon name="check" class="w-3.5 h-3.5 ml-auto text-primary" />
                </template>
            </button>

            <button
                type="button"
                @click="updateMode('system')"
                class="admin-dropdown-item"
                :class="{ 'font-semibold text-primary': mode === 'system' }"
            >
                <x-admin-panel::icon name="monitor" class="w-4 h-4" />
                <span>{{ __('admin-panel::admin-panel.theme.system') }}</span>
                <template x-if="mode === 'system'">
                    <x-admin-panel::icon name="check" class="w-3.5 h-3.5 ml-auto text-primary" />
                </template>
            </button>

            @if ($showPaletteSelector)
                <div class="my-1 border-t border-[var(--admin-border-subtle)]"></div>
                <div class="px-3 py-1.5 text-xs font-semibold uppercase tracking-wider text-gray-400">
                    {{ __('admin-panel::admin-panel.theme.palette') }}
                </div>
                <div class="grid grid-cols-4 gap-1 p-2">
                    @foreach (['indigo' => '#6366f1', 'blue' => '#3b82f6', 'emerald' => '#10b981', 'violet' => '#8b5cf6', 'rose' => '#f43f5e', 'amber' => '#f59e0b', 'zinc' => '#71717a', 'slate' => '#64748b'] as $pName => $pColor)
                        <button
                            type="button"
                            @click="updatePalette('{{ $pName }}')"
                            title="{{ ucfirst($pName) }}"
                            class="w-6 h-6 rounded-full flex items-center justify-center transition hover:scale-110"
                            style="background-color: {{ $pColor }};"
                        >
                            <template x-if="palette === '{{ $pName }}'">
                                <span class="w-2 h-2 rounded-full bg-white"></span>
                            </template>
                        </button>
                    @endforeach
                </div>
            @endif
        </x-slot>
    </x-admin-panel::dropdown>
</div>
