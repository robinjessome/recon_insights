<x-app-layout>
    <x-slot name="header">
        <x-header>
            <x-headline level="h1">{{ __('Dashboard') }}</x-headline>
        </x-header>
    </x-slot>

        <x-container class="py-12">
            <x-card>
                You're logged in, {{ Auth::user()->name }}!
            </x-card>
        </x-container>

</x-app-layout>


