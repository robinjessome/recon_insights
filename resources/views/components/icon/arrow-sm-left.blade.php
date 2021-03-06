@props([
    'iconClass' => 'h-6 w-6'
])

<x-icon.base 
    name="arrow-left"
    {{ $attributes->merge([
        'class' => ''
    ]) }}
>
<svg xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge([
    'class' => $iconClass]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
  </svg>
</x-icon.base>


