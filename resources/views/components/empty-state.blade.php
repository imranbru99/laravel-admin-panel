@props([
    'icon' => 'folder',
    'title' => null,
    'description' => null,
    'action' => null,
    'actionUrl' => null,
])

<div {{ $attributes->merge(['class' => 'admin-empty-state']) }}>
    <x-admin-panel::icon :name="$icon" class="admin-empty-icon" />

    <h3 class="admin-empty-title">
        {{ $title ?? __('admin-panel::admin-panel.empty.title') }}
    </h3>

    <p class="admin-empty-description">
        {{ $description ?? __('admin-panel::admin-panel.empty.description') }}
    </p>

    @if ($action && $actionUrl)
        <x-admin-panel::button :href="$actionUrl" variant="primary" icon="plus">
            {{ $action }}
        </x-admin-panel::button>
    @elseif (isset($slot) && ! empty(trim((string) $slot)))
        {{ $slot }}
    @endif
</div>
