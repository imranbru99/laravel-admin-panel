# Laravel Admin Panel

<p align="center">
  <img src="https://raw.githubusercontent.com/imrandevbd/laravel-admin-panel/main/art/banner.png" alt="Laravel Admin Panel Banner" width="100%">
</p>

<p align="center">
  <a href="https://packagist.org/packages/imrandevbd/laravel-admin-panel"><img src="https://img.shields.io/packagist/v/imrandevbd/laravel-admin-panel.svg?style=flat-square" alt="Latest Version on Packagist"></a>
  <a href="https://github.com/imrandevbd/laravel-admin-panel/actions"><img src="https://img.shields.io/github/actions/workflow/status/imrandevbd/laravel-admin-panel/run-tests.yml?branch=main&label=tests&style=flat-square" alt="GitHub Tests Action Status"></a>
  <a href="https://packagist.org/packages/imrandevbd/laravel-admin-panel"><img src="https://img.shields.io/packagist/dt/imrandevbd/laravel-admin-panel.svg?style=flat-square" alt="Total Downloads"></a>
  <a href="https://github.com/imrandevbd/laravel-admin-panel/blob/main/LICENSE"><img src="https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square" alt="License"></a>
</p>

---

## ⚡ The All-in-One, AI-Powered Laravel Admin Panel

**`imrandevbd/laravel-admin-panel`** is the modern, developer-friendly open-source administration panel for Laravel. Built with **zero required companion packages**, **zero build step for consumers**, flawless **light/dark/system theming with no white flash**, and a rich, responsive UI powered by Alpine.js 3 and precompiled CSS design tokens.

### ✨ Key Highlights

- 🚀 **Zero Build Step:** Precompiled CSS & JS shipped out of the box. Your host application never needs Node.js or npm.
- 🎨 **Anti-Flash Theme Engine:** Instant synchronous theme determination before first paint in `<head>`. Never see a white flash on dark mode reload.
- 🌈 **8 Built-in Color Palettes:** Indigo, Blue, Emerald, Violet, Rose, Amber, Zinc, Slate.
- 📱 **Flawless Mobile Experience:** Collapsible desktop sidebar (icon rail), mobile slide-over drawer, and responsive touch controls.
- 🧩 **Multi-Panel Fluent Architecture:** Run `/admin`, `/manager`, `/app` independently with their own guards, routes, and themes.
- ⚡ **Extensible Base Components:** Lucide inline SVG icons, Modals, Dropdowns, Cards, Badges, Buttons, and empty states.

---

## 📦 Quick Installation

Install via Composer in under 3 minutes:

```bash
composer require imrandevbd/laravel-admin-panel
php artisan admin-panel:install
```

Access your dashboard instantly at:
```
http://your-app.test/admin
```

---

## 🎨 Theming & Palettes

All colors, radiuses, and layout dimensions are governed by semantic CSS custom properties (`--admin-bg`, `--admin-primary`, `--admin-card`, etc.).

Switch modes at runtime or configure defaults in `config/admin-panel.php`:

```php
'theme' => [
    'brand_name' => 'My SaaS Admin',
    'default_mode' => 'system', // 'light', 'dark', 'system'
    'default_palette' => 'indigo', // indigo, blue, emerald, violet, rose, amber, zinc, slate
    'radius' => 'md', // sm, md, lg, xl
    'sidebar_variant' => 'inset', // inset, classic, floating
],
```

---

## 🧱 Multi-Panel Configuration

Define custom panels fluently:

```php
use ImranDevBD\LaravelAdminPanel\Facades\AdminPanel;
use ImranDevBD\LaravelAdminPanel\Panel\Panel;

AdminPanel::registerPanel(
    Panel::make('app')
        ->path('app')
        ->guard('web')
        ->theme('emerald')
        ->brandName('Customer Portal')
);
```

---

## 🧪 Testing & Quality

Run the test suite:

```bash
vendor/bin/phpunit
vendor/bin/phpstan analyse
```

---

## 📄 License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
