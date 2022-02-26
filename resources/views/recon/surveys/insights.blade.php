<x-app-layout>
    <x-slot name="header">
        <x-header>
            <div class="flex items-center space-x-2 ">
                <x-badge :status="$survey->status" />
                <x-headline level="h1">{{ __('Insights for:') }} <strong>{{ $survey->title }}</strong></x-headline>
            </div>            
            <div class="flex items-center space-x-2">
                <x-button type="link" href="{{ route('edit-survey', ['surveyId' => $surveyId]) }}">
                    {{ __('Edit survey') }}
                </x-button>
                <x-button 
                    type="link"
                    appearance="outline"
                    color="subtle"
                    href="{{ route('public-survey', ['surveyId' => $surveyId]) }}"
                    target="_blank"
                    title="{{ __('Preview survey') }}"
                >
                    <x-icon.external-link class="w-4 h-4" />
                </x-button>
            </div>
        </x-header>
    </x-slot>

        <x-container class="py-12">
            <section>
                Here..
            </section>
        </x-container>

</x-app-layout>
