/**
 * ImranDevBD Laravel Admin Panel
 * Core Client Runtime (Theme Engine, UI Controllers, and Alpine.js Bridge)
 */

(function(window) {
    'use strict';

    const AdminPanel = {
        theme: {
            currentMode: localStorage.getItem('admin_panel_theme_mode') || 'system',
            currentPalette: localStorage.getItem('admin_panel_theme_palette') || 'indigo',

            init() {
                this.apply(this.currentMode);
                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (this.currentMode === 'system') {
                        this.apply('system');
                    }
                });
            },

            setMode(mode) {
                this.currentMode = mode;
                localStorage.setItem('admin_panel_theme_mode', mode);
                this.apply(mode);
                this.syncServer({ mode });
            },

            cycleMode() {
                const modes = ['light', 'dark', 'system'];
                const nextIndex = (modes.indexOf(this.currentMode) + 1) % modes.length;
                this.setMode(modes[nextIndex]);
            },

            apply(mode) {
                const root = document.documentElement;
                const isSystemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                
                if (mode === 'dark' || (mode === 'system' && isSystemDark)) {
                    root.classList.add('dark');
                } else {
                    root.classList.remove('dark');
                }

                window.dispatchEvent(new CustomEvent('admin-panel:theme-changed', {
                    detail: { mode, isDark: root.classList.contains('dark') }
                }));
            },

            setPalette(palette) {
                this.currentPalette = palette;
                localStorage.setItem('admin_panel_theme_palette', palette);
                document.documentElement.setAttribute('data-palette', palette);
                this.syncServer({ palette });
            },

            async syncServer(data) {
                try {
                    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                    if (!token) return;
                    
                    const prefix = document.querySelector('meta[name="admin-panel-prefix"]')?.getAttribute('content') || 'admin';
                    await fetch('/' + prefix + '/theme', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(data)
                    });
                } catch (e) {
                    // Non-blocking sync failure fallback
                }
            }
        },

        sidebar: {
            isCollapsed: localStorage.getItem('admin_panel_sidebar_collapsed') === 'true',
            isMobileOpen: false,

            init() {
                if (this.isCollapsed) {
                    document.documentElement.setAttribute('data-sidebar-collapsed', 'true');
                }
            },

            toggle() {
                this.isCollapsed = !this.isCollapsed;
                localStorage.setItem('admin_panel_sidebar_collapsed', this.isCollapsed ? 'true' : 'false');
                if (this.isCollapsed) {
                    document.documentElement.setAttribute('data-sidebar-collapsed', 'true');
                } else {
                    document.documentElement.removeAttribute('data-sidebar-collapsed');
                }
            },

            toggleMobile() {
                this.isMobileOpen = !this.isMobileOpen;
                const sidebar = document.querySelector('.admin-sidebar');
                const overlay = document.querySelector('.admin-mobile-overlay');
                if (sidebar) {
                    sidebar.classList.toggle('open', this.isMobileOpen);
                }
                if (overlay) {
                    overlay.classList.toggle('hidden', !this.isMobileOpen);
                }
            },

            closeMobile() {
                this.isMobileOpen = false;
                const sidebar = document.querySelector('.admin-sidebar');
                const overlay = document.querySelector('.admin-mobile-overlay');
                if (sidebar) sidebar.classList.remove('open');
                if (overlay) overlay.classList.add('hidden');
            }
        },

        /**
         * Safe asynchronous request helper with CSRF protection
         */
        async request(url, options = {}) {
            const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            const defaultHeaders = {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                ...(token ? { 'X-CSRF-TOKEN': token } : {})
            };

            const response = await fetch(url, {
                ...options,
                headers: {
                    ...defaultHeaders,
                    ...(options.headers || {})
                }
            });

            if (!response.ok) {
                throw new Error(`Admin Panel request failed: ${response.statusText}`);
            }

            return response;
        },

        toast(detail) {
            window.dispatchEvent(new CustomEvent('admin-panel:toast', { detail }));
        },

        openCommandPalette() {
            window.dispatchEvent(new CustomEvent('open-command-palette'));
        }
    };

    // Auto-initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            AdminPanel.theme.init();
            AdminPanel.sidebar.init();
        });
    } else {
        AdminPanel.theme.init();
        AdminPanel.sidebar.init();
    }

    // Expose globally
    window.AdminPanel = AdminPanel;

})(window);
