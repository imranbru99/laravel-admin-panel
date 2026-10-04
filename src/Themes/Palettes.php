<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Themes;

final class Palettes
{
    /**
     * Color definitions for the 8 built-in palettes (light & dark primary, hover, focus rings, and muted).
     *
     * @var array<string, array{
     *     name: string,
     *     light: array<string, string>,
     *     dark: array<string, string>
     * }>
     */
    public const PALETTES = [
        'indigo' => [
            'name' => 'Indigo',
            'light' => [
                'primary' => '#4f46e5',
                'primary-hover' => '#4338ca',
                'primary-focus' => 'rgba(79, 70, 229, 0.25)',
                'primary-foreground' => '#ffffff',
                'primary-subtle' => '#eef2ff',
                'primary-subtle-text' => '#3730a3',
            ],
            'dark' => [
                'primary' => '#6366f1',
                'primary-hover' => '#818cf8',
                'primary-focus' => 'rgba(99, 102, 241, 0.35)',
                'primary-foreground' => '#ffffff',
                'primary-subtle' => 'rgba(99, 102, 241, 0.15)',
                'primary-subtle-text' => '#c7d2fe',
            ],
        ],
        'blue' => [
            'name' => 'Blue',
            'light' => [
                'primary' => '#2563eb',
                'primary-hover' => '#1d4ed8',
                'primary-focus' => 'rgba(37, 99, 235, 0.25)',
                'primary-foreground' => '#ffffff',
                'primary-subtle' => '#eff6ff',
                'primary-subtle-text' => '#1e40af',
            ],
            'dark' => [
                'primary' => '#3b82f6',
                'primary-hover' => '#60a5fa',
                'primary-focus' => 'rgba(59, 130, 246, 0.35)',
                'primary-foreground' => '#ffffff',
                'primary-subtle' => 'rgba(59, 130, 246, 0.15)',
                'primary-subtle-text' => '#bfdbfe',
            ],
        ],
        'emerald' => [
            'name' => 'Emerald',
            'light' => [
                'primary' => '#059669',
                'primary-hover' => '#047857',
                'primary-focus' => 'rgba(5, 150, 105, 0.25)',
                'primary-foreground' => '#ffffff',
                'primary-subtle' => '#ecfdf5',
                'primary-subtle-text' => '#065f46',
            ],
            'dark' => [
                'primary' => '#10b981',
                'primary-hover' => '#34d399',
                'primary-focus' => 'rgba(16, 185, 129, 0.35)',
                'primary-foreground' => '#ffffff',
                'primary-subtle' => 'rgba(16, 185, 129, 0.15)',
                'primary-subtle-text' => '#a7f3d0',
            ],
        ],
        'violet' => [
            'name' => 'Violet',
            'light' => [
                'primary' => '#7c3aed',
                'primary-hover' => '#6d28d9',
                'primary-focus' => 'rgba(124, 58, 237, 0.25)',
                'primary-foreground' => '#ffffff',
                'primary-subtle' => '#f5f3ff',
                'primary-subtle-text' => '#5b21b6',
            ],
            'dark' => [
                'primary' => '#8b5cf6',
                'primary-hover' => '#a78bfa',
                'primary-focus' => 'rgba(139, 92, 246, 0.35)',
                'primary-foreground' => '#ffffff',
                'primary-subtle' => 'rgba(139, 92, 246, 0.15)',
                'primary-subtle-text' => '#ddd6fe',
            ],
        ],
        'rose' => [
            'name' => 'Rose',
            'light' => [
                'primary' => '#e11d48',
                'primary-hover' => '#be123c',
                'primary-focus' => 'rgba(225, 29, 72, 0.25)',
                'primary-foreground' => '#ffffff',
                'primary-subtle' => '#fff1f2',
                'primary-subtle-text' => '#9f1239',
            ],
            'dark' => [
                'primary' => '#f43f5e',
                'primary-hover' => '#fb7185',
                'primary-focus' => 'rgba(244, 63, 94, 0.35)',
                'primary-foreground' => '#ffffff',
                'primary-subtle' => 'rgba(244, 63, 94, 0.15)',
                'primary-subtle-text' => '#fecdd3',
            ],
        ],
        'amber' => [
            'name' => 'Amber',
            'light' => [
                'primary' => '#d97706',
                'primary-hover' => '#b45309',
                'primary-focus' => 'rgba(217, 119, 6, 0.25)',
                'primary-foreground' => '#ffffff',
                'primary-subtle' => '#fffbeb',
                'primary-subtle-text' => '#92400e',
            ],
            'dark' => [
                'primary' => '#f59e0b',
                'primary-hover' => '#fbbf24',
                'primary-focus' => 'rgba(245, 158, 11, 0.35)',
                'primary-foreground' => '#0f172a',
                'primary-subtle' => 'rgba(245, 158, 11, 0.15)',
                'primary-subtle-text' => '#fde68a',
            ],
        ],
        'zinc' => [
            'name' => 'Zinc',
            'light' => [
                'primary' => '#18181b',
                'primary-hover' => '#27272a',
                'primary-focus' => 'rgba(24, 24, 27, 0.25)',
                'primary-foreground' => '#ffffff',
                'primary-subtle' => '#f4f4f5',
                'primary-subtle-text' => '#18181b',
            ],
            'dark' => [
                'primary' => '#fafafa',
                'primary-hover' => '#f4f4f5',
                'primary-focus' => 'rgba(250, 250, 250, 0.35)',
                'primary-foreground' => '#09090b',
                'primary-subtle' => 'rgba(250, 250, 250, 0.15)',
                'primary-subtle-text' => '#fafafa',
            ],
        ],
        'slate' => [
            'name' => 'Slate',
            'light' => [
                'primary' => '#334155',
                'primary-hover' => '#1e293b',
                'primary-focus' => 'rgba(51, 65, 85, 0.25)',
                'primary-foreground' => '#ffffff',
                'primary-subtle' => '#f1f5f9',
                'primary-subtle-text' => '#0f172a',
            ],
            'dark' => [
                'primary' => '#94a3b8',
                'primary-hover' => '#cbd5e1',
                'primary-focus' => 'rgba(148, 163, 184, 0.35)',
                'primary-foreground' => '#0f172a',
                'primary-subtle' => 'rgba(148, 163, 184, 0.15)',
                'primary-subtle-text' => '#f8fafc',
            ],
        ],
    ];

    /**
     * Get all available palette names.
     *
     * @return array<string>
     */
    public static function all(): array
    {
        return array_keys(self::PALETTES);
    }

    /**
     * Determine if a palette exists.
     */
    public static function has(string $name): bool
    {
        return array_key_exists($name, self::PALETTES);
    }

    /**
     * Generate CSS variables for a given palette.
     */
    public static function toCss(string $palette = 'indigo'): string
    {
        $pal = self::PALETTES[$palette] ?? self::PALETTES['indigo'];

        $css = ":root {\n";
        foreach ($pal['light'] as $key => $val) {
            $css .= "  --admin-{$key}: {$val};\n";
        }
        $css .= "}\n";

        $css .= "html.dark {\n";
        foreach ($pal['dark'] as $key => $val) {
            $css .= "  --admin-{$key}: {$val};\n";
        }
        $css .= "}\n";

        return $css;
    }
}
