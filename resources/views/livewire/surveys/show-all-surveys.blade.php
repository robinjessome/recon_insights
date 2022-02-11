
<div>
@if (!$surveys->isEmpty())
<div class="flex justify-center">
    {{-- <div class="w-full px-6 mb-2">
        <label class="inline-flex items-center">
          <input type="checkbox" wire:model="showArchived" wire:change="showAll" checked="" class="rounded-full">
          <span class="ml-2 text-sm">{{  __('Include archived') }}</span>
        </label>
    </div> --}}
  </div>
    <x-table class="mb-2">
        <x-slot name="tableHead">
            <x-table.heading><x-icon.status-dot status="archived" /></x-table.heading>
            <x-table.heading>{{ __('Survey Name') }}</x-table.heading>
            <x-table.heading>{{ __('Slug') }}</x-table.heading>
            <x-table.heading>{{ __('Publish Date') }}</x-table.heading>
        </x-slot>
        <x-slot name="tableBody">
            @foreach ($surveys as $survey )
            @php
                $isArchived = false;
                if($survey->status == 'archived') {
                    $isArchived = true;
                }
            @endphp
            <x-table.row>
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
                        class="absolute whitespace-nowrap left-12 -toxp-2 text-sm shadow-lg bg-white border rounded-sm px-3 py-1 z-30"
                    >
                        {{ str()->title( __($survey->status)) }}
                    </span>
                </x-table.cell>

                <x-table.cell :status="$survey->status" class="font-bold">
                    <a href="{{ route('edit-survey', ['surveyId' => $survey->slug]) }}" class="hover:text-sky-600">{{ $survey->title }}</a>
                </x-table.cell>

                <x-table.cell :status="$survey->status">
                    <span class="font-mono">{{ $survey->slug }}</span>
                </x-table.cell>

                <x-table.cell :status="$survey->status">
                    @if($survey->publishDate)
                        {{ $survey->publishDate_for_humans }}
                    @endif
                </x-table.cell>

            </x-table.row>
        @endforeach
        </x-slot>
    </x-table>
    
    <div class="pagination">
        {{  $surveys->links() }}
    </div>

@else
    <div class="w-full text-center mt-12">
        <p class="text-gray-400 text-lg italic">{{ __('No surveys found!') }}</p>
        <p><x-button style="primary" x-on:click="showCreateSurvey = true">{{ __('Create your first survey!') }}</x-button></p>
    </div>
@endif

{{-- 
    <ul>
        @foreach ($surveys as $survey )
            <li>
                <a href="{{ route('edit-survey', ['surveyId' => $survey->slug]) }}"><strong>{{ $survey['title'] }}</strong>&nbsp;&nbsp;<span class="font-mono text-gray-400">{{ $survey->slug }}</span></a>
            </li>
        @endforeach
    </ul>
    @else 
    @endif --}}
</div>
