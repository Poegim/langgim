<div class="w-10">
    <div
        x-data="{ tooltip: false }"
        x-on:mouseover="tooltip = true"
        x-on:mouseleave="tooltip = false"
        x-cloak
        class="cursor-pointer flex justify-center">
        <button class="h-full hover:text-pink-600 hover:-rotate-90 text-green-400 transition-all duration-300">
            <x-tni-history-o class="w-5 h-" wire:click="showModal"/>
        </button>

        <div
        x-cloak
        x-show="tooltip"
        class="text-sm text-gray-200 absolute bg-blue-400 rounded-lg p-2
        transform translate-y-2 mt-8">
            Reset progress
         </div>

    </div>


    <!-- Delete Modal -->
    <x-old-dialog-modal wire:model="modalVisibility">
        <x-slot name="title">
            {{ __("Reset Progress")}}
        </x-slot>

        <x-slot name="content">
            {{ __("WARNING! Are you sure want to reset your progress?")}}
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-1">

                <x-jet-secondary-button wire:click="$toggle('modalVisibility')" wire:loading.attr="disabled">
                    {{ __("Cancel")}}
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="resetProgress" wire:loading.attr='disabled'>
                    {{ __("Reset Progress")}}
                </x-jet-danger-button>
            </div>
        </x-slot>
    </x-old-dialog-modal>


</div>
