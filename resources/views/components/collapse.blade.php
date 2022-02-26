@props([
    'appearance' => 'inline',
    'color' => null,
    'triggerClasses' => null,
    'trigger' => 'Expand'
])
<div x-data="{ expanded: false }">
    <x-button {{ $attributes->merge([
        'class' => $triggerClasses
    ]) }} x-on:click.prevent="expanded = ! expanded">
        {{ $trigger }}
    </x-button>
    {{-- <button {{ $attributes->merge([
        'class' => $triggerClasses
    ]) }} x-on:click.prevent="expanded = ! expanded">
        {{ $trigger }}
    </button> --}}
 
    <div 
        x-cloak
        x-show="expanded" 
        x-collapse
    >
        {{ $slot }}}
    </div>
</div>