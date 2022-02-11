@props(['name' => null])

<span {{ $attributes->merge(['class' => "icon icon-$name"]) }}>{{ $slot }}</span>