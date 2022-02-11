@props([
    'status' => null,
    ])

@php
    $isArchived = false;
    if($status == 'archived') {
        $isArchived = true;
    }
    //{{ $attributes->merge(['class' => 'px-6 py-3 whitespace-no-wrap text-gray-900']) }}
@endphp
<td {{ $attributes->class([
        'px-6 py-3 whitespace-no-wrap',
        'text-gray-400 font-light' => $isArchived,
        'text-gray-900' => !$isArchived,
    ]) }} >
    {{ $slot }}
</td>