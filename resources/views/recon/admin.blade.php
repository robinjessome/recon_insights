<x-app-layout>
    <x-slot name="header">
        <x-headline level="h1" class="leading-normal">{{ __('Admin area') }}</x-headline>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're in the admin area, {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
