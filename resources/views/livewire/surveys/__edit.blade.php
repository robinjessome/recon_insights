<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-2">
            <x-badge :status="$status" />
            <x-headline level="h1">{{ __('Editing:') }} <strong>{{  $title }}</strong></x-headline>
        </div>
       
        {{-- <livewire:surveys.publish :surveyId="$surveyId" :surveyStatus="$survey->status"> --}}

    </x-slot>

        <x-container class="py-12">
            <div class="flex justify-between items-center py-4">
                <div class="text-sm">
                    <a href="{{  route('surveys') }}" class="text-gray-500 hover:text-gray-600"><x-icon.arrow-sm-left iconClass="w-5 h-5"/>{{ __('Back to surveys') }}</a>
                </div>
                {{-- <div class="">
                    <x-button type="submit" size="md" style="primary" x-bind:disabled="!changed" >{{ __('Save edits') }}</x-button>
                </div> --}}
            </div>

<form 
    wire:submit.prevent="update"
    x-data="{ changed: false, slugChanged: @entangle('slugChanged') }"
    x-on:change.delay="changed = true"
>
    @csrf
    <x-card class="grid grid-cols-12 gap-x-6">
        <div class="col-span-8 h-[1200px]">
            <div 
            class="mb-4 @error('slug') text-danger-800 @enderror" 
            :class="{ 'text-success-500': slugChanged, 'text-gray-400': !slugChanged }"
            >
                <x-input.label for="slug" class="text-xs" label="{{  __('URL') }}" />
                <x-input 
                    id="slug" 
                    type="text"
                    stealth 
                    wire:model="slug" 
                    wire:change="validateSlug"
                    x-on:change="slugChanged = true"
                    class="w-auto font-mono border-none focus:text-gray-900"
                />
                @error('slug') <x-input.error>{{ $message }}</x-input.error> @enderror
            </div>
            <div class="mb-4">
                <x-input.label for="title" class="text-xs" label="{{  __('Title') }}" />
                <x-input 
                    id="title" 
                    type="text"
                    stealth
                    wire:model="title"
                    class="text-4xl font-bold"
                /> 
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <x-input.label for="description" class="text-xs" label="{{  __('Description') }} (Max 255 charcters)" />
                <x-input.textarea 
                    id="description" 
                    type="text"
                    stealth
                    wire:model="description"
                    class="resize-none text-lg"
                    placeholder="Enter a survey description..."
                    rows="2"
                />
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-span-4 rounded-md border border-gray-200 self-start p-4 sticky top-4">
            <div class="mb-4 flex space-x-4">
                <x-button type="submit" size="md" class="block w-1/2" style="primary" x-bind:disabled="!changed" >{{ __('Save edits') }}</x-button>

                <x-button 
                    style="outline"
                    size="md" 
                    class="w-1/2"
                    wire:click="publish()"
                >
                    {{ __('STATUS') }}
                </x-button>

            {{-- @if($survey->status !== 'published')
                @if($survey->status !== 'archived')
                    <x-button style="ghost-danger" wire:click="archive()">{{ __('Archive') }}</x-button>
                    <x-button style="success" wire:click="publish()">{{ __('Publish Now') }}</x-button>
                @else
                    <x-button style="outline" wire:click="unarchive()">{{ __('Unarchive') }}</x-button>
                @endif
            @else
                <x-button style="outline" wire:click="unpublish()">{{ __('Unpublish') }}</x-button>
            @endif --}}
                

            </div>

            {{ $testVar }}
            {{-- <div class="mb-2">
                <x-input.label for="publishDate" class="text-xs" label="{{  __('Publish Date') }}" />
                <x-input.datepicker
                    id="publishDate" 
                    value="{{ $survey->publishDate }}"
                    wire:model="publishDate"
                 />
            </div> --}}
            {{-- <div class="mb-2" x-data="{editStartDate: false}">
                <x-input.label for="startDate" class="text-xs" label="{{  __('Start Date') }}" />
                <button class="group w-full flex items-center justify-between py-1 text-xl" x-on:click.prevent="editStartDate = ! editStartDate" x-show="! editStartDate">
                    {{ $prettyDate }} <span class="opacity-0 transition group-hover:opacity-100 text-gray-400 text-sm">({{ __('click to edit') }})</span>
                </button>
                <x-input 
                    id="startDate"
                    x-cloak
                    type="datetime-local"
                    wire:model="startDate"
                    x-show="editStartDate"
                    class="border-none bg-gray-100"
                />
                @error('startDate') <span class="error">{{ $message }}</span> @enderror
            </div> --}}
        </div>
    </x-card>
</form>            
</x-container>
</x-app-layout>
