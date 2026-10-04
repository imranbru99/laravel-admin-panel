@props([
    'title' => null,
    'description' => null,
    'actions' => null,
    'footer' => null,
])

<div {{ $attributes->merge(['class' => 'admin-card']) }}>
    @if ($title || $description || $actions || isset($header))
        <div class="admin-card-header">
            <div>
                @if ($title)
                    <h3 class="admin-card-title">{{ $title }}</h3>
                @endif
                @if ($description)
                    <p class="admin-card-description">{{ $description }}</p>
                @endif
                {{ $header ?? '' }}
            </div>
            @if ($actions)
                <div class="flex items-center gap-2">
                    {{ $actions }}
                </div>
            @endif
        </div>
    @endif

    <div class="admin-card-body">
        {{ $slot }}
    </div>

    @if ($footer)
        <div class="admin-card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
