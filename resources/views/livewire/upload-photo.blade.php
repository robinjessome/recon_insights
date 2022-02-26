<div>
    <x-input.label for="featuredImage" class="text-xs" :label="__('Featured Image')" />
@if ($featuredImage)
    <img src="{{ $featuredImage->temporaryUrl() }}">
@endif

    <input type="file" name="featuredImage" id="featuredImage" wire:model="featuredImage">
    @error('featuredImage') <span class="error">{{ $message }}</span> @enderror

</div>