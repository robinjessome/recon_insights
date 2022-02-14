<div x-data="{ slugChanged: @entangle('wireSlugChanged') }">
    <div 
        class="mb-4 @error('slug') text-danger-800 @enderror" 
        :class="{ 'text-success-500  @error('slug') text-danger-800 @enderror': slugChanged, 'text-gray-400  @error('slug') text-danger-800 @enderror': !slugChanged }"
    >

        <x-input.label for="slug" class="text-xs" label="{{  __('URL') }}" />

        <x-input 
            id="slug"
            name="slug"
            type="text"
            stealth  
            wire:model="slug"
            wire:change="validateSlug"
        />
        @error('slug') <x-input.error>{{ $message }}</x-input.error> @enderror
    </div>
</div>