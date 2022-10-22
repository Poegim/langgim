<div class="rounded-lg bg-white shadow-md mb-2">
    <div class="py-2 sm:py-4 rounded-md mx-auto text-center">

        <div class="sm:flex justify-center mt-1 block px-2">
            <div class="">
                <div class="flex overflow-hidden relative border rounded-lg p-2 hover:border-gray-400 justify-center" id="keyboard_icon">
                    <div class="flex justify-center">
                        <x-clarity-keyboard-line class="w-8 h-8 z-30" />
                    </div>
                    <span class="mt-2 ml-1 z-20 text-sm">
                        Virtual Keyboard
                    </span>
                    <div class="overflow-hidden relative">
                        <input class="absolute" autocomplete="off" type="text" id="super_hidden_secret_input"
                        style="width:0px; height:0px; opacity:none; " autofocus />
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-2 sm:mt-4">
            <span class=""> {{ __('Last key:')}} {{ $lastKey }} </span>
        </div>

        <div id="word_div" class="">
            <div class="mt-4">

                <h1 class="mt-2 text-xl font-extrabold tracking-wider lowercase">{{ $foreignWord->word }}</h1>

            </div>
            <div class="mt-4 flex justify-center">
                @foreach($guessedChars as $key => $char)
                <div class="grid grid-cols-1 lowercase">
                    <div class="w-4" id="field_{{$key}}">
                        <span class="text-xl font-extrabold tracking-wider"> {{$char}} </span>
                    </div>
                    <div class="w-4 h-4">
                        <div class="text-green-500 font-bold hidden" id="success_{{$key}}">
                            <x-clarity-success-line class="h-5 w-5" />
                        </div>
                        <div class="text-red-500 hidden" id="failure_{{$key}}">
                            <x-clarity-times-line class="h-5 w-5" />
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="flex justify-center mt-4">
                @auth
                <a class="cursor-pointer flex" wire:click="$toggle('modalReportErrorVisibility')"
                    wire:loading.attr="disabled">
                    <span class="mt-2 mr-1 text-xs">Report error</span>
                    <x-clarity-error-standard-solid class="w-6 h-6 text-red-700" />
                </a>
                @endauth

                @guest
                <a role="link" title="Please login to report error!" class="flex" disabled>
                    <span class="mt-2 mr-1 text-xs">Report error</span>
                    <x-clarity-error-standard-solid class="w-6 h-6 text-gray-500" />
                </a>
                @endguest
            </div>

        </div>
    </div>

    <!-- Virtual keyboard -->
    <div class="flex justify-center">
        <div class="shadow-md absolute w-11/12 sm:w-8/12 lg:w-1/2 -bottom-0">
            <div class="bg-white rounded-lg pt-2 pb-1 px-2 flex justify-between">
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">Q</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">W</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">E</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">R</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">T</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">Y</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">U</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">I</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">O</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">P</div>

            </div>
            <div class="bg-white rounded-lg py-1 px-8 flex">
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">A</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">S</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">D</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">F</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">G</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">H</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">J</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">K</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">L</div>
            </div>
            <div class="bg-white rounded-lg py-1 px-14 flex">
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">Z</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">X</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">C</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">V</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">B</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">N</div>
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">M</div>
            </div>
            <div class="bg-white rounded-lg pt-1 pb-2 px-14 flex">
                <div class="rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center">SPACE</div>
            </div>
        </div>
    </div>

    <!-- Modal Report Error -->
    <x-jet-dialog-modal wire:model="modalReportErrorVisibility" id="modalError">
        <x-slot name="title">
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
                Foreign word: <span class="text-wider font-extrabold">{{$foreignWord->word}}</span>
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
    </x-jet-dialog-modal>

    <!-- Prototype modal success-->
    <x-jet-dialog-modal wire:model="modalSuccessVisibility" id="modalSuccess">
        <x-slot name="title">
            {{ __("Success") }}
        </x-slot>

        <x-slot name="content">
            {{ $previousWord->pl_word }}
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-1">

                <x-jet-secondary-button wire:click="hideModals">
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
            {{ $previousWord->pl_word }}
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-1">

                <x-jet-secondary-button wire:click="hideModals">
                    {{ __("Next")}}
                </x-jet-secondary-button>

            </div>
        </x-slot>
    </x-jet-dialog-modal>


    <!-- Prototype modal lesson success-->
    <x-jet-dialog-modal wire:model="modalLessonSuccessVisibility" id="modalLessonSuccess">
        <x-slot name="title">
            {{ __("Success") }}
        </x-slot>

        <x-slot name="content">
            Lesson Success!
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-1">

                <a href="{{ route('category.index') }}">
                    <x-jet-secondary-button>
                        {{ __("Back to categories")}}
                    </x-jet-secondary-button>
                </a>


            </div>
        </x-slot>
    </x-jet-dialog-modal>


    <script type="text/javascript">
        let textInput;

        allowedKeys = ['A', 'Ą', 'B', 'C', 'Ć', 'D', 'E', 'Ę', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'Ł', 'M', 'N',
            'O','Ó', 'P', 'Q', 'R', 'S', 'Ś', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'Ż', 'Ź','1','2','3','4','5','6','7','8','9','0'
        ];

        document.addEventListener('keydown', function (event) {

            console.log(event.key);

            //Clear hidden text input
            textInput = document.getElementById('super_hidden_secret_input');
            textInput.value = '';

            //Modals
            modalFailure = document.getElementById('modalFailure');
            modalSuccess = document.getElementById('modalSuccess');
            modalLessonSuccess = document.getElementById('modalLessonSuccess');
            modalError = document.getElementById('modalError');

            //If modals are hidden then user can write.
            if (
                (modalFailure.style.display == 'none') &&
                (modalSuccess.style.display == 'none') &&
                (modalLessonSuccess.style.display == 'none') &&
                (modalError.style.display == 'none')
                )
            {

                    //If livewire variable of modals visibility is true this sets it to false
                    //wich is real state of modals.
                    if (@this.modalSuccessVisibility == true) {
                        @this.modalSuccessVisibility = false;
                    }

                    if (@this.modalFailureVisibility == true) {
                        @this.modalFailureVisibility = false;
                    }

                    if (@this.modalReportErrorVisibility == true) {
                        @this.modalReportErrorVisibility = false;
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
            let span;

            div = document.getElementById("success_" + (data.detail.charNumber - 1));
            div.classList.remove("hidden");
            setTimeout(function () {
                div.classList.add("hidden");
            }, 500);

            span = document.getElementById("correctKey");
            span.classList.remove("hidden");
            setTimeout(function () {
                span.classList.add("hidden");
            }, 500);
        });

        //If invalid key is hited this event is loaded
        document.addEventListener('invalidKey', function (data) {
            let div;
            let span;

            div = document.getElementById("failure_" + (data.detail.charNumber - 1));
            div.classList.remove("hidden");
            setTimeout(function () {
                div.classList.add("hidden");
            }, 500);

            span = document.getElementById("wrongKey");
            span.classList.remove("hidden");
            setTimeout(function () {
                span.classList.add("hidden");
            }, 500);

        });

        //Show virtual keyboard on mobile devices
        keyboardButton = document.getElementById('keyboard_icon');
        if (keyboardButton) {
            keyboardButton.addEventListener("click", showKeyboard);
        }

        function showKeyboard() {
            let target = document.getElementById("super_hidden_secret_input");
            target.focus();
            target.click();
        }

    </script>

</div>
