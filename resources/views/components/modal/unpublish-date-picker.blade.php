<div
    x-cloak
    x-show="showUnpublishDateModal"
    x-on:keydown.escape.prevent.stop="showUnpublishDateModal = false"
    role="dialog"
    aria-modal="true"
    x-id="['modal-title']"
    :aria-labelledby="$id('modal-title')"
    class="fixed inset-0 overflow-y-auto z-[60]"
>
    <x-modal.overlay x-show="showUnpublishDateModal" />

    <div
        x-show="showUnpublishDateModal" 
        x-transition
        x-on:click="showUnpublishDateModal = false"
        class="relative min-h-screen flex items-center justify-center p-4"
    >
        <div
            x-on:click.stop
            x-trap.noscroll.inert="showUnpublishDateModal"
            class="relative max-w-2xl w-full bg-white p-8 overflow-y-auto rounded-md shadow-lg"
        >
            <h2 class="text-3xl font-medium mb-4" :id="$id('modal-title')">{{ __('Schedule the survey to unpublish:')}}</h2>
            
            <hr class="my-8" />

            <livewire:surveys.unscheduling :surveyId="$surveyId"/>

        </div>
    </div>
</div>