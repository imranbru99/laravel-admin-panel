@props([
    'variant' => 'primary', // primary, success, warning, danger, neutral
    'icon' => null,
])

@php
    $variantClass = match ($variant) {
        'success' => 'admin-badge-success',
        'warning' => 'admin-badge-warning',
        'danger' => 'admin-badge-danger',
        'neutral' => 'admin-badge-neutral',
        default => 'admin-badge-primary',
    };
@endphp

<span {{ $attributes->merge(['class' => 'admin-badge ' . $variantClass]) }}>
    @if ($icon)
        <x-admin-panel::icon :name="$icon" class="w-3.5 h-3.5" />
    @endif
    {{ $slot }}
</span>
