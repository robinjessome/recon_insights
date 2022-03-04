@props([
    'iconClass' => 'h-6 w-6'
])
<x-icon.base 
    name="eye"
    {{ $attributes->merge([
        'class' => ''
    ]) }}
>
<svg xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge([
    'class' => $iconClass]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
  </svg>
</x-icon.base>