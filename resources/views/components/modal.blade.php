@props([
    'name',
    'title' => null,
    'maxWidth' => 'md',
])

@php
    $maxWidthClass = match ($maxWidth) {
        'sm' => 'max-w-sm',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
        default => 'max-w-md',
    };
@endphp

<div
    x-data="{ show: false, name: '{{ $name }}' }"
    x-show="show"
    x-on:open-modal.window="if ($event.detail === name) show = true"
    x-on:close-modal.window="if ($event.detail === name) show = false"
    x-on:keydown.escape.window="show = false"
    style="display: none;"
    class="admin-modal-backdrop"
>
    <div
        x-show="show"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="admin-modal-panel {{ $maxWidthClass }}"
        @click.outside="show = false"
    >
        @if ($title)
            <div class="admin-card-header">
                <h3 class="admin-card-title">{{ $title }}</h3>
                <button type="button" @click="show = false" class="admin-btn-ghost p-1 rounded">
                    <x-admin-panel::icon name="x" class="w-4 h-4" />
                </button>
            </div>
        @endif

        <div class="admin-card-body">
            {{ $slot }}
        </div>

        @if (isset($footer))
            <div class="admin-card-footer">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
