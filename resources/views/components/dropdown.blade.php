@props([
    'align' => 'right',
    'width' => '48',
])

<div x-data="{ open: false }" class="admin-dropdown" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="admin-dropdown-menu"
        style="display: none;"
        @click="open = false"
    >
        {{ $content }}
    </div>
</div>
