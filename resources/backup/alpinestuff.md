Dropdown example.
------------------------------------------------------------
<div
    x-data="{
        open: false,
        toggle() {
            if (this.open) {
                return this.close()
            }

            this.open = true
        },
        close(focusAfter) {
            this.open = false

            focusAfter && focusAfter.focus()
        }
    }"
    x-on:keydown.escape.prevent.stop="close($refs.button)"
    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
    x-id="['dropdown-button']"
    class="relative"
>
    <!-- Button -->
    <button
        x-ref="button"
        x-on:click="toggle()"
        :aria-expanded="open"
        :aria-controls="$id('dropdown-button')"
        type="button"
        class="border border-black px-4 py-2"
    >
        <span>Actions</span>
        <span aria-hidden="true">&darr;</span>
    </button>

    <!-- Panel -->
    <div
        x-ref="panel"
        x-show="open"
        x-transition.origin.top.left
        x-on:click.outside="close($refs.button)"
        :id="$id('dropdown-button')"
        style="display: none;"
        class="absolute left-0 mt-2 bg-white border border-black"
    >
        <div>
            <a href="#" class="block w-full px-4 py-2 text-left text-sm hover:bg-gray-100 disabled:text-gray-500" >
                Add task above
            </a>

            <a href="#" class="block w-full px-4 py-2 text-left text-sm hover:bg-gray-100 disabled:text-gray-500" >
                Add task below
            </a>
        </div>

        <div class="border-t border-black">
            <a href="#" class="block w-full px-4 py-2 text-left text-sm hover:bg-gray-100 disabled:text-gray-500" >
                Edit task
            </a>

            <a href="#" disabled class="block w-full px-4 py-2 text-left text-sm hover:bg-gray-100 disabled:text-gray-500">
                Delete task
            </a>
        </div>
    </div>
</div>
------------------------------------------------------------