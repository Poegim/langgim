<div class="rounded-lg bg-slate-800 shadow-md" x-data="{
            open: false,
        }">

    @if(!$words->isEmpty())
    <div class="py-2 sm:py-4 rounded-md mx-auto text-center">

        <div class="sm:flex px-2">
            <div class="px-2 w-full">
                <x-jet-button class="w-full mt-1 sm:mt-2 px-2 py-1 sm:py-2 text-sm bg-purple-700" x-on:click="open = ! open">
                    <div class="flex">
                        <x-clarity-keyboard-line class="w-6 h-6 " />
                    </div>
                    <span class="block ml-2 ">
                        Virtual Keyboard
                    </span>
                </x-jet-button>
            </div>

            <div class="px-2 w-full">
                <x-jet-button class="w-full mt-1 sm:mt-2 px-2 py-1 sm:py-2 text-sm bg-purple-700" wire:click="manualFinishLesson">
                    <div class="flex">
                        <x-clarity-success-standard-line class="w-6 h-6 " />
                        <span class="block ml-2 mt-1 ">
                            Finish Lesson
                        </span>
                    </div>
                </x-jet-button>
            </div>

            <div class="px-2 w-full">
                <x-jet-button class="w-full mt-1 sm:mt-2 px-2 py-1 sm:py-2 text-sm bg-purple-700" wire:click="hint">
                    <div class="flex">
                        <x-clarity-help-solid class="w-6 h-6 " />
                        <span class="block ml-2 mt-1 ">
                            I need a hint
                        </span>
                    </div>
                </x-jet-button>
            </div>
        </div>
        {{$summed}}
        <div class="flex justify-center mt-2 sm:mt-4 ">
            <span class="uppercase text-sm "> {{ __('Last key:')}} {{ $lastKey }} </span>
            <div class="text-green-500 font-bold hidden" id="top_success" name="top_success">
                <x-clarity-success-line class="h-4 w-4 " />
            </div>
            <div class="text-red-500 hidden" id="top_failure" name="top_failure">
                <x-clarity-times-line class="h-4 w-4" />
            </div>
        </div>

        <div name="word_div" id="word_div" class="">
            <div class="mt-2 sm:mt-4">
                <span class="text-xl sm:text-2xl tracking-wide uppercase ">
                    {{ $foreignWord }}
                </span>

            </div>
            <div class="mt-2 sm:mt-4 flex justify-center space-x-2 ">
                @foreach($guessedChars as $key => $char)
                <div class="grid grid-cols-1 uppercase">
                    <div class="w-4" id="field_{{$key}}">
                        <span class="text-lg font-extrabold tracking-wide z-40"> {{$char}} </span>
                    </div>
                    <div class="w-4 h-4">
                        <div class="text-green-500 font-bold hidden" id="success_{{$key}}" name="success_{{$key}}">
                            <x-clarity-success-line class="h-5 w-5" />
                        </div>
                        <div class="text-red-500 hidden" id="failure_{{$key}}" name="failure_{{$key}}">
                            <x-clarity-times-line class="h-5 w-5" />
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="flex justify-center mt-4 mb-2">
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
    <div x-cloak x-show="open">
        <div class="shadow-md absolute inset-x-0 bottom-0 bg-slate-800 rounded-t-lg w-full flex justify-center">
            <div class="w-11/12 sm:w-8/12 lg:w-1/2">
                <div class="pt-2 pb-1 px-2 flex justify-between">
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N1">1</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N2">2</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N3">3</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N4">4</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N5">5</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N6">6</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N7">7</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N8">8</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N9">9</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N0">0</button>
                </div>
                <div class="pb-1 px-2 flex justify-between">
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="Q">Q</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="W">W</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="E">E</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="R">R</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="T">T</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="Y">Y</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="U">U</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="I">I</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="O">O</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="P">P</button>
                </div>
                <div class="rounded-lg py-1 px-8 flex">
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="A">A</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="S">S</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="D">D</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="F">F</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="G">G</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="H">H</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="J">J</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="K">K</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="L">L</button>
                </div>
                <div class="rounded-lg py-1 px-14 flex">
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="Z">Z</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="X">X</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="C">C</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="V">V</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="B">B</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N">N</button>
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="M">M</button>
                </div>
                <div class="rounded-lg pt-1 pb-2 px-14 flex">
                    <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="SPACE">SPACE</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Report Error -->
    <x-old-dialog-modal wire:model="modalReportErrorVisibility" id="modalError">
        <x-slot name="title">
            {{ __("Report Error") }}
        </x-slot>

        <x-slot name="content">
            <div>
                Did u found any mistake?
            </div>
            <div class="mt-4">
                Polish: <span class="text-wider uppercase">{{$word->polish}}</span>
            </div>
            <div>
                {{ ucfirst($language) }}: <span class="text-wider uppercase">{{$foreignWord}}</span>
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

    <!-- Prototype modal success-->
    <x-jet-dialog-modal wire:model="modalSuccessVisibility" id="modalSuccess">
        <x-slot name="title">
            <div class="font-bold text-lg">
                {{ __("Yes! Good answer!") }}
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="tracking-wider">
                <p>
                    {{ucfirst($language)}}: <span class="uppercase">{{ $previousForeignWord }} </span>
                </p>
                <p>
                    Polish: <span class="uppercase">{{ $previousWord->polish }} </span>
                </p>
            </div>
            <div class="mt-4">
                Sample sentence: <span class="italic">"{{ $previousWord->sample_sentence }}"</span>
            </div>
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
            <div class="font-bold text-lg">
                {{ __("I have some hint for you!") }}
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="tracking-wider">
                <p>
                    {{ucfirst($language)}}: <span class="uppercase">{{ $previousForeignWord }} </span>
                </p>
                <p>
                    Polish: <span class="uppercase">{{ $previousWord->polish }} </span>
                </p>
            </div>
            <div class="mt-4">
                Sample sentence: <span class="italic">"{{ $previousWord->sample_sentence }}"</span>
            </div>
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
            <div class="font-bold text-lg">
                {{ __("Lesson finished!") }}
            </div>
        </x-slot>

        <x-slot name="content">
            <p>Correct answers: {{ $wordSuccessGlobal }} </p>
            <p>Wrong answers: {{ $wordFailureGlobal }} </p>
            <p>Ratio @php if(($wordSuccessGlobal != 0) || ($wordFailureGlobal != 0)) {echo
                (number_format((($wordSuccessGlobal / ($wordSuccessGlobal+$wordFailureGlobal))*100),1));} @endphp% </p>
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
        // let virtualKeyboard = document.getElementsByClassName("rounded bg-gray-300 shadow-lg m-1 p-1 w-full text-center");

        let N1 = document.getElementById("N1").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '1'
            }));
        });
        let N2 = document.getElementById("N2").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '2'
            }));
        });
        let N3 = document.getElementById("N3").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '3'
            }));
        });
        let N4 = document.getElementById("N4").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '4'
            }));
        });
        let N5 = document.getElementById("N5").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '5'
            }));
        });
        let N6 = document.getElementById("N6").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '6'
            }));
        });
        let N7 = document.getElementById("N7").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '7'
            }));
        });
        let N8 = document.getElementById("N8").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '8'
            }));
        });
        let N9 = document.getElementById("N9").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '9'
            }));
        });
        let N0 = document.getElementById("N0").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '0'
            }));
        });
        let Q = document.getElementById("Q").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'q'
            }));
        });
        let W = document.getElementById("W").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'w'
            }));
        });
        let E = document.getElementById("E").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'e'
            }));
        });
        let R = document.getElementById("R").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'r'
            }));
        });
        let T = document.getElementById("T").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 't'
            }));
        });
        let Y = document.getElementById("Y").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'y'
            }));
        });
        let U = document.getElementById("U").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'u'
            }));
        });
        let I = document.getElementById("I").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'i'
            }));
        });
        let O = document.getElementById("O").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'o'
            }));
        });
        let P = document.getElementById("P").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'p'
            }));
        });
        let A = document.getElementById("A").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'a'
            }));
        });
        let S = document.getElementById("S").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 's'
            }));
        });
        let D = document.getElementById("D").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'd'
            }));
        });
        let F = document.getElementById("F").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'f'
            }));
        });
        let G = document.getElementById("G").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'g'
            }));
        });
        let H = document.getElementById("H").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'h'
            }));
        });
        let J = document.getElementById("J").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'j'
            }));
        });
        let K = document.getElementById("K").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'k'
            }));
        });
        let L = document.getElementById("L").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'l'
            }));
        });
        let Z = document.getElementById("Z").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'z'
            }));
        });
        let X = document.getElementById("X").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'x'
            }));
        });
        let C = document.getElementById("C").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'c'
            }));
        });
        let V = document.getElementById("V").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'v'
            }));
        });
        let B = document.getElementById("B").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'b'
            }));
        });
        let N = document.getElementById("N").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'n'
            }));
        });
        let M = document.getElementById("M").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'm'
            }));
        });
        let SPACE = document.getElementById("SPACE").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'Space'
            }));
        });

        allowedKeys = ['A', 'Ą', 'B', 'C', 'Ć', 'D', 'E', 'Ę', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'Ł', 'M', 'N',
            'O', 'Ó', 'P', 'Q', 'R', 'S', 'Ś', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'Ż', 'Ź', '1', '2', '3', '4', '5',
            '6', '7', '8', '9', '0', ' ', 'Space',
        ];

        document.addEventListener('keydown', function (event) {

            //Modals
            const modalFailure = document.getElementById('modalFailure');
            const modalSuccess = document.getElementById('modalSuccess');
            const modalLessonSuccess = document.getElementById('modalLessonSuccess');
            const modalError = document.getElementById('modalError');

            //If modals are hidden then user can write.
            if (
                (modalFailure.style.display == 'none') &&
                (modalSuccess.style.display == 'none') &&
                (modalLessonSuccess.style.display == 'none') &&
                (modalError.style.display == 'none')
            ) {

                //If livewire variable of modals visibility is true this sets it to false
                //wich is real state of modals.
                if (@this.modalSuccessVisibility == true) @this.modalSuccessVisibility = false;
                if (@this.modalFailureVisibility == true) @this.modalFailureVisibility = false;
                if (@this.modalReportErrorVisibility == true) @this.modalReportErrorVisibility = false;

                //Check is hited key allowed, if yes run livewire controller method.
                for (const element of allowedKeys) {
                    if (element.toLowerCase() == event.key.toLowerCase()) @this.keyPressed(event.key
                        .toLowerCase());
                }
            } else {
                if (event.key.toLowerCase() == 'enter') {
                    @this.modalSuccessVisibility = false;
                    @this.modalFailureVisibility = false;
                    @this.modalReportErrorVisibility = false;
                }
            }

        });


        //If valid key is hited this event is loaded
        document.addEventListener('validKey', function (data) {

            let div = document.getElementById("success_" + (data.detail.charNumber - 1));
            let top_success = document.getElementById("top_success");

            top_success.classList.remove("hidden");


            setTimeout(() => {
                top_success.classList.add("hidden");
            }, 1000);


            if (div != null) {
                div.classList.remove("hidden");
                setTimeout(() => {
                    div.classList.add("hidden");
                }, 1000);
            }


        });

        //If invalid key is hited this event is loaded
        document.addEventListener('invalidKey', (data) => {

            let div = document.getElementById("failure_" + (data.detail.charNumber - 1));
            let top_failure = document.getElementById("top_failure");

            top_failure.classList.remove("hidden");
            setTimeout(() => {
                top_failure.classList.add("hidden");
            }, 1000);


            if (div != null) {
                div.classList.remove("hidden");
                setTimeout(() => {
                    div.classList.add("hidden");
                }, 1000);
            }

        });

    </script>

    @else
    <div class="py-2 sm:py-4 rounded-md mx-auto text-center relative">
        This category is already learned, reset your progress or choose different category.
        <div class="flex justify-center mt-2">
            <a href="{{route('category.index')}}">
                <x-jet-secondary-button>Back to categories</x-jet-secondary-button>
            </a>
        </div>
    </div>

    @endif


</div>