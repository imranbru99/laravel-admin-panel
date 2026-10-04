<div
    x-data="{
        open: false,
        search: '',
        selectedIndex: 0,
        items: [
            { id: 'dash', label: '{{ __('admin-panel::admin-panel.dashboard') }}', group: 'Navigation', icon: 'layout-dashboard', url: '{{ admin_panel()->getCurrentPanel()?->url('/') ?? '/admin' }}' },
            { id: 'prof', label: '{{ __('admin-panel::admin-panel.profile') }}', group: 'Navigation', icon: 'user', url: '{{ admin_panel()->getCurrentPanel()?->url('/profile') ?? '/admin/profile' }}' },
            { id: 'sett', label: '{{ __('admin-panel::admin-panel.settings') }}', group: 'Navigation', icon: 'settings', url: '{{ admin_panel()->getCurrentPanel()?->url('/settings') ?? '/admin/settings' }}' },
            { id: 'th-light', label: 'Theme: Light Mode', group: 'Theme', icon: 'sun', action: 'setMode', param: 'light' },
            { id: 'th-dark', label: 'Theme: Dark Mode', group: 'Theme', icon: 'moon', action: 'setMode', param: 'dark' },
            { id: 'th-system', label: 'Theme: System Mode', group: 'Theme', icon: 'monitor', action: 'setMode', param: 'system' },
            { id: 'pal-indigo', label: 'Palette: Indigo', group: 'Palette', icon: 'palette', action: 'setPalette', param: 'indigo' },
            { id: 'pal-blue', label: 'Palette: Blue', group: 'Palette', icon: 'palette', action: 'setPalette', param: 'blue' },
            { id: 'pal-emerald', label: 'Palette: Emerald', group: 'Palette', icon: 'palette', action: 'setPalette', param: 'emerald' },
            { id: 'pal-violet', label: 'Palette: Violet', group: 'Palette', icon: 'palette', action: 'setPalette', param: 'violet' },
            { id: 'pal-rose', label: 'Palette: Rose', group: 'Palette', icon: 'palette', action: 'setPalette', param: 'rose' },
            { id: 'pal-amber', label: 'Palette: Amber', group: 'Palette', icon: 'palette', action: 'setPalette', param: 'amber' }
        ],
        get filteredItems() {
            if (!this.search.trim()) return this.items;
            const q = this.search.toLowerCase();
            return this.items.filter(item => item.label.toLowerCase().includes(q) || item.group.toLowerCase().includes(q));
        },
        execute(item) {
            if (item.url) {
                window.location.href = item.url;
            } else if (item.action === 'setMode' && window.AdminPanel) {
                window.AdminPanel.theme.setMode(item.param);
                this.open = false;
            } else if (item.action === 'setPalette' && window.AdminPanel) {
                window.AdminPanel.theme.setPalette(item.param);
                this.open = false;
            }
        },
        selectNext() {
            if (this.selectedIndex < this.filteredItems.length - 1) this.selectedIndex++;
        },
        selectPrev() {
            if (this.selectedIndex > 0) this.selectedIndex--;
        },
        executeSelected() {
            const item = this.filteredItems[this.selectedIndex];
            if (item) this.execute(item);
        }
    }"
    x-on:open-command-palette.window="open = true; search = ''; selectedIndex = 0; $nextTick(() => $refs.searchInput?.focus())"
    x-on:keydown.window="
        if ((event.metaKey || event.ctrlKey) && event.key === 'k') {
            event.preventDefault();
            open = !open;
            if (open) { search = ''; selectedIndex = 0; $nextTick(() => $refs.searchInput?.focus()); }
        }
    "
    x-show="open"
    x-on:keydown.escape.window="open = false"
    style="display: none;"
    class="admin-command-palette-backdrop"
>
    <div
        class="admin-command-palette-panel"
        @click.outside="open = false"
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
    >
        <div class="admin-command-input-wrapper">
            <x-admin-panel::icon name="search" class="w-5 h-5 text-gray-400" />
            <input
                x-ref="searchInput"
                type="text"
                x-model="search"
                @keydown.arrow-down.prevent="selectNext()"
                @keydown.arrow-up.prevent="selectPrev()"
                @keydown.enter.prevent="executeSelected()"
                placeholder="Type a command, page, theme or action..."
                class="admin-command-input"
            />
            <kbd class="admin-search-kbd">ESC</kbd>
        </div>

        <div class="admin-command-list">
            <template x-for="(item, index) in filteredItems" :key="item.id">
                <div
                    @click="execute(item)"
                    @mouseenter="selectedIndex = index"
                    class="admin-command-item"
                    :class="{ 'active': selectedIndex === index }"
                >
                    <x-admin-panel::icon name="sparkles" class="w-4 h-4 text-gray-400" />
                    <span x-text="item.label" class="flex-1 font-medium text-sm"></span>
                    <span x-text="item.group" class="text-xs uppercase tracking-wider text-gray-400 px-2 py-0.5 rounded bg-[var(--admin-surface-hover)]"></span>
                </div>
            </template>

            <template x-if="filteredItems.length === 0">
                <div class="p-8 text-center text-sm text-[var(--admin-text-muted)]">
                    No commands or pages matching "<span x-text="search" class="font-semibold"></span>"
                </div>
            </template>
        </div>

        <div class="admin-command-footer">
            <span>Use <kbd>↑</kbd> <kbd>↓</kbd> to navigate</span>
            <span><kbd>↵</kbd> to select</span>
            <span><kbd>ESC</kbd> to close</span>
        </div>
    </div>
</div>
