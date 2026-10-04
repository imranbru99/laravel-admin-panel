(function() {
    try {
        const storedMode = localStorage.getItem('admin_panel_theme_mode') || 'system';
        const isSystemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const root = document.documentElement;

        if (storedMode === 'dark' || (storedMode === 'system' && isSystemDark)) {
            root.classList.add('dark');
        } else {
            root.classList.remove('dark');
        }

        // Apply saved palette if present
        const storedPalette = localStorage.getItem('admin_panel_theme_palette');
        if (storedPalette) {
            root.setAttribute('data-palette', storedPalette);
        }

        // Check sidebar state
        const sidebarState = localStorage.getItem('admin_panel_sidebar_collapsed');
        if (sidebarState === 'true') {
            root.setAttribute('data-sidebar-collapsed', 'true');
        }
    } catch (e) {
        // Fallback silently if localStorage is restricted
    }
})();
