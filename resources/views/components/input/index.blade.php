@props([
    'disabled' => false,
    'stealth' => false,
    ])

@php
    $inputClasses = 'block w-full rounded-md shadow-sm border-gray-200 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50';
    if($stealth) {
        $inputClasses = 'stealth mt-0 p-0 py-1 block w-full border border-transparent rounded-md active:ring-0 focus:ring-0 focus:bg-gray-50 focus:px-2 focus:border-gray-50 transition-stealth';
    }
@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $inputClasses]) !!}>
