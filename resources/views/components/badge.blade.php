
@props([
    'size' => 'sm', 
    'status' => null,
])

@php

switch ($status) {
    case 'published':
        $statusClasses = 'bg-success-300 text-success-900 border-success-400';
         break;
    case 'scheduled':
        $statusClasses = 'bg-success-50 text-success-900 border-success-500';
         break;
    case 'draft':
        $statusClasses = 'bg-warning-400 text-warning-900 border-warning-500';
         break;
    case 'expired':
        $statusClasses = 'bg-success-50 border-success-500';
         break;
    case 'archived':
    default:
        $statusClasses = 'bg-gray-200 border-gray-200 text-gray-600';
         break;
}

@endphp

<span {{ $attributes->merge([
    'class' => 'px-3 py-1 text-xs rounded border '.$statusClasses
]) }}>{{ str()->title($status) }}</span>