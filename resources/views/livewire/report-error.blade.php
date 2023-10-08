<div>
    @auth
    <a class="cursor-pointer flex" wire:click="$toggle('modalReportErrorVisibility')"
        wire:loading.attr="disabled">
        <span class="mt-2 mr-1 text-xs hidden sm:inline">Report error</span>
        <x-clarity-error-standard-solid class="w-6 h-6 text-red-700" />
    </a>
    @endauth

    @guest
    <a role="link" title="Please login to report error!" class="flex" disabled>
        <span class="mt-2 mr-1 text-xs hidden sm:inline">Report error</span>
        <x-clarity-error-standard-solid class="w-6 h-6 text-gray-500" />
    </a>
    @endguest

    <x-old-dialog-modal wire:model="modalReportErrorVisibility" id="modalError">
        <x-slot name="title">
            {{ __("Report Error") }}
        </x-slot>

        <x-slot name="content">
            <div>
                Did u found any mistake?
            </div>

            <div class="mt-4 mb-4">

                <label for="title">Title:</label>
                <x-jet-input type="text" class="w-full" name="title" id="title" wire:model='title'>
                </x-jet-input>
                <x-jet-input-error for="title" />


                <label for="message" class="mt-2">Message:</label>
                <x-jet-input type="text" class="w-full" name="message" id="message" wire:model='message'>
                </x-jet-input>
                <x-jet-input-error for="message" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-1">

                <x-jet-secondary-button wire:click="$toggle('modalReportErrorVisibility')" wire:loading.attr="disabled">
                    {{ __("Cancel")}}
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="reportError" wire:loading.attr='disabled'>
                    {{ __("Report Error")}}
                </x-jet-danger-button>
            </div>
        </x-slot>
    </x-old-dialog-modal>
</div>
