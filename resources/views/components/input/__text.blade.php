@props([
    'placeholder' => null,
])
<input 
    type="text" 
    placeholder="{{ $placeholder }}" 
    {{ $attributes->merge([
        'class' => 'block w-full rounded-md shadow-sm border-gray-200 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50',
    ]) }}
/>
