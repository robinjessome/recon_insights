<x-app-layout>
    <x-slot name="header">
        <x-headline level="h1">{{ __('Surveys') }}</x-headline>
        <div>
            <x-button x-on:click="showCreateSurvey = true">{{ __('Create new survey') }}</x-button>
        </div>
    </x-slot>

        <x-container class="py-12">
            <section>
                <livewire:surveys.show-all-surveys />
            </section>
        </x-container>


    @push('modals')
        <x-modal.surveyCreate />
    @endpush

</x-app-layout>
