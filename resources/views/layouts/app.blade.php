<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
        @stack('styles')

    </head>
    <body 
        class="font-sans antialiased" 
        x-data="{
            showCreateSurvey: false,
            showPublishDateModal: false,
            showUnpublishDateModal: false
        }"
    >
        <div class="min-h-screen bg-gray-100 flex flex-col">
            
            @include('layouts.navigation')

            <!-- Page Heading -->
            {{ $header }}

            
            {{-- <x-container class="py-12">
                <x-card>
                    You're logged in, {{ Auth::user()->name }}!
                </x-card>
            </x-container> --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <footer class="mt-auto bg-gray-200 py-4 flex flex-col">
                <x-container class="text-gray-500 text-center text-xs mt-auto">
                    &copy; {{ now()->format('Y') }} {{  config('app.name') }}. All rights reservered.
                </x-container>
            </footer>
  
        </div>

        @if (session()->has('message'))
            <x-notification wire:key="notification" :type="session()->get('message-type', 'info')">
                {!! session('message') !!}
            </x-notification>
        @endif

        @stack('modals')

        <!-- Scripts -->
        @livewireScripts
        <script src="{{ asset('js/app.js') }}" defer></script>
        @stack('scripts')

    </body>
</html>
