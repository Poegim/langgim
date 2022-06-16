<div class="p-6 rounded-md w-8/12 mx-auto mt-12 text-center">
    <div>
        <div id="word_div" class="">
            <div class="h-10">
                <h1 class="mt-5 text-lg tracking-wider">{{ $word->uaWord->word }}</h1>
            </div>
            <div class="mt-5 flex justify-center">
                @foreach($guessedChars as $key => $char)
                <div class="grid grid-cols-1">
                    <div class="w-4">
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

        <!-- WORD SUCCESS MESSAGE -->
        <div id="word_success" class="h-full w-full hidden">
            <div class="text-2xl font-extrabold">
                {{$word->pl_word}}
            </div>
            <div class="flex justify-center">
                <x-clarity-success-line class="h-20 w-20 text-green-400" />
            </div>
            <div class="text-center">
                {{$word->sample_sentence}}
            </div>
            <div class="mt-4">
                <x-buttons.primary onclick="hideSuccess()">Następne</x-buttons.primary>
            </div>
        </div>

        <!-- WORD FAILURE MESSAGE -->
        <div id="word_failure" class="h-full w-full hidden">
            <div class="text-2xl font-extrabold">
                {{$word->pl_word}}
            </div>
            <div class="flex justify-center">
                <x-clarity-times-line class="h-20 w-20 text-red-500" />
            </div>
            <div class="text-center">
                {{$word->sample_sentence}}
            </div>
            <div class="mt-4">
                <x-buttons.third onclick="hideFailure()">Następne</x-buttons.third>
            </div>
        </div>
    </div>


    <!-- Prototype modal success-->
    <x-jet-dialog-modal wire:model="modalSuccessVisibility">
        <x-slot name="title" >
            {{ __("Success") }}
        </x-slot>

        <x-slot name="content">
            {{ $word->pl_word }}
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-1">

                <x-jet-secondary-button
                wire:click="loadWord"
                {{-- onclick="hideSuccess()" --}}
                >
                {{ __("Next")}}
                </x-jet-secondary-button>

            </div>
        </x-slot>
    </x-jet-dialog-modal>

        <!-- Prototype modal failure-->
        <x-jet-dialog-modal wire:model="modalFailureVisibility">
            <x-slot name="title" >
                {{ __("Failure") }}
            </x-slot>

            <x-slot name="content">
                {{ $word->pl_word }}
            </x-slot>

            <x-slot name="footer">
                <div class="space-x-1">

                    <x-jet-secondary-button
                    wire:click="loadWord"
                    {{-- onclick="hideFailure()" --}}
                    >
                    {{ __("Next")}}
                    </x-jet-secondary-button>

                </div>
            </x-slot>
        </x-jet-dialog-modal>

</div>

<script type="text/javascript">

    allowedKeys = ['A', 'Ą', 'B', 'C', 'Ć', 'D', 'E', 'Ę', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'Ł', 'M', 'N', 'O', 'Ó',
        'P', 'Q', 'R', 'S', 'Ś', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'Ż', 'Ź'
    ];

    document.addEventListener('keydown', function (event) {

        if((@this.modalSuccessVisibility == false) && (@this.modalFailureVisibility == false))
        {
            for (const element of allowedKeys) {
                if (element.toLowerCase() == event.key.toLowerCase()) {
                    @this.keyPressed(event.key.toLowerCase());
                }
            }
        } else
        {
            console.log(event);
            console.log(@this.modalSuccessVisibility);
            console.log(@this.modalFailureVisibility);
            if (event.key == 'Enter') {
                console.log('Enter has been hited');
            }
        }

    });

    document.addEventListener('validKey', function (data) {
        let div;
        div = document.getElementById("success_" + (data.detail.charNumber - 1));
        div.classList.remove("hidden");
        setTimeout(function () {
            div.classList.add("hidden");
        }, 500);
    });

    document.addEventListener('invalidKey', function (data) {
        let div;
        div = document.getElementById("failure_" + (data.detail.charNumber - 1));
        div.classList.remove("hidden");
        setTimeout(function () {
            div.classList.add("hidden");
        }, 500);
    });

    function hideSuccess() {
        @this.loadWord();
    };

    function hideFailure() {
        @this.loadWord();
    }

</script>
