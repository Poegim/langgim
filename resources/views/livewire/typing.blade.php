<div>
    <div class="px-2 pb-6 pt-4 bg-slate-800 sm:space-y-4">

        @auth
            <div class="text-xs sm:text-base text-green-300 sm:px-2 my-2 sm:my-1">
                 {{ __('messages.Remember: finish lesson to save your progress!')}}
             </div>
        @endauth

        <!-- Buttons -->
        <div class="flex flex-col lg:flex-row sm:p-2 space-y-2 lg:space-x-2 lg:space-y-0">
            <div class="flex space-x-2 lg:w-full">
                <x-keyboard />

                <x-jet-button wire:click="finishLesson()" class="w-1/2 lg:w-full text-xs bg-green-600 h-8 md:h-10">
                    <x-clarity-success-standard-line class="w-6 h-6 mr-2" />
                    {{__('messages.finish lesson')}}
                </x-jet-button>
            </div>

            <div class="flex space-x-2 lg:w-full">
                <x-jet-button class="w-1/2 lg:w-full bg-cyan-500 h-8 md:h-10" id="hint">
                    <x-clarity-help-solid class="w-6 h-6 mr-2" />{{__('messages.hint')}}
                </x-jet-button>

                @auth
                <x-jet-button class="w-1/2 lg:w-full bg-red-600 h-8 md:h-10" id="report-error-btn">
                    <x-clarity-error-standard-solid class="w-6 h-6 text-gray-800 mr-2" />
                    {{__('messages.report error')}}
                </x-jet-button>
                @endauth

                @guest
                <x-jet-button class="w-1/2 lg:w-full bg-red-600 h-8 md:h-10" id="report-error-btn" disabled>
                    <x-clarity-error-standard-solid class="w-6 h-6 text-gray-800 mr-2" />
                    {{__('messages.report error')}}
                </x-jet-button>
                @endguest
            </div>

        </div>

        <!-- Typed char -->
        <div class="w-full h-12 flex justify-center space-x-2">
            <x-clarity-check-line class="h-10 w-10 text-green-600 hidden my-auto" id="check-icon"/>
            <x-clarity-times-line class="h-10 w-10 text-red-600 hidden my-auto" id="times-icon" />
            <div id="typed-char" class="text-3xl my-auto font-extrabold"></div>
        </div>

        <!-- Word in selected language -->
        <div class="space-x-2 flex justify-center text-xl font-extrabold" id="foreign-word-div" >

        </div>

        <!-- Here lives char divs :) -->
        <div class="space-x-2 flex justify-center text-xl font-extrabold" id="word">
        </div>

    </div>

    <!-- Prototype modal success-->
    <x-jet-dialog-modal wire:model="modalSuccessVisibility" id="modalSuccess">
        <x-slot name="title">
            <div class="w-full flex justify-center font-bold text-lg">
                <div class="my-auto mr-2">
                    {{ __("messages.Yes! Good Answer!") }}
                </div>
                <x-clarity-success-standard-line class="text-green-400 h-12 my-auto"/>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="space-y-2 my-4 text-lg w-full">
                <div>
                    {{__('messages.polish language')}}: <span class="italic font-thin">{{ $data['word']['polish'] }}</span>
                </div>
                <div>
                    {{__('messages.your language')}}: <span class="italic font-thin">{{ $data['word'][$language] }}</span>
                </div>
                <div>
                    {{__('messages.sample sentence')}}: <span class="italic font-thin">{{ $data['word']['sample_sentence'] }}</span>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-1">

                <x-buttons.secondary wire:click="hideModals" class="w-1/2 capitalize">
                    {{ __("messages.continue")}}
                </x-buttons.secondary>

            </div>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Prototype modal failure-->
    <x-jet-dialog-modal wire:model="modalFailureVisibility" id="modalFailure">
        <x-slot name="title">
            <div class="w-full flex justify-center font-bold text-lg">
                <div class="my-auto mr-2">
                    {{ __("messages.Ups! Wrong Answer!") }}
                </div>
                <x-clarity-exclamation-circle-line class="text-red-600 h-12 my-auto"/>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="space-y-2 my-4 text-lg w-full">
                <div>
                    {{__('messages.polish language')}}: <span class="italic font-thin">{{ $data['word']['polish'] }}</span>
                </div>
                <div>
                    {{__('messages.your language')}}: <span class="italic font-thin">{{ $data['word'][$language] }}</span>
                </div>
                <div>
                    {{__('messages.sample sentence')}}: <span class="italic font-thin">{{ $data['word']['sample_sentence'] }}</span>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-1">

                <x-buttons.secondary wire:click="hideModals" class="w-1/2">
                    {{ __("messages.continue")}}
                </x-buttons.secondary>

            </div>
        </x-slot>
    </x-jet-dialog-modal>


    <!-- Prototype modal finish lesson-->
    <x-jet-dialog-modal wire:model="modalFinishLessonVisibility">
        <x-slot name="title">
            <div class="font-bold text-lg">
                {{ __("messages.Congratulations! Lesson finished!") }}
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="space-y-2 my-4 text-lg w-full">
                <div class="text-lg">
                    {{ __("messages.Thats your score.") }}
                </div>
                <div>
                    {{ __("messages.successful attempts") }}: <span class="italic font-thin">{{ $successCount }}</span>
                </div>
                <div>
                    {{ __("messages.failed attempts") }}: <span class="italic font-thin">{{ $failureCount }}</span>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-1">

                <a href="{{route('category.index', 'typing')}}">
                    <x-buttons.third class="w-1/2">
                        {{ __("messages.continue")}}
                    </x-buttons.third>
                </a>

            </div>
        </x-slot>
    </x-jet-dialog-modal>

    <script type="text/javascript" >

    document.addEventListener('livewire:load', () => {

        const allowedKeys = ['A', 'Ą', 'B', 'C', 'Ć', 'D', 'E', 'Ę', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'Ł', 'M', 'N',
            'O', 'Ó', 'P', 'Q', 'R', 'S', 'Ś', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'Ż', 'Ź', '1', '2', '3', '4', '5',
            '6', '7', '8', '9', '0', ' ', 'Space',
        ];

        let word;
        let words = @js($words);
        let startTime;

        const language = @js($language);
        const isLearned = @js($isLearned);
        const authCheck = @js($authCheck);
        let data = {'class':'UserWord'};

        let charDivs = [];
        const wordDiv = document.getElementById("word");
        const foreignWordDiv = document.getElementById('foreign-word-div');
        const successNextBtn = document.getElementById("success-next-btn");
        const successFinishBtn = document.getElementById("success-finish-btn");
        const reportErrorBtn = document.getElementById("report-error-btn");
        const hintBtn = document.getElementById("hint");

        const allowedTries = 4;

        let wrongTry = 0;
        let expectedChar = 0;

        //Is any modal visible.
        let modalsFlag = false;

        function loadRandomWord() {
            word = words[Math.floor(Math.random() * words.length)];
            word['polish'] = removeSpecialChars(word['polish']);
            startTime = Math.floor(Date.now() / 1000);
        }

        //Remove learned words from collection and set new to is_learned = 0.
        function removeLearned() {
            newWords = words.filter((word) => {
                if(!word.hasOwnProperty('user_words') || word.user_words.length == 0) {
                    word.user_words = [];
                    word.user_words[0] = {'is_learned':0};
                }
                return (word.user_words[0].is_learned < isLearned);
            });

            if(newWords.length != 0) {
                words = [...newWords];
            } else {
                words.length = 0;
            }
        }

        //Create divs for every expected char of the word
        function createCharDivs(n) {
            for (let i = 0; i < n; i++) {
                const newDiv = document.createElement('div');
                newDiv.id = `char-${i}`;
                newDiv.classList.add('char');
                wordDiv.appendChild(newDiv);
            }
        }

        function selectCharDivs() {
            charDivs = [...document.querySelectorAll('.char')];
        }

        function removeCharDivs() {
            charDivs.forEach( (div)  => {
                div.remove();
            });
        }

        //Prints underscores for every char wich is not guessed.
        function printUnderscores() {
            for (let i = 0; i < charDivs.length; i++) {
                charDivs[i].innerText = "_";
            }
        }

        //Moves pulse class to next char
        function movePulse() {
            if(expectedChar < word['polish'].length) {
                for (let i = 0; i < charDivs.length; i++) {
                    charDivs[i].classList.remove('animate-pulse');
                }
                charDivs[expectedChar].classList.add('animate-pulse');
            }
        }

        function hideIcons(arr) {
            for (let i = 0; i < arr.length; i++) {
                const icon = arr[i];
                if(!icon.classList.contains("hidden")) {
                    icon.classList.add("hidden");
                }
            }
        }

        function showIcon(icon) {
            icon.classList.remove("hidden");
            setTimeout(() => {
                icon.classList.add("hidden");
            }, 1000);
        }

        //In case user dont have polish keyboard, map polish chars to latin equivalent.
        function polishToLatinAlphabetMapping(char) {
            const polishCharacters = {
                'ą': ['ą', 'a'],
                'ć': ['ć', 'c'],
                'ę': ['ę', 'e'],
                'ł': ['ł', 'l'],
                'ń': ['ń', 'n'],
                'ó': ['ó', 'o'],
                'ś': ['ś', 's'],
                'ź': ['ź', 'z'],
                'ż': ['ż', 'z']
            };

            if (polishCharacters.hasOwnProperty(char)) {
                return polishCharacters[char];
            } else {
                return [char];
            }
        }

        function showTypedChar(key) {
            const typedChar = document.getElementById("typed-char");
            typedChar.innerText = key.toUpperCase();
            setTimeout( () => {
                typedChar.innerText = "";
                },
            1000);
        }

        //Called after every pressed key.
        function isExpected(key) {

            const check = document.getElementById("check-icon");
            const times = document.getElementById("times-icon");

            hideIcons([check, times]);
            showTypedChar(key.toUpperCase());

            //If typed char is expected char.
            if(polishToLatinAlphabetMapping(word['polish'][expectedChar].toLowerCase()).includes(key.toLowerCase())) {

                showIcon(check);

                //Show char on char divs.
                charDivs[expectedChar].innerText = word['polish'][expectedChar].toUpperCase();

                //Check is last, and if that was last char, it means word typing is over, so open success modal.
                if(expectedChar >= word['polish'].length-1) {
                    modalsFlag = true;

                    //Find index of word user was typing
                    const index = words.findIndex(obj => {
                        return obj.id === word.id;
                    });


                    if(authCheck && words[index].hasOwnProperty('user_words')) {

                        words[index].user_words[0].is_learned++;

                        //If there is no more words to learn, set finish lesson flag to true.
                        removeLearned();

                        if(!words.length == 0) {
                            data.lesson_finished = false;
                        } else {
                            data.lesson_finished = true;
                        }

                    //else do not finish word.
                    } else {
                        data.lesson_finished = false;
                    }

                    data.time = Math.floor(Date.now() / 1000) - startTime;
                    data.word = word;
                    @this.success(data);

                }

                expectedChar++;
                movePulse();

            //If typed char isnt expected char.
            } else {
                showIcon(times);
                wrongTry++;
                isFailure();
            }
        }

        function isFailure() {
            if(wrongTry >= allowedTries) {
                data.lesson_finished = false;
                data.word = word;
                data.time = Math.floor(Date.now() / 1000) - startTime;
                modalsFlag = true;
                @this.failure(data);
            }
        }

        function resetVariables() {
            wrongTry = 0;
            expectedChar = 0;
            modalsFlag = false;
        }

        function init(isFirst = false) {

            if(isFirst === true) {
                removeLearned();
            }

            if(words.length > 0) {
                //If its not a first init, remove previous word char divs and reset variables.
                if(!isFirst) {
                    resetVariables();
                    selectCharDivs();
                    removeCharDivs();
                }
                loadRandomWord();
                foreignWordDiv.innerText = word[language];
                createCharDivs(word['polish'].length);
                selectCharDivs();
                printUnderscores();
                movePulse();
            } else {
                modalsFlag = true;
                @this.finishLesson();
            }
        }

        function showHint() {
            //Dont allow to show last char
            if(expectedChar < word['polish'].length-1) {
                //Show char on char divs.
                charDivs[expectedChar].innerText = word['polish'][expectedChar].toUpperCase();
                expectedChar++;
                wrongTry++;
                isFailure();
                movePulse();
            }
        }

        function removeSpecialChars(string) {
            return string.replace(/[^\w\sąćęłńóśźżĄĆĘŁŃÓŚŹŻ]/g, '');
        }

        init(true);

        document.addEventListener('init', () => init());

        hintBtn.addEventListener('click', () => showHint());

        document.addEventListener('keydown', (event) => {

            //Register keydown only if there is no any opened modals.
            if(!modalsFlag) {
                for (const element of allowedKeys) {
                    if (element.toLowerCase() == event.key.toLowerCase()) {
                        isExpected(event.key.toLowerCase());
                    }
                }
            //If any modal is open, enter key will close it.
            } else {
                if (event.key === "Enter") {
                    @this.hideModals();
                }
            }

        });

        reportErrorBtn.addEventListener('click', () => {
            let currentProtocol = window.location.protocol;
            let currentHost = window.location.hostname;
            let newUrl = currentProtocol + "//" + currentHost + "/errors/create/" + word['id'] + "/" + language;
            window.open(newUrl);
        });
    });


    </script>
</div>
