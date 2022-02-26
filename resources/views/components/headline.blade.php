@props([
    'level' => 'h2',
])

@php

$fontClasses = array(
    'h1' => ' text-2xl leading-normal',
    'h2' => ' text-xl leading-tight font-medium',
    'h3' => ' text-lg leading-tight font-medium',
);

@endphp
<{{ $level }} {{ $attributes->merge([
    'class' => $fontClasses[$level]
    ]) }}>
    {{ $slot }}
</{{ $level }}>