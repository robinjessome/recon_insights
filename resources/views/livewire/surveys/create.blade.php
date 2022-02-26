<div>

    <form wire:submit.prevent="create" class="mt-4">

    <input type="hidden" wire:model="surveyId" disabled />
        
    <div class="mb-3">
        <x-input.label for="title" :label="__('Title')" />
        <x-input type="text" id="title" wire:model="title" wire:change="setSlugByTitle" />
        @error('title') <x-input.error>{{ $message }}</x-input.error> @enderror
    </div>
    <div class="mb-3">
        <x-input.label for="slug" :label="__('URL slug')" />
        <x-input type="text" id="slug" class="font-mono" wire:model="slug" wire:change="makeSlug" placeholder="" />
        @error('slug') <x-input.error>{{ $message }}</x-input.error> @enderror
    </div>

{{-- 
    <label class="block">
        <span class="text-gray-700">Title</span>
        <x-input type="text" wire:model="title" wire:change="setSlugByTitle" placeholder="" />
         @error('title') <span class="error">{{ $message }}</span> @enderror
    </label>

    <label class="block">
        <span class="text-gray-700">Slug</span>
        <x-input type="text" class="font-mono" wire:model="slug" wire:change="makeSlug" placeholder="" />
         @error('slug') <span class="error">{{ $message }}</span> @enderror
    </label> 
--}}

    <div class="mt-8">
        <x-button type="submit" color="primary">{{ __('Create survey') }}</x-button>
        <x-button 
            type="button" 
            appearance="outline"
            color="subtle" 
            class="ml-2" 
            @click="showCreateSurvey = false"
            wire:click="resetForm"
        >Cancel</x-button>
    </div>

</form>

</div>
