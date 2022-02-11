<div
    x-cloak
    x-show="showCreateSurvey"
    x-on:keydown.escape.prevent.stop="showCreateSurvey = false"
    role="dialog"
    aria-modal="true"
    x-id="['modal-title']"
    :aria-labelledby="$id('modal-title')"
    class="fixed inset-0 overflow-y-auto"
>
    <x-modal.overlay x-show="showCreateSurvey" />

    <div
        x-show="showCreateSurvey" 
        x-transition
        x-on:click="showCreateSurvey = false"
        class="relative min-h-screen flex items-center justify-center p-4"
    >
        <div
            x-on:click.stop
            x-trap.noscroll.inert="showCreateSurvey"
            class="relative max-w-2xl w-full bg-white p-8 overflow-y-auto rounded-md shadow-lg"
        >
            <h2 class="text-3xl font-medium" :id="$id('modal-title')">{{ __('Create a new survey!')}}</h2>
            
            <livewire:surveys.create />
        
        </div>
    </div>
</div>