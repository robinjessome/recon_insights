<div {{ $attributes->merge([
    'class' => 'bg-white p-6 overflow-hidden shadow-sm sm:rounded-md'
    ]) }}>
    {{ $slot }}
</div>
