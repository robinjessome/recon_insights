<div>
    <p>Survey "{{ $surveyId }}" is {{ $surveyStatus }}</p>
</div>





{{-- <div class="flex items-center space-x-2">
    @if($surveyStatus !== 'published')
        @if($surveyStatus !== 'archived')
            <x-button style="ghost-danger" wire:click="archive()">{{ __('Archive') }}</x-button>
            <x-button style="success" wire:click="publish()">{{ __('Publish Now') }}</x-button>
        @else
            <x-button style="outline" wire:click="unarchive()">{{ __('Unarchive') }}</x-button>
        @endif
    @else
        <x-button style="outline" wire:click="unpublish()">{{ __('Unpublish') }}</x-button>
    @endif
</div> --}}
