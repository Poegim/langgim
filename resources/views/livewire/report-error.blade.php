
<div class="inline text-gray-700">

    <a
        class="cursor-pointer flex"
        wire:click="loadModal"
        wire:loading.attr="disabled"
        >
        Report an error
        <x-clarity-error-standard-solid class="w-5 h-5 text-red-700" />
    </a>

    <x-jet-dialog-modal wire:model="modalVisibility">
        <x-slot name="title" >
            {{ __("Delete User") }}
        </x-slot>

        <x-slot name="content">
            {{ __("CRITICAL WARNING! Are you sure want to delete? You cant undo this action!")}}
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-1">

                <x-jet-secondary-button
                wire:click="$toggle('modalVisibility')"
                wire:loading.attr="disabled"
                >
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="report" wire:loading.attr='disabled'>
                {{ __("Delete")}}
            </x-jet-danger-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
</div>
