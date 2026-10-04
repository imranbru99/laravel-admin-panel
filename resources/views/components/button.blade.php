@props([
    'variant' => 'primary', // primary, secondary, outline, ghost, danger
    'size' => 'md', // sm, md, lg
    'icon' => null,
    'iconTrailing' => null,
    'href' => null,
    'type' => 'button',
])

@php
    $sizeClasses = match ($size) {
        'sm' => 'admin-btn-sm',
        'lg' => 'admin-btn-lg',
        default => '',
    };

    $variantClasses = match ($variant) {
        'secondary' => 'admin-btn-secondary',
        'outline' => 'admin-btn-outline',
        'ghost' => 'admin-btn-ghost',
        'danger' => 'admin-btn-danger',
        default => 'admin-btn-primary',
    };

    $classes = "admin-btn {$variantClasses} {$sizeClasses}";
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon)
            <x-admin-panel::icon :name="$icon" class="w-4 h-4" />
        @endif
        {{ $slot }}
        @if ($iconTrailing)
            <x-admin-panel::icon :name="$iconTrailing" class="w-4 h-4" />
        @endif
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon)
            <x-admin-panel::icon :name="$icon" class="w-4 h-4" />
        @endif
        {{ $slot }}
        @if ($iconTrailing)
            <x-admin-panel::icon :name="$iconTrailing" class="w-4 h-4" />
        @endif
    </button>
@endif
