@props([
    'label'
    ])

<label {{ $attributes->merge(['class' => 'inline-block font-light text-sm text-gray-700']) }}>
    {{ $label ?? $slot }}
</label>
