<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Tests\Feature;

use ImranDevBD\LaravelAdminPanel\Tests\TestCase;

class ThemeTest extends TestCase
{
    public function test_theme_mode_can_be_updated_via_endpoint(): void
    {
        $response = $this->postJson('/admin/theme', [
            'mode' => 'dark',
            'palette' => 'emerald',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'mode' => 'dark',
            'palette' => 'emerald',
        ]);

        $this->assertSame('dark', session('admin_panel_theme_mode'));
        $this->assertSame('emerald', session('admin_panel_theme_palette'));
    }

    public function test_invalid_mode_is_rejected(): void
    {
        $response = $this->postJson('/admin/theme', [
            'mode' => 'invalid-mode',
        ]);

        $response->assertStatus(422);
    }
}
