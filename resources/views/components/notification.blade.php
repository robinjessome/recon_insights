@props([
    'type' => 'info'
])

@php
$alertClasses = array(
    'success' => 'bg-success-50 border-success-400 text-success-600',
    'info' => 'bg-info-50 border-info-400 text-info-600',
    'warning' => 'bg-warning-50 border-warning-500 text-warning-600',
    'danger' => 'bg-danger-50 border-danger-500 text-red-700',
    'error' => 'bg-danger-50 border-danger-500 text-red-700',
);  
@endphp

<div {{ $attributes->merge([
    'class' => 'border-2 fixed right-12 bottom-12 p-3 pl-4 rounded bg-white shadow hover:shadow-lg transition flex space-between items-center '.$alertClasses[$type]
]) }}
    x-data="{ noticeOpen: true }"
    x-show="noticeOpen"
    x-init="setTimeout(() => noticeOpen = false, 5000)"
    x-transition
>
    <span>{{ $slot }}</span>
    <button x-on:click="noticeOpen = ! noticeOpen">
        <x-icon.cancel class="ml-3" iconClass="w-4 h-4" />
    </button>
</div>