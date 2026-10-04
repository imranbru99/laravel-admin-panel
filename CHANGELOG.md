# Changelog

All notable changes to `imrandevbd/laravel-admin-panel` will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- **Phase 1: Foundation**
  - Package structure, Service Provider, and configuration.
  - Multi-panel registry (`Panel`, `PanelRegistry`, `PanelManager`).
  - Precompiled zero-dependency asset pipeline (Tailwind CSS tokens, Alpine.js 3, Lucide SVG icon system).
  - Anti-flash theme engine (Light, Dark, System modes with zero white flash).
  - 8 built-in palettes: Zinc, Slate, Blue, Indigo, Violet, Emerald, Rose, Amber.
  - Modern responsive layouts: Collapsible icon rail desktop sidebar, topbar breadcrumbs/actions, mobile drawer.
  - Base UI components: Button, Badge, Card, Input, Modal, Dropdown, Theme Toggle, Empty State, Icon.
  - Artisan commands: `admin-panel:install`, `admin-panel:publish`.
  - Orchestra Testbench test suite.
