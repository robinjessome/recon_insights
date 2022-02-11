@props([
    'type' => 'button',
    'size' => 'sm', 
    'style' => 'default',
    'url' => null,
])

@php
switch ($style) {
    case 'outline':
        $styleClasses = 'text-gray-800 border-gray-900 hover:bg-gray-900 hover:text-white active:bg-gray-900 active:text-white focus:border-gray-900 focus:bg-gray-800 focus:text-white';
         break;
    case 'outline-subtle':
        $styleClasses = 'text-gray-700 border-gray-300 hover:bg-gray-200 focus:bg-gray-200 active:bg-gray-200';
         break;
    case 'primary':
        $styleClasses = 'text-white border-transparent bg-blue-500 hover:bg-blue-700 active:bg-blue-900 focus:border-blue-900';
         break;
    case 'success':
        $styleClasses = 'text-white border-transparent bg-success-500 hover:bg-success-600 active:bg-success-700 focus:border-success-800';
         break;
    case 'ghost-danger':
        $styleClasses = 'text-gray-400 hover:bg-danger-500 hover:text-white';
         break;
    default:
        $styleClasses = 'text-white border-transparent bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:border-gray-900 focus:ring ring-gray-300';
         break;
}

switch ($size) {
    case 'md':
        $sizeClasses = 'text-sm px-6 py-3';
        break;
    case 'lg':
        $sizeClasses = 'text-md px-8 py-3';
        break;
    case 'xl':
        $sizeClasses = 'text-lg px-16 py-4';
         break;
    default:
        $sizeClasses = 'text-xs px-4 py-2';
        break;
}
@endphp

{{-- @if($type == 'link')
    <a {{ $attributes->merge([
        'href' => $url,
        'class' => 'inline-flex items-center border rounded font-semibold uppercase tracking-widest focus:outline-none disabled:opacity-25 transition ease-in-out duration-150 focus:ring ring-gray-300 '.$styleClasses.' '.$sizeClasses
    ]) }}>
        {{ $slot }}
    </a>

@else --}}
    <button {{ $attributes->merge([
        'type' => $type, 
        'class' => 'inline-flex items-center border rounded font-semibold uppercase tracking-widest focus:outline-none disabled:opacity-25 transition ease-in-out duration-150 focus:ring ring-gray-300 '.$styleClasses.' '.$sizeClasses]) }}>
        {{ $slot }}
    </button>
{{-- @endif --}}