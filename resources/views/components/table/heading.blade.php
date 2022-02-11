@props([
    'sortable' => null,
    'directon' => null,
])

<th {{ $attributes->merge([
    'class' => 'px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider'
]) }}>
    {{  $slot }}
</th>