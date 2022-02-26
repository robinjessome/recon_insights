<div
    x-cloak
    x-show="showPublishDateModal"
    x-on:keydown.escape.prevent.stop="showPublishDateModal = false"
    role="dialog"
    aria-modal="true"
    x-id="['modal-title']"
    :aria-labelledby="$id('modal-title')"
    class="fixed inset-0 overflow-y-auto z-[60]"
>
    <x-modal.overlay x-show="showPublishDateModal" />

    <div
        x-show="showPublishDateModal" 
        x-transition
        x-on:click="showPublishDateModal = false"
        class="relative min-h-screen flex items-center justify-center p-4"
    >
        <div
            x-on:click.stop
            x-trap.noscroll.inert="showPublishDateModal"
            class="relative max-w-2xl w-full bg-white p-8 overflow-y-auto rounded-md shadow-lg"
        >
            <h2 class="text-3xl font-medium mb-4" :id="$id('modal-title')">{{ __('Schedule the survey to publish:')}}</h2>
            
            <hr class="my-8" />

            <livewire:surveys.scheduling :surveyId="$surveyId"/>

            {{-- <div class="grid grid-cols-2 gap-8">

                <div>
                    <div class="mt-4">
                        <x-input.datepicker
                            id="startDate" 
                            name="startDate"
                            class="hidden text-sm w-auto border-none p-0 py-2 text-lg shadow-none mb-4"
                            x-init="flatpickr($refs.input, {dateFormat:'Y-m-d H:i', altFormat:'F j, Y h:iK', altInput:true, enableTime: true, minDate: 'today', inline: true } );"
                            x-ref="input"
                            x-model="startDate"
                            :placeholder="__('Select a date/time')"
                        />
                    </div>
                </div>

                <div class="pl-8"> 
                    <p></p>
                    <p>Buttons to Schedule <span x-text="startDate"></span>, or publish!</p>
                    <p>Make the datepicker a livewire form?</p>
                </div>
            </div> --}}
        
        </div>
    </div>
</div>