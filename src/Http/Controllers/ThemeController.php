<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use ImranDevBD\LaravelAdminPanel\Themes\Palettes;

class ThemeController extends Controller
{
    public function update(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'mode' => 'nullable|string|in:light,dark,system',
            'palette' => 'nullable|string',
        ]);

        if (isset($validated['mode'])) {
            session(['admin_panel_theme_mode' => $validated['mode']]);
        }

        if (isset($validated['palette']) && Palettes::has($validated['palette'])) {
            session(['admin_panel_theme_palette' => $validated['palette']]);
        }

        return response()->json([
            'success' => true,
            'mode' => session('admin_panel_theme_mode', 'system'),
            'palette' => session('admin_panel_theme_palette', 'indigo'),
        ]);
    }
}
