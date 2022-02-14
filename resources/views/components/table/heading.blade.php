@props([
    'sortable' => null,
    'direction' => null,
])

@php
    
    $iconVisibility = 'opacity-0 text-gray-400';
    if($direction) {
        $iconVisibility = 'opacity-100';
    }

@endphp

<th {{ $attributes->merge([
    'class' => 'px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider'
]) }}>
    {{-- {{ $slot }} --}}
    @if($sortable)
    <button class="group block font-bold text-gray-600 uppercase tracking-wider">
        {{ $slot }}
        @if($direction == 'desc')
            <x-icon.chevron-down class="{{ $iconVisibility }} group-hover:opacity-100 transition" iconClass="w-4 h-4" />
        @else
            <x-icon.chevron-up class="{{ $iconVisibility }} group-hover:opacity-100 transition" iconClass="w-4 h-4" />
        @endif
    </button>
    @else
        {{  $slot }}
    @endif
</th>