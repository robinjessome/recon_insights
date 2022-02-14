<x-app-layout>
    <x-slot name="header">
        <x-header>
                <div class="flex items-center space-x-2 ">
                    <x-badge :status="$survey->status" />
                    <x-headline level="h1">{{ __('Editing:') }} <strong>{{  $survey->title }}</strong></x-headline>
                </div>
                
                <div class="flex items-center space-x-4">
                    <livewire:surveys.publishing :surveyId="$survey->slug" :surveyStatus="$survey->status" />
                    <x-button 
                        type="submit" 
                        {{-- size="md"  --}}
                        class="" 
                        style="primary" 
                        form="survey-edit"
                    >
                        {{ __('Save edits') }}
                    </x-button>
                </div>
        </x-header>
    </x-slot>

    <x-container class="pt-4 pb-12">
        <div class="flex justify-between items-center py-4">
            <div class="text-sm">
                <a href="{{  route('surveys') }}" class="text-gray-500 hover:text-gray-600"><x-icon.arrow-sm-left iconClass="w-5 h-5"/>{{ __('Back to surveys') }}</a>
            </div>
            {{-- <div class="">
                <x-button type="submit" size="md" style="primary" x-bind:disabled="!changed" >{{ __('Save edits') }}</x-button>
            </div> --}}
        </div>

        <x-card>
            <form 
                id="survey-edit"
                method="POST" 
                action="{{ route('update-survey') }}"
                x-data="{ changed: false }"
                x-on:change.delay="changed = true"
            >
            @csrf
            
            <livewire:surveys.slug :slug="$survey->slug" />
            {{-- <div 
            class="mb-4 @error('slug') text-danger-800 @enderror" 
            :class="{ 'text-success-500': slugChanged, 'text-gray-400': !slugChanged }"
            >
                <x-input.label for="slug" class="text-xs" label="{{  __('URL') }}" />
                <x-input 
                    id="slug" 
                    type="text"
                    stealth 
                    x-on:change="slugChanged = true"
                    class="w-auto font-mono border-none focus:text-gray-900"
                    :value="$survey->slug"
                />
                @error('slug') <x-input.error>{{ $message }}</x-input.error> @enderror
            </div> --}}
            
            <div class="mb-4">
                <x-input.label for="title" class="text-xs" label="{{  __('Title') }}" />
                <x-input 
                    id="title"
                    name="title" 
                    type="text"
                    stealth
                    class="text-4xl font-bold"
                    :value="$survey->title"
                /> 
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>

            </form>
        </x-card>

    </x-container>
    

</x-app-layout>
   
   <?php /*
    
    <x-app-layout>
        <x-slot name="header">
            <div class="flex items-center space-x-2">
                <x-badge :status="$survey->status" />
                <x-headline level="h1">{{ __('Editing:') }} <strong>{{  $survey->title }}</strong></x-headline>
            </div>
           
            {{-- <livewire:surveys.publish :surveyId="$surveyId" :surveyStatus="$survey->status"> --}}
    
        </x-slot>
    
            <x-container class="py-12">



                
                {{-- <x-card class="grid grid-cols-12 gap-x-6">
                    <div class="col-span-8 h-[1200px]">
F
                    </div>
                    <div class="col-span-4 rounded-md border border-gray-200 p-4 sticky top-0 h-32 ">
                        <div class="text-right">
                            <x-button type="submit" size="md" style="primary" x-bind:disabled="!changed" >{{ __('Save edits') }}</x-button>
                        </div>
                    </div>
                </x-card> --}}

                {{-- <div class="h-[1400px] bg-white">
                    <div class="sticky top-0">
                        Hello
                    </div>
                    Hi.
                </div> --}}
                <div class="flex justify-between items-center py-4">
                    <div class="text-sm">
                        <a href="{{  route('surveys') }}" class="text-gray-500 hover:text-gray-600"><x-icon.arrow-sm-left iconClass="w-5 h-5"/>{{ __('Back to surveys') }}</a>
                    </div>
                    {{-- <div class="">
                        <x-button type="submit" size="md" style="primary" x-bind:disabled="!changed" >{{ __('Save edits') }}</x-button>
                    </div> --}}
                </div>
                
                <livewire:surveys.edit :survey="$survey" />


                {{-- <form 
                    method="POST" 
                    action="{{ route('update-survey') }}"
                    x-data="{ changed: false }"
                    x-on:change.delay="changed = true"
                >
                    <div class="flex justify-between items-center mb-4">
                        <div class="text-sm">
                            <a href="{{  route('surveys') }}" class="text-gray-500 hover:text-gray-600"><x-icon.arrow-sm-left iconClass="w-5 h-5"/>{{ __('Back to surveys') }}</a>
                        </div>
                        <div class="">
                            <x-button type="submit" style="primary" x-bind:disabled="!changed" >{{ __('Save edits') }}</x-button>
                        </div>
                    </div>
                    <x-card>
                        @csrf
                        <div class="mb-4">
                            <x-input.label for="slug" class="text-xs" label="{{  __('URL') }}" />
                            <x-input.stealth type="text" id="slug" class="w-auto text-gray-400 font-mono border-none focus:text-gray-900" value="{{ $survey->slug }}" />
                            @error('slug') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <x-input.label for="title" class="text-xs" label="{{  __('Title') }}" />
                            <x-input.stealth type="text" id="title" class="text-4xl font-bold" value="{{ $survey->title }}" />
                            @error('title') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </x-card>
                </form> --}}


                
            </x-container>
    </x-app-layout>
    
    */ ?>
