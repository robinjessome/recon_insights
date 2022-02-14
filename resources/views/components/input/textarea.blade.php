@props([
    'disabled' => false,
    'stealth' => false,
    ])

@php
    $inputClasses = 'block w-full rounded-md shadow-sm border-gray-200 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50';
    if($stealth) {
        $inputClasses = 'mt-0 p-0 py-1 block w-full border-0 border-transparent rounded-md active:ring-0 focus:ring-0 focus:bg-gray-100 focus:px-2 transition-stealth';
    }
@endphp

<textarea {{ $disabled ? 'disabled' : '' }}
 {{ $attributes->merge([
    'class' => $inputClasses
]) }} /></textarea>