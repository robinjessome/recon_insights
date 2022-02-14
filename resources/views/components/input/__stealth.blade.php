@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'mt-0 p-0 py-1 block w-full border-0 border-transparent rounded-md active:ring-0 focus:ring-0 focus:bg-gray-100 focus:px-2 transition-stealth'
]) !!}>