@php
    $jsAsset = file_exists(public_path(config('admin-panel.assets.publish_path', 'vendor/admin-panel') . '/js/admin-panel.js'))
        ? asset(config('admin-panel.assets.publish_path', 'vendor/admin-panel') . '/js/admin-panel.js')
        : route('admin-panel.asset', ['file' => 'admin-panel.js']);
@endphp

{!! \ImranDevBD\LaravelAdminPanel\Facades\AdminPanel::renderHook(\ImranDevBD\LaravelAdminPanel\Support\RenderHook::FOOTER_START) !!}

{!! \ImranDevBD\LaravelAdminPanel\Facades\AdminPanel::renderHook(\ImranDevBD\LaravelAdminPanel\Support\RenderHook::FOOTER_END) !!}

<!-- Core Admin Panel JS Runtime + Alpine.js -->
<script src="{{ $jsAsset }}"></script>

{!! \ImranDevBD\LaravelAdminPanel\Facades\AdminPanel::renderHook(\ImranDevBD\LaravelAdminPanel\Support\RenderHook::BODY_END) !!}
