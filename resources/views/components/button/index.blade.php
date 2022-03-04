@props([
    'type' => 'button',
    'size' => 'sm', 
    'style' => 'default',
    'url' => null,
    'appearance' => 'solid',
    'color' => 'default',
    'expanded' => null,
])

@php


$appearanceClasses = array(
    'inline' => [
        'default' => 'border-none normal-case p-0 inline-block normal-case text-gray-400 hover:text-gray-600 focus:text-gray-600',
        'primary' => 'text-sky-500'
    ],
    'solid' => [
        'default' => 'border rounded text-white border-transparent bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50',
        'primary' => 'border rounded text-white border-transparent bg-sky-500 hover:bg-sky-700 active:bg-sky-900 focus:border-sky-900',
        'success' => 'border rounded border-transparent bg-success-300 text-success-800 hover:bg-success-400 active:bg-success-500  focus:bg-success-400 focus:border-success-600',
        'warning' => 'border rounded border-transparent bg-warning-400 text-gray-900 hover:bg-warning-500 active:bg-warning-500 focus:bg-warning-400 focus:border-warning-600',
        'info' => 'border rounded border-transparent bg-info-300 text-info-900 hover:bg-info-400 active:bg-info-400 focus:bg-info-400 focus:border-info-500',
        'danger' => 'border rounded border-transparent bg-danger-500 text-white hover:bg-danger-600 active:bg-danger-600 focus:bg-danger-600 focus:border-danger-700',
        'subtle' => 'border rounded border-transparent bg-gray-200 text-gray-500 hover:bg-gray-300 hover:text-gray-600 active:bg-gray-300 focus:bg-gray-300 focus:text-gray-600 focus:border-gray-400',
    ],
    'outline' => [
        'default' => '',
        'success' => 'border rounded text-success-600 border-success-400 hover:bg-success-100 focus:bg-success-100 active:bg-success-100 ',
        'warning' => 'border rounded text-warning-600 border-warning-500 hover:bg-warning-100 focus:bg-warning-100 active:bg-warning-100',
        'info' => 'border rounded text-info-600 border-info-400 hover:bg-info-100 focus:bg-info-100 active:bg-info-100',
        'danger' => 'border rounded text-danger-600 border-danger-400 hover:bg-danger-100 focus:bg-danger-100 active:bg-danger-100',
        'subtle' => 'border rounded text-gray-500 hover:text-gray-900 hover:bg-gray-100 focus:text-gray-900 focus:bg-gray-100',
        'none' => 'border rounded border-transparent text-gray-500 hover:text-gray-900 focus:text-gray-900'
    ]
);

$sizeClasses = 'text-xs px-4 py-2';

$sizes = array(
    'inline' => '',
    'sm' => 'text-xs px-4 py-2 uppercase',
    'md' => 'text-sm px-6 py-3 uppercase',
    'lg' => 'text-md px-8 py-3 uppercase',
    'xl' => 'text-lg px-16 py-4 uppercase'
);


// if ($style == 'published') {
//     $style = 'success';
// }
// if($style == 'draft') {
//     $style == 'warning';
// }
// if($style == 'archived') {
//     $style = 'outline-subtle';
// }
// if($style == 'scheduled') {
//     $style = 'warning';
// }
// switch ($style) {
//     case 'outline':
//         $styleClasses = 'text-gray-800 border-gray-900 hover:bg-gray-900 hover:text-white active:bg-gray-900 active:text-white focus:border-gray-900 focus:bg-gray-800 focus:text-white';
//          break;
//     case 'outline-subtle':
//         $styleClasses = 'text-gray-700 border-gray-300 hover:bg-gray-200 focus:bg-gray-200 active:bg-gray-200';
//          break;
//     case 'primary':
//         $styleClasses = 'text-white border-transparent bg-sky-500 hover:bg-sky-700 active:bg-sky-900 focus:border-sky-900';
//          break;
//     case 'success':
//         $styleClasses = 'border-transparent bg-success-300 text-success-800 hover:bg-success-400 active:bg-success-500 focus:border-success-600';
//          break;
//     case 'warning':
//         $styleClasses = 'border-transparent bg-warning-500 text-warning-800 hover:bg-warning-600 active:bg-warning-600 focus:border-warning-600';
//          break;
//     case 'ghost-danger':
//         $styleClasses = 'text-gray-400 hover:bg-danger-500 hover:text-white';
//          break;
//     default:
//         $styleClasses = 'text-white border-transparent bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50';
//          break;
// }

// switch ($size) {
//     case 'md':
//         $sizeClasses = 'text-sm px-6 py-3';
//         break;
//     case 'lg':
//         $sizeClasses = 'text-md px-8 py-3';
//         break;
//     case 'xl':
//         $sizeClasses = 'text-lg px-16 py-4';
//          break;
//     default:
//         $sizeClasses = 'text-xs px-4 py-2';
//         break;
// }
@endphp

@if($type == 'link')
    <a {{ $attributes->merge([
        'href' => $url,
        'class' => 'inline-flex items-center justify-center text-center tracking-widest focus:outline-none disabled:opacity-25 transition ease-in-out duration-150 focus:ring ring-gray-300 '.$appearanceClasses[$appearance][$color].' '.$sizes[$size]]) }}>
        {{ $slot }}
    </a>

@else
    <button {{ $attributes->merge([
        'type' => $type, 
        'class' => 'inline-flex items-center justify-center text-center tracking-widest focus:outline-none disabled:opacity-25 transition ease-in-out duration-150 focus:ring ring-gray-300 '.$appearanceClasses[$appearance][$color].' '.$sizes[$size]]) }}>
        {{ $slot }}
    </button>
@endif