<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use ImranDevBD\LaravelAdminPanel\Http\Controllers\AssetController;
use ImranDevBD\LaravelAdminPanel\Http\Controllers\DashboardController;
use ImranDevBD\LaravelAdminPanel\Http\Controllers\ThemeController;
use ImranDevBD\LaravelAdminPanel\Http\Middleware\SetAdminPanelContext;

Route::middleware(array_merge(
    config('admin-panel.middleware', ['web']),
    [SetAdminPanelContext::class]
))->group(function () {

    // Internal asset serving fallback route (no publish strictly required)
    Route::get('/assets/{file}', [AssetController::class, 'serve'])
        ->where('file', '.*')
        ->name('admin-panel.asset');

    Route::get('/', [DashboardController::class, 'index'])->name('admin-panel.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::post('/theme', [ThemeController::class, 'update'])->name('admin-panel.theme.update');
});
