<div>
    @if ($word != null)
    <div class="flex justify-end">
        <livewire:report-error :word="$word" :language="$language" />
    </div>

    <div class="p-6 rounded-md w-8/12 mx-auto mt-12 text-center">

        <div class="flex justify-center mt-2">

            <div class="flex overflow-hidden relative" id="keyboard_icon">

                <x-clarity-keyboard-line class="w-10 h-10 z-30" />
                <span class="mt-2 ml-1 z-20">
                    Show Mobile Keyboard
                </span>
                <div class="overflow-hidden relative">
                    <input class="absolute" autocomplete="off" type="text" id="super_hidden_secret_input"
                        style="width:0px; height:0px; opacity:none; " autofocus />
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            <span class="h-16 text-3xl font-extrabold"> {{ $lastKey }} </span>
            <span id="correctKey" class="hidden">
                <x-clarity-success-line class="h-8 w-8 text-green-500" />
            </span>
            <span id="wrongKey" class="hidden">
                <x-clarity-times-line class="h-8 w-8 text-red-500" />
            </span>
        </div>

        <div id="word_div" class="">
            <div class="h-10">

                <h1 class="mt-5 text-3xl font-extrabold tracking-wider">{{ $word->uaWord->word }}</h1>

            </div>
            <div class="mt-5 flex justify-center">
                @foreach($guessedChars as $key => $char)
                <div class="grid grid-cols-1">
                    <div class="w-4" id="field_{{$key}}">
                        <span class="text-3xl font-extrabold tracking-wider"> {{$char}} </span>
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

            {{-- <div class="h-10">
                <p>Actual char: {{ $charNumber+1 }}</p>
            <p>Word legth: {{ $wordLength }} </p>
        </div> --}}
    </div>

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

                <x-jet-secondary-button wire:click="hideModals" {{-- onclick="hideSuccess()" --}}>
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

    @else
    <div class="flex justify-center">
        <x-jet-button wire:click="$toggle('modalLanguagePickVisibility')">Select Language</x-jet-button>
    </div>

    @endif

    <!-- Modal pick language-->
    <x-jet-dialog-modal wire:model="modalLanguagePickVisibility" id="modalPickLanguage">
        <x-slot name="title">
            {{ __("Choose your language") }}
        </x-slot>

        <x-slot name="content">
            <div class="flex justify-center mt-6">
                <div class="flex justify-center p-4">
                    <a href="">
                        <img src="{{asset('storage/images/flags/ua.svg')}}"
                        class="w-24 h-24"
                        alt="">
                    </a>
                </div>
                <div class="flex justify-center p-4">
                    <a href="">
                        <img src="{{asset('storage/images/flags/us.svg')}}"
                        class="w-24 h-24"
                        alt="">
                    </a>
                </div>
                <div class="flex justify-center p-4">
                    <a href="">
                        <img src="{{asset('storage/images/flags/de.svg')}}"
                        class="w-24 h-24"
                        alt="">
                    </a>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
        </x-slot>
    </x-jet-dialog-modal>
</div>

<script type="text/javascript">
    let textInput;

    allowedKeys = ['A', 'Ą', 'B', 'C', 'Ć', 'D', 'E', 'Ę', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'Ł', 'M', 'N', 'O',
        'Ó',
        'P', 'Q', 'R', 'S', 'Ś', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'Ż', 'Ź'
    ];

    document.addEventListener('keydown', function (event) {

        //Clear hidden text input
        textInput = document.getElementById('super_hidden_secret_input');
        textInput.value = '';

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
    keyboardButton.addEventListener("click", showKeyboard);

    function showKeyboard() {
        let target = document.getElementById("super_hidden_secret_input");
        target.focus();
        target.click();
    }

</script>
