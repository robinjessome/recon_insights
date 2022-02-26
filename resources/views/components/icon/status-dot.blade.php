
@props([
    'status' => null
])

@php

switch ($status) {
    case 'published':
        $statusClasses = 'bg-success-400 border-success-500';
         break;
    case 'scheduled':
        $statusClasses = 'bg-success-50 border-success-400';
         break;
    case 'draft':
        $statusClasses = 'bg-warning-400 border-warning-500';
         break;
    case 'expired':
        $statusClasses = 'bg-success-50 border-success-500';
         break;
    case 'archived':
        $statusClasses = 'bg-gray-100 border-gray-300';
         break;
    default:
        $statusClasses = 'bg-gray-50 border-gray-400';
        break;
}

@endphp
<span 
    {{ $attributes->merge([
    'class' => 'border inline-block w-3 h-3 align-middle rounded-full '.$statusClasses
]) }}></span>