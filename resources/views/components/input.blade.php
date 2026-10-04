@props([
    'label' => null,
    'name' => null,
    'id' => null,
    'type' => 'text',
    'value' => null,
    'placeholder' => null,
    'hint' => null,
    'error' => null,
    'required' => false,
])

@php
    $inputId = $id ?? ($name ?? 'input-' . uniqid());
@endphp

<div class="admin-input-group">
    @if ($label)
        <label for="{{ $inputId }}" class="admin-label">
            {{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <input
        id="{{ $inputId }}"
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        @if ($required) required @endif
        {{ $attributes->merge(['class' => 'admin-input']) }}
    />

    @if ($hint && ! $error)
        <span class="admin-input-hint">{{ $hint }}</span>
    @endif

    @if ($error)
        <span class="text-xs text-red-500 font-medium">{{ $error }}</span>
    @endif
</div>
