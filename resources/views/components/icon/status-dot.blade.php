
@props([
    'status' => null
])

@php

switch ($status) {
    case 'published':
        $statusClasses = 'bg-success-400 border-success-500';
        break;
    case 'draft':
        $statusClasses = 'bg-warning-400 border-warning-500';
        break;
    case 'expired':
        $statusClasses = 'bg-success-50 border-success-500';
         break;
    case 'archived':
    default:
        $statusClasses = 'bg-gray-100 border-gray-300';
        break;
}

@endphp
<span 
    {{ $attributes->merge([
    'class' => 'border inline-block w-4 h-4 align-middle rounded-full '.$statusClasses
]) }}></span>