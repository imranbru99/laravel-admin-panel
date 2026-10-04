<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Tests\Unit;

use ImranDevBD\LaravelAdminPanel\Facades\AdminPanel;
use ImranDevBD\LaravelAdminPanel\Panel\Panel;
use ImranDevBD\LaravelAdminPanel\Panel\PanelRegistry;
use ImranDevBD\LaravelAdminPanel\Tests\TestCase;
use ImranDevBD\LaravelAdminPanel\Themes\Palettes;
use ImranDevBD\LaravelAdminPanel\Themes\Theme;

class PanelRegistryTest extends TestCase
{
    public function test_it_registers_and_retrieves_panels(): void
    {
        $registry = new PanelRegistry;

        $panel = Panel::make('custom')
            ->path('custom-admin')
            ->theme('blue');

        $registry->register($panel);

        $this->assertTrue($registry->has('custom'));
        $this->assertSame($panel, $registry->get('custom'));
        $this->assertSame('custom-admin', $registry->get('custom')->getPath());
    }

    public function test_it_provides_default_panel(): void
    {
        $panel = AdminPanel::getPanel('admin');

        $this->assertNotNull($panel);
        $this->assertSame('admin', $panel->getId());
        $this->assertSame('admin', $panel->getPath());
    }

    public function test_it_renders_theme_css_tokens(): void
    {
        $theme = Theme::make('violet', 'dark');
        $css = $theme->renderCss();

        $this->assertStringContainsString('--admin-primary: #7c3aed;', $css);
        $this->assertStringContainsString('--admin-radius:', $css);
    }

    public function test_palettes_list_has_eight_colors(): void
    {
        $palettes = Palettes::all();

        $this->assertCount(8, $palettes);
        $this->assertContains('indigo', $palettes);
        $this->assertContains('emerald', $palettes);
        $this->assertContains('rose', $palettes);
        $this->assertContains('amber', $palettes);
    }
}
