<div>

    <form wire:submit.prevent="create" class="mt-4">

    <input type="hidden" wire:model="surveyId" disabled />

    <label class="block">
        <span class="text-gray-700">Title</span>
        <input type="text" class="mt-1 block w-full" wire:model="title" wire:change="setSlugByTitle" placeholder="">
         @error('title') <span class="error">{{ $message }}</span> @enderror
    </label>

    <label class="block">
        <span class="text-gray-700">Slug</span>
        <input type="text" class="mt-1 block w-full" wire:model="slug" wire:change="makeSlug" placeholder="">
         @error('slug') <span class="error">{{ $message }}</span> @enderror
    </label>

    <div class="mt-4">
        <x-button type="submit">{{ __('Create survey') }}</x-button>
        <x-button 
            type="button" 
            style="outline-subtle" 
            class="ml-2" 
            @click="showCreateSurvey = false"
            wire:click="resetForm"
        >Cancel</x-button>
    </div>

</form>

</div>
