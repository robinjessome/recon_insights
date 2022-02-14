@props([
    'label'
    ])

<label {{ $attributes->merge(['class' => 'inline-block font-medium text-sm text-gray-700']) }}>
    {{ $label ?? $slot }}
</label>
