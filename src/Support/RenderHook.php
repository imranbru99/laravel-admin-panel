<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Support;

use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

final class RenderHook
{
    public const HEAD_START = 'head.start';

    public const HEAD_END = 'head.end';

    public const BODY_START = 'body.start';

    public const BODY_END = 'body.end';

    public const SIDEBAR_HEADER = 'sidebar.header';

    public const SIDEBAR_FOOTER = 'sidebar.footer';

    public const TOPBAR_START = 'topbar.start';

    public const TOPBAR_ACTIONS = 'topbar.actions';

    public const TOPBAR_END = 'topbar.end';

    public const PAGE_BEFORE_CONTENT = 'page.before-content';

    public const PAGE_AFTER_CONTENT = 'page.after-content';

    public const FOOTER_START = 'footer.start';

    public const FOOTER_END = 'footer.end';

    /**
     * Registered hooks.
     *
     * @var array<string, array<int, Closure|string|Htmlable>>
     */
    private static array $hooks = [];

    /**
     * Register a callback or HTML content for a hook.
     */
    public static function register(string $name, Closure|string|Htmlable $callback): void
    {
        self::$hooks[$name][] = $callback;
    }

    /**
     * Render all contents registered for a hook.
     *
     * @param  array<string, mixed>  $scopes
     */
    public static function render(string $name, array $scopes = []): HtmlString
    {
        if (empty(self::$hooks[$name])) {
            return new HtmlString('');
        }

        $output = '';

        foreach (self::$hooks[$name] as $hook) {
            if ($hook instanceof Closure) {
                $result = $hook(...$scopes);
            } elseif ($hook instanceof Htmlable) {
                $result = $hook->toHtml();
            } else {
                $result = (string) $hook;
            }

            if ($result instanceof Htmlable) {
                $output .= $result->toHtml();
            } elseif (is_string($result)) {
                $output .= $result;
            }
        }

        return new HtmlString($output);
    }

    /**
     * Clear registered hooks (useful for tests).
     */
    public static function flush(): void
    {
        self::$hooks = [];
    }
}
