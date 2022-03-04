@props([
    'iconClass' => 'h-6 w-6'
])
<x-icon.base 
    name="cancel"
    {{ $attributes->merge([
        'class' => ''
    ]) }}
>
<svg xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge([
    'class' => $iconClass]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
  </svg>
</x-icon.base>
