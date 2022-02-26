@props([
    'type' => 'link',
    'style' => 'default',
])


@if($type == 'link')
    <a {{ $attributes->merge(['class' => 'block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out']) }}>{{ $slot }}</a>
@else
    <button {{ $attributes->merge([
        'type' => $type, 
        'class' => 'w-full block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out']) }}>
        {{ $slot }}
    </button>

@endif


