<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AssetController extends Controller
{
    public function serve(string $file): Response
    {
        // Sanitize file path to avoid directory traversal
        $file = basename($file);
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $distPath = dirname(__DIR__, 3).'/dist';

        $subfolder = match ($extension) {
            'css' => 'css',
            'js' => 'js',
            'svg' => 'icons',
            default => '',
        };

        $filePath = $subfolder !== ''
            ? "{$distPath}/{$subfolder}/{$file}"
            : "{$distPath}/{$file}";

        if (! file_exists($filePath)) {
            abort(404, 'Asset not found');
        }

        $contentType = match ($extension) {
            'css' => 'text/css; charset=utf-8',
            'js' => 'application/javascript; charset=utf-8',
            'svg' => 'image/svg+xml; charset=utf-8',
            default => 'text/plain; charset=utf-8',
        };

        $content = file_get_contents($filePath);
        if ($content === false) {
            abort(500, 'Unable to read asset file');
        }

        return response($content, 200, [
            'Content-Type' => $contentType,
            'Cache-Control' => 'public, max-age=31536000, immutable',
        ]);
    }
}
