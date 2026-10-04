<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use ImranDevBD\LaravelAdminPanel\AdminPanel;
use ImranDevBD\LaravelAdminPanel\Panel\Panel;
use Symfony\Component\HttpFoundation\Response;

class SetAdminPanelContext
{
    protected AdminPanel $adminPanel;

    public function __construct(AdminPanel $adminPanel)
    {
        $this->adminPanel = $adminPanel;
    }

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ?string $panelId = null): Response
    {
        $panel = null;

        if ($panelId !== null && $this->adminPanel->getPanels() !== []) {
            try {
                $panel = $this->adminPanel->getPanel($panelId);
            } catch (\Throwable) {
                $panel = null;
            }
        }

        if ($panel === null) {
            // Find panel matching current path
            foreach ($this->adminPanel->getPanels() as $candidate) {
                if ($candidate->getDomain() && $candidate->getDomain() !== $request->getHost()) {
                    continue;
                }

                $prefix = $candidate->getPath();
                if ($prefix === '' || $request->is($prefix) || $request->is($prefix.'/*')) {
                    $panel = $candidate;
                    break;
                }
            }
        }

        if ($panel === null) {
            $panel = $this->adminPanel->getCurrentPanel();
        }

        if ($panel instanceof Panel) {
            $this->adminPanel->setCurrentPanel($panel);
            view()->share('currentPanel', $panel);
            view()->share('currentTheme', $panel->getTheme());
        }

        return $next($request);
    }
}
