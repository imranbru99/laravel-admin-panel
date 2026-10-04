<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Tests\Feature;

use ImranDevBD\LaravelAdminPanel\Tests\TestCase;

class DashboardTest extends TestCase
{
    public function test_dashboard_renders_successfully(): void
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('Admin Panel');
        $response->assertSee('Dashboard');
        $response->assertSee('Total Revenue');
        $response->assertSee('admin-panel-tokens');
    }

    public function test_dashboard_alias_route_renders(): void
    {
        $response = $this->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Dashboard');
    }

    public function test_asset_serving_fallback_works(): void
    {
        $response = $this->get('/admin/assets/admin-panel.css');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/css; charset=utf-8');
        $this->assertStringContainsString('--admin-sidebar-width', $response->getContent());
    }
}
