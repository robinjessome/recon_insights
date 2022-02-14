@once
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush
@endonce

@props([
    'options' => '{dateFormat:"Y-m-d H:i", altFormat:"F j, Y h:iK", altInput:true, enableTime: true }',
    'stealth' => false,
    ])


@php
    $inputClasses = 'block w-full rounded-md shadow-sm border-gray-200 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50';
    if($stealth) {
        $inputClasses = 'mt-0 p-0 py-1 block w-full border-0 border-transparent rounded-md active:ring-0 focus:ring-0 focus:bg-gray-100 focus:px-2 transition-stealth';
    }
@endphp

{{-- <div
    x-data="{ value: @entangle($attributes->wire('model')) }"
    x-on:change="value = $event.target.value"
    x-init="flatpickr($refs.input, {enableTime: true, dateFormat: 'Z', defaultHour: 18 })"
>
    <input 
        {{ $attributes->whereDoesntStartWith('wire:model') }} 
        x-ref="input"
        x-bind:value="value" 
        type="text" 
        class="pl-10 block w-full shadow-sm sm:text-lg bg-gray-50 border-gray-300 focus:ring-primary-500 focus:border-primary-500rounded-md" 
    />
</div> --}}


    <input
        x-data
        x-init="flatpickr($refs.input, {{ $options }} );"
        x-ref="input"
        type="text"
        {{ $attributes->merge([
            'class' => $inputClasses
        ]) }}
    />