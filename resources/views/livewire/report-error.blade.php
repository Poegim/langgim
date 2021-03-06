
<div class="inline text-gray-700">

    <a
        class="cursor-pointer flex"
        wire:click="showModal"
        wire:loading.attr="disabled"
        >
        <x-clarity-error-standard-solid class="w-8 h-8 text-red-700" />
    </a>

    <x-jet-dialog-modal wire:model="modalVisibility">
        <x-slot name="title" >
            {{ __("Report Error") }}
        </x-slot>

        <x-slot name="content">
            <div>
                Is there any mistake?
            </div>
            <div class="mt-4">
                PL word: <span class="text-wider font-extrabold">{{$word->pl_word}}</span>
            </div>
            <div>
                Foreign word: <span class="text-wider font-extrabold">{{$word->uaWord->word}}</span>
            </div>

            <div class="mt-4 mb-4">
                <label for="message">Message:</label>
                <x-jet-input type="text" class="w-full" name="message" id="message"></x-jet-input>
                <x-jet-input-error for="message"/>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-1">

                <x-jet-secondary-button
                wire:click="$toggle('modalVisibility')"
                wire:loading.attr="disabled"
                >
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="reportError" wire:loading.attr='disabled'>
                {{ __("Report Error")}}
            </x-jet-danger-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
</div>
