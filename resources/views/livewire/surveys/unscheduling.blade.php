<div class="flatpickr grid grid-cols-12 gap-x-4 unscheduling_modal"
    x-data="{
        chosenDate: @entangle('wireEndDate'), 
        scheduleButton: 'Choose a date',
        intro: 'Select a date &amp; time to schedule unpublishing:',

    }"


>
   <div class="col-span-6"
   wire:ignore
   
   >
    <x-input.datepicker
    id="chosenDate" 
    name="chosenDate"
    class="hidden text-sm w-auto border-none p-0 py-2 shadow-none mb-4"
    x-model="chosenDate"
    x-on:input="scheduleButton = 'Schedule unpublishing!', intro = 'Survey will unpublish'"
    :placeholder="__('Select a date/time')"
/>
   </div>
   <div class="col-span-6 pl-8 flex flex-col justify-between">
        <p x-text="intro" class="text-center"></p>
        {{-- <p x-text="chosenDate"></p>
        <p>{{ $formattedDateTime }}</p> --}}
        <template x-if="chosenDate">
            <div class="flex flex-col gap-y-2 text-center bg-gray-50 border border-gray-100 p-4 rounded-sm">

                {{-- <span class="block italic my-2 text-gray-400">on</span> --}}
                <span class="block text-3xl">
                   {{ $formattedDate }}
                </span>
                <span class="block text-2xl">
                    {{ $formattedTime }}
                </span>
            </div>
        </template>

        <div>
             <p><x-button 
                appearance="solid"
                size="md"
                color="warning" class="w-full"
                x-bind:disabled="!chosenDate"
                x-text="scheduleButton"
                wire:click="schedule"
            ></x-button></p>
            <p><x-button
                data-clear
                appearance="outline"
                color="subtle"
                class="w-full"
                x-on:click="chosenDate = null; scheduleButton = 'Choose a date'">Cancel</x-button></p>
        </div>

    </div>
</div>
