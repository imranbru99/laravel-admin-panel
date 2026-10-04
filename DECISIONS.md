# Architectural & Design Decisions

This document records architectural, design, and technical decisions made during the development of `imrandevbd/laravel-admin-panel`.

## Decision 1: Zero Required Companion Packages
- **Context:** Many admin panels force the installation of numerous third-party packages (e.g. Filament, Spatie Permission, Livewire, etc.).
- **Decision:** Build all core features (RBAC, CRUD, Auth, Dashboard, Media, Audit) self-contained within this package. Provide optional adapters for Spatie and others, but require none.
- **Consequence:** Consumers get a clean, conflict-free dependency tree and instant installation.

## Decision 2: Precompiled Distribution Assets (`dist/`)
- **Context:** Modern admin panels often require consumers to install Node.js, run Vite/Tailwind, or manage npm assets.
- **Decision:** Include compiled, production-ready CSS (`admin-panel.css`) and JS (`admin-panel.js` incorporating Alpine.js 3 and UI behaviors) directly inside the package `dist/` directory.
- **Consequence:** Host applications install the package using only `composer require` and `php artisan admin-panel:install` with zero Node requirement.

## Decision 3: Anti-Flash Theme Engine & CSS Custom Properties
- **Context:** Switching between light, dark, and system themes often causes a white flash on page load if dark mode relies on JS running after DOM ready.
- **Decision:** An inline script runs synchronously in `<head>` before stylesheets and DOM are rendered. It reads `localStorage` / cookie / `prefers-color-scheme` and immediately adds `.dark` to the `<html>` element. All palettes are implemented using CSS variables (`--admin-bg`, `--admin-primary`, etc.) for seamless runtime retheming without recompilation.

## Decision 4: Fluent Panel Registry (`Panel`)
- **Context:** Enterprise applications often need multiple distinct admin consoles (e.g., `/admin`, `/vendor`, `/customer`).
- **Decision:** Implement a multi-panel architecture with `Panel::make('admin')` registered in `PanelRegistry`, each configurable with its own prefix, guard, theme, and navigation.
