<div>
    <x-input.label for="featuredImage" class="text-xs mb-2" :label="__('Featured Image')" />
@if ($featuredImage)
    <div class="relative rounded overflow-hidden">
        <img src="{{ $featuredImage->temporaryUrl() }}" />
        <button 
            wire:click.prevent="removeImage"
            class="absolute text-xs top-0 flex flex-col items-center justify-center w-full h-full bg-black bg-opacity-80 text-white opacity-0 hover:opacity-100 focus:opacity-100 transition" 
        >
            <x-icon.minus-circle class="h-12 w-12 mb-2" />
            {{ __('REMOVE') }}
        </button>
    </div>
@elseif ($currentImage && $currentImage !== 'remove') 
    <div class="relative rounded overflow-hidden">
        <img src="{{ $currentImage }}" />
        <button 
            wire:click.prevent="removeImage" 
            x-on:click.delay="$dispatch('setchanged', true)"
            class="absolute text-xs top-0 flex flex-col items-center justify-center w-full h-full bg-black bg-opacity-80 text-white opacity-0 hover:opacity-100 focus:opacity-100 transition" 
        >   
            <x-icon.minus-circle class="h-12 w-12 mb-2" />
            {{ __('REMOVE') }}
        </button>
    </div>
@endif
    <div class="flex">
        <input type="hidden" name="currentImagePath" id="currentImagePath" value="{{ $currentImagePath }}" />
        <input 
            type="file"
            name="featuredImage"
            id="featuredImage_{{ $iteration }}"
            wire:model="featuredImage"
            class="text-sm"
        >
        @error('featuredImage') <x-input.error>{{ $message }}</x-input.error> @enderror
    </div>
</div>