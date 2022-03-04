<div class="mt-4">
    <x-input.label for="questions" class="text-xs" :label="__('Questions')" />
    @error('questions') <x-input.error>{{ $message }}</x-input.error> @enderror
   
    @if($questionSource)
        <ul wire:sortable="updateQuestionOrder" class="overflow-hidden ">
            @foreach ($questionSource as $question )
                <li 
                    wire:sortable.item="{{ $question['id'] }}"
                    wire:key="{{ $question['id'] }}"
                    class="p-2 border rounded mb-2 bg-gray-50"
                >
                    <div class="flex space-between">
                        <div class="w-full">
                            <x-icon.sort-handle 
                                wire:sortable.handle 
                                class="w-3 h-3 mr-2 cursor-move"
                            />
                            <span>{{ $question['id'] }}</span>
                        </div>
                        {{-- <button wire:click.prevent="removeQuestion" class="text-gray-400 hover:text-danger-500">
                            <x-icon.trash class="w-4 h-4" />
                        </button> --}}
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <div class="border border-gray-200 p-4 rounded">
            <span>{{ __('No questions yet...') }}</span>
        </div>
    @endif  

    <div x-data="{ expanded: false }" class="mt-4">
        <div x-data="{
            id: 1,
            get expanded() {
                return this.active === this.id
            },
            set expanded(value) {
                this.active = value ? this.id : null
            },
        }" role="region" class="">
                <x-button
                    x-on:click.prevent="expanded = !expanded"
                    x-bind:aria-expanded="expanded"
                    class="flex items-center justify-between mb-4"
                >
                    <span>Add a question</span>
                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                </x-button>
     
            <div x-show="expanded" x-collapse>
                <div class="p-4 border border-gray-200 rounded-md">
                    <x-button wire:click.prevent="addQuestion">Add Question</x-button>
                </div>
            </div>
        </div>
    </div>

    {{-- <x-button wire:click.prevent="addQuestion">Add Question</x-button> --}}

    <x-input
        id="questions"
        name="questions"
        type="hidden"
        wire:model="questions"
    />
</div>
