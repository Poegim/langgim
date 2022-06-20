<div class="p-6 rounded-md w-8/12 mx-auto mt-12 text-center">
    <div>
        <div id="word_div" class="">
            <div class="h-10">
                <h1 class="mt-5 text-lg tracking-wider">{{ $word->uaWord->word }}</h1>
                <p>
                    <input type="text" id="super_hidden_secret_input"/>
                </p>
            </div>
            <div class="mt-5 flex justify-center">
                @foreach($guessedChars as $key => $char)
                <div class="grid grid-cols-1">
                    <div class="w-4" id="field_{{$key}}">
                        <span class="text-xl"> {{$char}} </span>
                    </div>
                    <div class="w-4 h-4">
                        <div class="text-green-500 hidden" id="success_{{$key}}">
                            <x-clarity-success-line class="h-4 w-4" />
                        </div>
                        <div class="text-red-500 hidden" id="failure_{{$key}}">
                            <x-clarity-times-line class="h-4 w-4" />
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <h1 class="pt-5 h-16"> {{ $lastKey }} </h1>

            <div class="h-10">
                <p>Actual char: {{ $charNumber+1 }}</p>
                <p>Word legth: {{ $wordLength }} </p>
            </div>
        </div>


        <!-- Prototype modal success-->
        <x-jet-dialog-modal wire:model="modalSuccessVisibility" id="modalSuccess">
            <x-slot name="title">
                {{ __("Success") }}
            </x-slot>

            <x-slot name="content">
                {{ $word->pl_word }}
            </x-slot>

            <x-slot name="footer">
                <div class="space-x-1">

                    <x-jet-secondary-button wire:click="loadWord" {{-- onclick="hideSuccess()" --}}>
                        {{ __("Next")}}
                    </x-jet-secondary-button>

                </div>
            </x-slot>
        </x-jet-dialog-modal>

        <!-- Prototype modal failure-->
        <x-jet-dialog-modal wire:model="modalFailureVisibility" id="modalFailure">
            <x-slot name="title">
                {{ __("Failure") }}
            </x-slot>

            <x-slot name="content">
                {{ $word->pl_word }}
            </x-slot>

            <x-slot name="footer">
                <div class="space-x-1">

                    <x-jet-secondary-button wire:click="loadWord">
                        {{ __("Next")}}
                    </x-jet-secondary-button>

                </div>
            </x-slot>
        </x-jet-dialog-modal>

    </div>

    <script type="text/javascript">


allowedKeys = ['A', 'Ą', 'B', 'C', 'Ć', 'D', 'E', 'Ę', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'Ł', 'M', 'N', 'O',
            'Ó',
            'P', 'Q', 'R', 'S', 'Ś', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'Ż', 'Ź'
        ];

        document.addEventListener('keydown', function (event) {

            //Modals
            $modalFailure = document.getElementById('modalFailure');
            $modalSuccess = document.getElementById('modalSuccess');

            //If modals are hidden then user can write.
            if ((modalFailure.style.display == 'none') && (modalSuccess.style.display == 'none')) {
                //If livewire variable of modals visibility is true set is to false wich is real state of modals.
                if (@this.modalSuccessVisibility == true) {
                    @this.modalSuccessVisibility = false;
                }

                if (@this.modalFailureVisibility == true) {
                    @this.modalFailureVisibility = false;
                }

                //Check is hited key allowed, if yes run livewire controller method.
                for (const element of allowedKeys) {
                    if (element.toLowerCase() == event.key.toLowerCase()) {
                        @this.keyPressed(event.key.toLowerCase());
                    }
                }
            } else {
                //If any modal is visible and hited key is Enter, hide modal.
                if (event.key == 'Enter') {
                    @this.modalSuccessVisibility = false;
                    @this.modalFailureVisibility = false;
                }
            }

        });

        //If valid key is hited this event is loaded
        document.addEventListener('validKey', function (data) {
            let div;
            div = document.getElementById("success_" + (data.detail.charNumber - 1));
            div.classList.remove("hidden");
            setTimeout(function () {
                div.classList.add("hidden");
            }, 500);
        });

        //If invalid key is hited this event is loaded
        document.addEventListener('invalidKey', function (data) {
            let div;
            div = document.getElementById("failure_" + (data.detail.charNumber - 1));
            div.classList.remove("hidden");
            setTimeout(function () {
                div.classList.add("hidden");
            }, 500);
        });

        var target = document.getElementById("super_hidden_secret_input");
        console.log(target);
        target.focus();
        // target.click();
        </script>
