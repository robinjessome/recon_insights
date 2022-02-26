
<div>
<div class="flex-col space-y-4">
    <div class="flex items-center space-x-4"> 
        <div class="w-1/4"> 
            <x-input type="text" wire:model.debounce.300ms="search" placeholder="{{ __('Search surveys...') }}" />
        </div>
        <div>
            <label class="font-light">
                <x-input.checkbox wire:model="showArchived" class="rounded-full" />
                <span class="ml-1 text-sm">{{  __('Show archived') }}</span>
            </label>
        </div>
    </div>
    <x-table>
        <x-slot name="tableHead">
            <x-table.row class="bg-gray-200">
                <x-table.heading sortable 
                    wire:click="sortBy('status')" 
                    :direction="$sortField === 'status' ? $sortDirection : null"
                    class="pr-0">
                    <x-icon.status-dot />
                </x-table.heading>

                <x-table.heading sortable 
                    wire:click="sortBy('title')" 
                    :direction="$sortField === 'title' ? $sortDirection : null"
                    class="w-1/3"
                    >
                    {{ __('Title') }}
                </x-table.heading>

                <x-table.heading sortable 
                    wire:click="sortBy('slug')"
                    :direction="$sortField === 'slug' ? $sortDirection : null"
                    >
                    {{ __('URL Slug') }}
                </x-table.heading>

                <x-table.heading sortable 
                    wire:click="sortBy('publishDate')"
                    :direction="$sortField === 'publishDate' ? $sortDirection : null"
                    >
                    {{ __('Start Date') }}
                </x-table.heading>
                <x-table.heading sortable 
                    wire:click="sortBy('expireDate')"
                    :direction="$sortField === 'expireDate' ? $sortDirection : null"
                    >
                    {{ __('End Date') }}
                </x-table.heading>
                <x-table.heading>
                    <x-icon.edit class="w-4 h-4" />
                </x-table.heading>
            </x-table.row>
        </x-slot>
        <x-slot name="tableBody">
        @forelse ($surveys as $survey )
            @php
                $isArchived = false;
                if($survey->status == 'archived') {
                    $isArchived = true;
                }
            @endphp
            {{-- wire:loading.class.delay="opacity-30" --}}
            <x-table.row 
                wire:loading.class.delay.long="opacity-30"
                wire:key="{{ $loop->index }}"
            >
                <x-table.cell 
                    x-data="{ tooltip: false }"
                    x-on:mouseover="tooltip = true" 
                    x-on:mouseleave="tooltip = false"
                    class="relative w-8"
                >
                    <x-icon.status-dot :status="$survey->status" />
                    <span 
                        x-cloak 
                        x-show.transition="tooltip"
                        x-transition
                        class="absolute whitespace-nowrap left-12 text-sm shadow-lg bg-white border rounded-sm px-3 py-1 z-30"
                    >
                        {{ str()->title( __($survey->status)) }}
                    </span>
                </x-table.cell>

                <x-table.cell :status="$survey->status" class="font-semibold truncate">
                    <a href="{{ route('survey-insights', ['surveyId' => $survey->slug]) }}" class=" hover:text-sky-600 focus:text-sky-600">
                        {{ $survey->title }}
                    </a>
                </x-table.cell>

                <x-table.cell :status="$survey->status">
                    <span class="font-mono">{{ $survey->slug }}</span>
                </x-table.cell>

                <x-table.cell :status="$survey->status" class="font-light text-sm">
                    @if($survey->publishDate)
                        {{ $survey->publishDate_for_humans }}
                    @endif
                </x-table.cell>

                <x-table.cell :status="$survey->status" class="font-light text-sm">
                    @if($survey->expireDate)
                        {{ $survey->expireDate_for_humans }}
                    @endif
                </x-table.cell>

                <x-table.cell>
                    <a href="{{ route('edit-survey', ['surveyId' => $survey->slug]) }}" class="text-gray-400 hover:text-sky-600 focus:text-sky-600">
                        <x-icon.edit class="w-4 h-4" />
                    </a>
                </x-table.cell>

            </x-table.row>

        @empty

            <x-table.row>
                <x-table.cell colspan="6"> 
                    <div class="flex justify-center items-center">
                        <div class="px-8 py-16 text-center">
                            <x-icon.exclamation-circle class="inline-block mb-2 text-gray-300 w-16" iconClass='' />
                            <span class="block text-gray-500 text-lg italic mb-6">{{ __('No surveys found!') }}</span>
                            <x-button style="outline" x-on:click="showCreateSurvey = true">{{ __('Create a new survey!') }}</x-button>
                        </div>
                    </div>
                    {{-- <p><x-button style="primary" x-on:click="showCreateSurvey = true">{{ __('Create your first survey!') }}</x-button></p> --}}
                </x-table.cell>
            </x-table.row>

        @endforelse

        </x-slot>
    </x-table>
    
    <div class="pagination">
        {{  $surveys->links() }}
    </div>

</div>
</div>
