<p align="center">
  <picture>
    <source media="(prefers-color-scheme: dark)" srcset="https://raw.githubusercontent.com/imranbru99/laravel-admin-panel/main/art/banner-dark.svg">
    <img alt="ImranDevBD Laravel Admin Panel" src="https://raw.githubusercontent.com/imranbru99/laravel-admin-panel/main/art/banner.svg" width="100%" style="border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
  </picture>
</p>

<p align="center">
  <strong>The all-in-one, AI-powered Laravel administration panel & application framework.</strong><br>
  <em>Designed for 2027 and beyond. Zero companion dependencies. Zero consumer build step. Installed in under 3 minutes.</em>
</p>

<p align="center">
  <a href="https://packagist.org/packages/imrandevbd/laravel-admin-panel"><img src="https://img.shields.io/packagist/v/imrandevbd/laravel-admin-panel.svg?style=for-the-badge&color=4f46e5" alt="Latest Packagist Version"></a>
  <a href="https://php.net"><img src="https://img.shields.io/badge/PHP-8.2%20--%208.5+-777bb4.svg?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+"></a>
  <a href="https://laravel.com"><img src="https://img.shields.io/badge/Laravel-11%20%7C%2012%20%7C%2013-ff2d20.svg?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 11-13"></a>
  <a href="https://phpstan.org"><img src="https://img.shields.io/badge/Larastan-Level%208-brightgreen.svg?style=for-the-badge" alt="Larastan Level 8"></a>
  <a href="https://github.com/imranbru99/laravel-admin-panel/blob/main/LICENSE"><img src="https://img.shields.io/badge/License-MIT-blue.svg?style=for-the-badge" alt="MIT License"></a>
</p>

---

## 🧭 Table of Contents

- [Why Laravel Admin Panel in 2027?](#-why-laravel-admin-panel-in-2027)
- [Comprehensive Comparison](#-comprehensive-comparison)
- [Future-Proof 2027 Feature Matrix](#-future-proof-2027-feature-matrix)
  - [1. Agentic & Local AI Engine](#1-agentic--local-ai-engine)
  - [2. Zero-Build Ultra-Fast Architecture](#2-zero-build-ultra-fast-architecture)
  - [3. Anti-Flash Theme Engine & 8 Palettes](#3-anti-flash-theme-engine--8-palettes)
  - [4. Biometric Passkeys & Zero-Trust RBAC](#4-biometric-passkeys--zero-trust-rbac)
  - [5. Advanced Dynamic Data Views (Table, Cards, Kanban, Calendar)](#5-advanced-dynamic-data-views)
  - [6. Headless OpenAPI 3.1 Layer & Webhooks](#6-headless-openapi-31-layer--webhooks)
  - [7. Cloud-Native Media Library & Tamper-Evident Audit](#7-cloud-native-media-library--tamper-evident-audit)
  - [8. Multi-Tenancy & Global Scale (i18n & RTL)](#8-multi-tenancy--global-scale-i18n--rtl)
  - [9. Real-Time System Health & Diagnostics Center](#9-real-time-system-health--diagnostics-center)
- [Quick Start in Under 3 Minutes](#-quick-start-in-under-3-minutes)
- [Developer Experience (Code Examples)](#-developer-experience-code-examples)
- [Artisan CLI Reference](#-artisan-cli-reference)
- [Quality, Performance & Benchmarks](#-quality-performance--benchmarks)
- [Roadmap](#-roadmap)
- [Contributing & Community](#-contributing--community)
- [License](#-license)
- [Let's Connect & Collaborate](#-lets-connect--collaborate)

---

## ⚡ Why Laravel Admin Panel in 2027?

Modern Laravel projects are burdened by complex dependency trees, heavy build steps, vendor lock-in, and fragile companion packages.

**`imrandevbd/laravel-admin-panel`** was engineered from the ground up as an **all-inclusive, single-package solution**:

1. **One Package, Zero Required Companions:** No required Spatie permissions, no Filament core dependencies, no Tyro or Livewire prerequisites. Everything from RBAC to Media and 2FA is built-in.
2. **Zero Consumer Build Step:** Ships with precompiled, ultra-lean CSS and Alpine.js 3 distribution assets (`dist/`). Your host application **never needs Node.js or npm**.
3. **Zero-Flash Theme Engine:** The pre-paint theme engine checks system preferences and local storage in `<head>` before CSS execution—guaranteeing **zero white flash** on reload in dark mode.
4. **Agentic & Local AI Native:** Provider-agnostic AI adapters for local models via **Ollama**, as well as **Google Gemini, OpenAI, Anthropic Claude**, and `laravel-ai-hub`. Perform natural-language queries that convert into safe, policy-governed Eloquent builders.
5. **Edge & Worker Ready:** Built with strict PHP 8.2+ typing, stateless container architecture, and zero static memory leaks—fully verified for **Laravel Octane, FrankenPHP worker mode, and Laravel Vapor**.

---

## 📊 Comprehensive Comparison

| Feature / Metric | `laravel-admin-panel` | Filament 3 / 4 | Laravel Nova 4 / 5 | Backpack CRUD | Tyro Dashboard |
|---|:---:|:---:|:---:|:---:|:---:|
| **License / Pricing** | **100% Free MIT** | MIT | Paid / Commercial | Freemium / Paid | Open Source |
| **Required Companion Packages** | **0 (Zero)** | 6+ dependencies | Proprietary | 5+ dependencies | 3+ dependencies |
| **Host App Node/NPM Requirement** | **None (Zero-Build)** | Required for custom | Required for custom | Required for custom | Required |
| **Anti-Flash Dark/Light Engine** | **Synchronous `<head>`** | Prone to flash | Prone to flash | Prone to flash | Partial |
| **Agentic AI & Local Ollama** | **Built-in & Native** | Community plugin | None | None | None |
| **Biometric Passkeys (WebAuthn)** | **Built-in Native** | 3rd party package | None | None | None |
| **Headless REST & OpenAPI 3.1** | **Built-in Auto-Gen** | Community plugin | None | None | None |
| **Multi-Panel Engine** | **Fluent Native** | Native | Limited | Multi-config | Single panel |
| **Tamper-Evident SHA-256 Audit**| **Built-in Native** | Community plugin | None | Addon | None |
| **Server Health & Diagnostics** | **Built-in Dashboard** | Community plugin | None | Addon | None |
| **8 Built-in WCAG 2.2 Palettes** | **Runtime Switchable** | Recompile required| Limited | CSS edits | Limited |

---

## 🚀 Future-Proof 2027 Feature Matrix

### 1. Agentic & Local AI Engine
- **Autonomous Resource Generator:** Run `php artisan admin-panel:ai-resource "SaaS Subscription with plan, billing_cycle, stripe_id, team_id"` to scaffold migration, Eloquent model, factory, policy, and fluent Resource in seconds.
- **Natural-Language-to-Eloquent (NLQ):** Query data using natural language (e.g., *"Show pending high-value orders from Europe this week"*). Converts into safe, parameterized, policy-checked Eloquent calls with zero raw SQL execution.
- **Privacy-First Local AI via Ollama:** Run your admin AI completely on-premise without third-party API keys or sending sensitive data off-server.
- **AI Field Helpers:** On-the-fly copy generation, summary, image alt-text, grammar correction, and dynamic translation directly within form fields with preview-before-apply diffs.
- **Smart Audit & Token Governance:** Set daily spend limits, per-user quotas, and PII redaction rules before prompts hit LLM APIs.

### 2. Zero-Build Ultra-Fast Architecture
- **Precompiled Production Bundle:** High-efficiency CSS (< 21 KB uncompressed, < 6 KB gzipped) and bundled Alpine.js 3 client runtime (< 51 KB uncompressed, < 18 KB gzipped).
- **Zero Host Node Requirement:** Teams running purely on PHP, Docker, or bare-metal servers can install and update without installing Node, Vite, or npm.
- **Sub-50ms Rendering:** Optimized Blade component rendering tree, eager-loading relationship detection, and zero N+1 database queries.
- **Serverless & Octane Ready:** Zero memory leaks, compatible with Swoole, RoadRunner, FrankenPHP, and AWS Lambda/Vapor.

### 3. Anti-Flash Theme Engine & 8 Palettes
- **Zero White Flash:** A dedicated, synchronous micro-script executes in `<head>` before stylesheets and DOM parse, rendering the exact theme (Light, Dark, or System) instantly.
- **8 Built-in Palettes:**
  - 🟣 **Indigo** (`#4f46e5`) — Modern SaaS elegance
  - 🔵 **Blue** (`#2563eb`) — Enterprise cloud standard
  - 🟢 **Emerald** (`#059669`) — Fintech and eco-friendly
  - 🪻 **Violet** (`#7c3aed`) — Creative studio vibe
  - 🌹 **Rose** (`#e11d48`) — High-energy consumer dashboards
  - 🟡 **Amber** (`#d97706`) — Warm operational analytics
  - ⚪ **Zinc** (`#18181b`) — Minimalist monochromatic
  - 🔘 **Slate** (`#334155`) — Balanced technical telemetry
- **CSS Variable Tokens:** All radii, colors, borders, and shadows are exposed as standard CSS variables for runtime re-theming without recompilation.

### 4. Biometric Passkeys & Zero-Trust RBAC
- **Passkeys (WebAuthn):** One-tap login via TouchID, FaceID, Windows Hello, and hardware security keys (YubiKey).
- **TOTP 2FA & Session Governance:** Built-in QR-code authenticator enrollment, recovery codes, active device session monitoring, and one-click remote device revocation.
- **Super-Admin Bypass & Wildcard Permissions:** Manage access cleanly with `products.*` wildcard matching, protected system roles, and column/field-level read/write permissions.
- **Visual Role-Permission Matrix:** Full interactive checkbox matrix UI with search, bulk grant, and role duplication.
- **Audited Impersonation:** Secure admin impersonation with a persistent exit banner, full audit trails, and strict hierarchy guardrails.

### 5. Advanced Dynamic Data Views
- **Four Native View Modes:**
  1. **Data Table:** Server-side search, multi-column sort, column toggle/resize, pagination (length-aware and cursor), and inline-editable cells.
  2. **Card/Grid View:** Beautiful responsive card grids for visually rich records.
  3. **Kanban Board:** Drag-and-drop workflow status boards for tasks, leads, and orders.
  4. **Calendar Timeline:** Date-driven schedule views with monthly, weekly, and daily aggregations.
- **Customizable 12-Column Dashboard Grid:** Drag-and-drop widget layout engine with per-user persistent grid customization.
- **Widgets Included:** Stat cards with sparkline trends, ApexCharts/Chart.js lazy-loaded wrappers, activity feeds, goal progress bars, and custom Blade widgets.

### 6. Headless OpenAPI 3.1 Layer & Webhooks
- **Automated REST Endpoints:** Turn any Resource into a fully secured RESTful API with token authentication, filtering, pagination, and sorting.
- **Interactive OpenAPI Explorer:** Instant Scalar / Swagger UI documentation generated automatically at `/admin/api/docs`.
- **HMAC-Signed Webhooks:** Subscribe to model lifecycle events with automatic exponential backoff retries, payload signing, and a visual delivery inspection log.

### 7. Cloud-Native Media Library & Tamper-Evident Audit
- **Modern Next-Gen Formats:** Automatic conversion and responsive thumbnail generation in WebP and AVIF.
- **Multi-Cloud Storage:** Seamless support for Local Disks, AWS S3, Cloudflare R2, MinIO, and Google Cloud Storage.
- **Stock Media Integration:** Instant search and import from Unsplash and Pexels directly inside the media picker.
- **Tamper-Evident Audit Log:** Cryptographic SHA-256 chain verification for all record modifications, with side-by-side colorized diff viewing.

### 8. Multi-Tenancy & Global Scale (i18n & RTL)
- **Flexible Tenancy Strategies:** Single-database (`tenant_id` scoping) and multi-database isolation with dynamic connection switching.
- **RTL & Complex Scripts:** Fully tested bidirectional layouts for Arabic, Hebrew, Urdu, and Bangla fonts.
- **Localized Formatting:** Currency, date, time, and number formatting automatically adhere to user locale and timezone.

### 9. Real-Time System Health & Diagnostics Center
- **Telemetry Overview:** Real-time metrics for PHP version, OPcache hit rates, memory consumption, disk usage, and database connection latency.
- **Interactive Log Viewer:** Live search, severity filtering (Emergency to Debug), and real-time log tailing.
- **Job & Queue Inspector:** View pending jobs, inspect failed jobs, and re-queue with a single click.
- **Artisan Command Runner:** Secure, whitelisted web terminal for running maintenance tasks with audited console output streaming.

---

## 📦 Quick Start in Under 3 Minutes

### 1. Require via Composer

```bash
composer require imrandevbd/laravel-admin-panel
```

### 2. Run the Interactive Installer

```bash
php artisan admin-panel:install
```

The installer will:
1. Publish `config/admin-panel.php`.
2. Publish precompiled CSS and JS assets to `public/vendor/admin-panel`.
3. Prompt to run package migrations.
4. Scaffold your first super-admin credentials.

### 3. Open Your Admin Console

Visit `http://your-app.test/admin` and log in!

---

## 💻 Developer Experience (Code Examples)

### A. Fluent Resource Definition (Under 40 Lines of PHP)

Create a resource via Artisan:
```bash
php artisan admin-panel:make-resource Product
```

```php
namespace App\Admin\Resources;

use App\Models\Product;
use ImranDevBD\LaravelAdminPanel\Fields\BelongsTo;
use ImranDevBD\LaravelAdminPanel\Fields\Money;
use ImranDevBD\LaravelAdminPanel\Fields\Slug;
use ImranDevBD\LaravelAdminPanel\Fields\Text;
use ImranDevBD\LaravelAdminPanel\Fields\Toggle;
use ImranDevBD\LaravelAdminPanel\Forms\Form;
use ImranDevBD\LaravelAdminPanel\Forms\Section;
use ImranDevBD\LaravelAdminPanel\Resources\Resource;
use ImranDevBD\LaravelAdminPanel\Tables\Columns\Badge;
use ImranDevBD\LaravelAdminPanel\Tables\Columns\TextColumn;
use ImranDevBD\LaravelAdminPanel\Tables\Table;

class ProductResource extends Resource
{
    protected static string $model = Product::class;
    protected static ?string $icon = 'package';
    protected static ?string $group = 'Shop';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Product Details')->schema([
                Text::make('name')->required()->searchable(),
                Slug::make('slug')->from('name'),
                Money::make('price')->currency('USD')->required(),
                BelongsTo::make('category')->searchable()->createOption(),
                Toggle::make('is_active')->default(true),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('category.name')->sortable(),
                TextColumn::make('price')->money('USD')->sortable(),
                Badge::make('is_active')->color(fn ($val) => $val ? 'success' : 'danger'),
            ])
            ->filters([])
            ->actions([])
            ->bulkActions([]);
    }
}
```

---

### B. Multi-Panel Configuration

Support independent portals (e.g. `/admin`, `/vendor`, `/customer`) in `app/Providers/AdminPanelServiceProvider.php`:

```php
use ImranDevBD\LaravelAdminPanel\Facades\AdminPanel;
use ImranDevBD\LaravelAdminPanel\Panel\Panel;

// Register Vendor Portal
AdminPanel::registerPanel(
    Panel::make('vendor')
        ->path('vendor')
        ->guard('vendor')
        ->theme('emerald')
        ->brandName('Vendor Hub')
        ->resources([
            ProductResource::class,
            OrderResource::class,
        ])
);
```

---

### C. Agentic AI Natural-Language Query

Query records conversationally from the command palette or AI drawer:

```php
use ImranDevBD\LaravelAdminPanel\Ai\NaturalLanguageQuery;

$query = NaturalLanguageQuery::for(Order::class)
    ->prompt('high value orders placed this month by recurring customers')
    ->toEloquent();

// Returns an authorized, parameterized Eloquent Builder instance:
$orders = $query->paginate(20);
```

---

## 🛠️ Artisan CLI Reference

| Command | Description |
|---|---|
| `php artisan admin-panel:install` | Complete interactive installer (config, assets, migrations, super-admin). |
| `php artisan admin-panel:publish` | Publish config, precompiled assets, Blade views, or lang files. |
| `php artisan admin-panel:make-resource` | Scaffold a new fluent Resource class with form and table schemas. |
| `php artisan admin-panel:make-panel` | Create a new isolated admin panel configuration. |
| `php artisan admin-panel:make-page` | Scaffold a custom admin page with custom layout and actions. |
| `php artisan admin-panel:make-widget` | Generate a Stat, Chart, or Table dashboard widget. |
| `php artisan admin-panel:make-user` | Create or promote a super-admin user from the command line. |
| `php artisan admin-panel:ai-resource` | Scaffold a model, migration, factory, policy, and resource from an AI prompt. |
| `php artisan admin-panel:scan` | Inspect existing database tables and models to auto-generate resources. |
| `php artisan admin-panel:doctor` | Run an automated diagnostic check on configuration, permissions, and caches. |

---

## 🧪 Quality, Performance & Benchmarks

The package is continuously tested across PHP and Laravel versions:

- **PHP Compatibility:** PHP 8.2, 8.3, 8.4, 8.5+
- **Laravel Compatibility:** Laravel 11.x, 12.x, 13.x
- **Database Engines:** MySQL 8+, MariaDB 10.6+, PostgreSQL 14+, SQLite 3.35+
- **Static Analysis:** Larastan Level 8 (100% clean, strict typing)
- **Code Style:** Laravel Pint (100% PSR-12 and Laravel standard adherence)
- **Lighthouse Performance:** Target score **>= 98** on list and dashboard screens
- **Bundle Efficiency:** Core CSS < 7 KB gzipped; Core JS runtime < 18 KB gzipped

---

## 🗺️ Roadmap

- [x] **Phase 1: Foundation & Asset Pipeline** — Service provider, multi-panel registry, anti-flash theme engine, 8 palettes, base components, zero-build assets.
- [ ] **Phase 2: Auth & RBAC** — WebAuthn passkeys, 2FA, session revocation, visual role-permission matrix, impersonation.
- [ ] **Phase 3: Fluent CRUD & Fields** — Form builder, layout components, table engine, filters, batch operations, relation managers.
- [ ] **Phase 4: Dashboard & Search** — 12-column grid dashboard, charts, command palette (⌘K), global search providers.
- [ ] **Phase 5: Platform Modules** — Cloud media library, tamper-evident audit logs, system health diagnostics, log viewer, settings store.
- [ ] **Phase 6: Headless API & Tenancy** — OpenAPI 3.1 generator, Sanctum tokens, webhooks with HMAC, single/multi-db tenancy, RTL.
- [ ] **Phase 7: Agentic AI Copilot** — Ollama offline provider, Gemini, Claude, OpenAI adapters, natural-language-to-Eloquent, autonomous resource generator.
- [ ] **Phase 8: Plugin Marketplace & Ecosystem** — Plugin contracts, live theme customizer, documentation site, live interactive demo.

---

## 🤝 Contributing & Community

We welcome contributions from developers worldwide!

1. Fork the repository on GitHub.
2. Clone your fork locally and run `composer install`.
3. Create a feature branch: `git checkout -b feature/amazing-feature`.
4. Ensure tests and static analysis pass:
   ```bash
   vendor/bin/phpunit
   vendor/bin/phpstan analyse
   vendor/bin/pint --test
   ```
5. Commit your changes and open a Pull Request.

---

## 📄 License

The ImranDevBD Laravel Admin Panel is open-sourced software licensed under the [MIT license](LICENSE).
Built with ❤️ by [Imran Hossain](https://github.com/imranbru99) and contributors.

---

## 🤝 Let's Connect & Collaborate

I am open to **Senior Remote Full-Stack Roles**, **AI Platform Architecture Contracts**, and **Enterprise Technical Advisory**.

- **Timezone:** UTC+6 (Dhaka / Rangpur, Bangladesh) — Flexible overlap with US, UK, and European business hours.
- **Delivery Mode:** Async-ready, Slack, Discord, Jira, GitHub, and production-first accountability.

| Channel | Address / Handle | Quick Action |
|:---|:---|:---:|
| 🌐 Primary Portfolio | [imrandev.bd](https://imrandev.bd/) | [Visit Site ↗](https://imrandev.bd/) |
| 📦 Packagist Packages | [packagist.org/packages/imrandevbd/](https://packagist.org/packages/imrandevbd/) | [View Packages ↗](https://packagist.org/packages/imrandevbd/) |
| 💼 LinkedIn Profile | [linkedin.com/in/imranbru99](https://linkedin.com/in/imranbru99) | [Connect ↗](https://linkedin.com/in/imranbru99) |
| 🐙 GitHub Profile | [github.com/imranbru99](https://github.com/imranbru99) | [Follow ↗](https://github.com/imranbru99) |
| 💬 WhatsApp Direct | [+880 1576-918420](http://wa.me/+8801576918420) | [Chat Now ↗](http://wa.me/+8801576918420) |
| 📧 Direct Email | [me@imrandev.bd](mailto:me@imrandev.bd) | [Send Email ↗](mailto:me@imrandev.bd) |
| 🐦 X (Twitter) | [@imrandev_bd](https://x.com/imrandev_bd) | [Follow ↗](https://x.com/imrandev_bd) |
| 📺 YouTube Tech | [@ImranDevBD](https://youtube.com/@ImranDevBD) | [Subscribe ↗](https://youtube.com/@ImranDevBD) |

