@props([
    'level' => 'h2',
])

@php

$fontClasses = array(
    'h1' => ' text-2xl leading-normal font-semibold',
    'h2' => ' text-xl leading-tight font-semibold',
    'h3' => ' text-lg leading-tight font-semibold',
);

@endphp
<{{ $level }} {{ $attributes->merge([
    'class' => $fontClasses[$level]
    ]) }}>
    {{ $slot }}
</{{ $level }}>