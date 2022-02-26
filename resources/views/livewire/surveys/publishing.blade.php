{{-- @php

switch ($surveyStatus) {
    case 'published':
        $statusClasses = 'bg-success-300 text-success-900 border-success-400';
        break;
    case 'draft':
        $statusClasses = 'bg-warning-400 text-warning-900 border-warning-500';
        break;
    case 'expired':
        $statusClasses = 'bg-success-50 border-success-500';
         break;
    case 'archived':
    default:
        $statusClasses = 'bg-gray-200 border-gray-400';
        break;
}

@endphp --}}


@php

$btnAppearance = 'solid';
$btnColor = null;
$mainLabel = __('Publish');
if($surveyStatus == 'published') {

    $mainLabel = __('Published');
    $btnColor = 'success';
}
if($surveyStatus == 'draft') {
    $btnColor = 'warning';
}

if($surveyStatus == 'scheduled') {
    $mainLabel = __('Scheduled');
    $btnAppearance = 'outline';
    $btnColor = 'success';
}

if($surveyStatus == 'expired') {
    $mainLabel = __('Expired');
    $btnAppearance = 'outline';
    $btnColor = 'success';
}

if($surveyStatus == 'archived') {
    $mainLabel = __('Unarchive');
    $btnAppearance = 'outline';
    $btnColor = 'subtle';
}

@endphp

{{-- @if($surveyStatus == 'published') 

@else

@endif --}}

<div class="flex items-center space-x-2">
@if($surveyStatus == 'archived')
    <x-button :appearance="$btnAppearance" :color="$btnColor" wire:click="unpublish()">
        {{ __('Unarchive') }}
    </x-button>
@else
    <x-button.dropdown align="right" width="48">
        <x-slot name="trigger">

            <x-button :color="$btnColor" :appearance="$btnAppearance">
                {{ $mainLabel }}
                <div class="ml-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </x-button>

        </x-slot>

        <x-slot name="content">
            @if($surveyStatus !== 'published')        
                @if($surveyStatus !== 'archived')
                    <x-button.dropdown-link type="button" wire:click="publish()" x-text="publishText">
                        {{-- {{ __('Publish now') }} --}}
                    </x-button.dropdown-link>
                    @if($surveyStatus == 'scheduled')
                        <x-button.dropdown-link type="button" wire:click="unschedule">
                            {{ __('Cancel schedule') }}
                        </x-button.dropdown-link>
                    @else
                        <x-button.dropdown-link type="button" x-on:click="showPublishDateModal = true">
                            {{ __('Schedule publishing') }}
                        </x-button.dropdown-link>
                    @endif
                    <x-button.dropdown-link type="button" wire:click="archive()">
                        {{ __('Archive') }}
                    </x-button.dropdown-link>
                {{-- @else
                <x-button.dropdown-link type="button" wire:click="unarchive()">
                    {{ __('Unarchive') }}
                </x-button.dropdown-link> --}}
                @endif  
            @else
                <x-button.dropdown-link type="button" wire:click="unpublish()">
                    {{ __('Unpublish now') }}
                </x-button.dropdown-link>
                <x-button.dropdown-link type="button" x-on:click="showUnpublishDateModal = true">
                    {{ __('Schedule unpublishing') }}
                </x-button.dropdown-link>
            @endif

        </x-slot>
    </x-button.dropdown>
@endif

    <x-button 
        type="link"
        appearance="outline"
        color="subtle"
        href="{{ route('survey-insights', ['surveyId' => $surveyId]) }}"
        title="{{ __('View insights') }}"
    >
        <x-icon.eye class="w-4 h-4 mr-2" />{{ __('Insights') }}
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
