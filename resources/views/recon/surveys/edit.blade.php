<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-2">
            <x-badge :status="$survey->status" />
            <x-headline level="h1">{{ __('Editing:') }} <strong>{{  $survey->title }}</strong></x-headline>
        </div>
        
        <livewire:surveys.publish :surveyId="$surveyId" :surveyStatus="$survey->status">

    </x-slot>

        <x-container class="py-12">
            <div class="mb-4 text-sm">
                <a href="{{  route('surveys') }}" class="text-gray-500 hover:text-gray-600"><x-icon.arrow-sm-left iconClass="w-5 h-5"/>{{ __('Back to surveys') }}</a>
            </div>
            <x-card>   

                {{-- <ul class="list-disc list-inside">
                    <li><strong>Title:</strong> {{ $survey->title }}</li>
                    <li><strong>Slug:</strong> {{ $survey['slug'] }}</li>
                    <li><strong>Status:</strong> {{ $survey->status }}</li>
                    <li><strong>Publish Date:</strong> {{ $survey['publishDate'] }}</li>
                    <li><strong>Description:</strong> {{ $survey['description'] }}</li>
                </ul> --}}
            </x-card>
        </x-container>
</x-app-layout>