<?php

declare(strict_types=1);

namespace ImranDevBD\LaravelAdminPanel\Themes;

class Theme
{
    protected string $palette = 'indigo';

    protected string $mode = 'system';

    protected string $brandName = 'Admin Panel';

    protected ?string $brandLogo = null;

    protected ?string $brandLogoDark = null;

    protected string $radius = 'md'; // sm, md, lg, xl

    protected string $density = 'comfortable'; // comfortable, compact

    protected string $sidebarVariant = 'inset'; // classic, inset, floating

    protected string $fontFamily = 'Inter, system-ui, sans-serif';

    public function __construct(string $palette = 'indigo', string $mode = 'system')
    {
        $this->palette = Palettes::has($palette) ? $palette : 'indigo';
        $this->mode = in_array($mode, ['light', 'dark', 'system'], true) ? $mode : 'system';
    }

    public static function make(string $palette = 'indigo', string $mode = 'system'): static
    {
        return new static($palette, $mode);
    }

    public function palette(string $palette): static
    {
        if (Palettes::has($palette)) {
            $this->palette = $palette;
        }

        return $this;
    }

    public function getPalette(): string
    {
        return $this->palette;
    }

    public function mode(string $mode): static
    {
        if (in_array($mode, ['light', 'dark', 'system'], true)) {
            $this->mode = $mode;
        }

        return $this;
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public function brandName(string $name): static
    {
        $this->brandName = $name;

        return $this;
    }

    public function getBrandName(): string
    {
        return $this->brandName;
    }

    public function brandLogo(?string $url, ?string $darkUrl = null): static
    {
        $this->brandLogo = $url;
        $this->brandLogoDark = $darkUrl ?? $url;

        return $this;
    }

    public function getBrandLogo(): ?string
    {
        return $this->brandLogo;
    }

    public function getBrandLogoDark(): ?string
    {
        return $this->brandLogoDark;
    }

    public function radius(string $radius): static
    {
        $this->radius = $radius;

        return $this;
    }

    public function getRadius(): string
    {
        return $this->radius;
    }

    public function density(string $density): static
    {
        $this->density = $density;

        return $this;
    }

    public function getDensity(): string
    {
        return $this->density;
    }

    public function sidebarVariant(string $variant): static
    {
        $this->sidebarVariant = $variant;

        return $this;
    }

    public function getSidebarVariant(): string
    {
        return $this->sidebarVariant;
    }

    public function fontFamily(string $font): static
    {
        $this->fontFamily = $font;

        return $this;
    }

    public function getFontFamily(): string
    {
        return $this->fontFamily;
    }

    /**
     * Render the CSS variables for the theme.
     */
    public function renderCss(): string
    {
        $paletteCss = Palettes::toCss($this->palette);

        $radiusMap = [
            'sm' => '0.25rem',
            'md' => '0.5rem',
            'lg' => '0.75rem',
            'xl' => '1rem',
        ];
        $radiusValue = $radiusMap[$this->radius] ?? '0.5rem';

        $vars = ":root {\n";
        $vars .= "  --admin-radius: {$radiusValue};\n";
        $vars .= "  --admin-font: {$this->fontFamily};\n";
        $vars .= "}\n";

        return $vars.$paletteCss;
    }
}
