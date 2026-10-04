<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use ImranDevBD\LaravelAdminPanel\Facades\AdminPanel;

class DashboardController extends Controller
{
    public function index(): View
    {
        $panel = AdminPanel::getCurrentPanel();

        /** @var view-string $view */
        $view = 'admin-panel::pages.dashboard';

        return view($view, [
            'panel' => $panel,
            'title' => __('admin-panel::admin-panel.dashboard'),
        ]);
    }
}
