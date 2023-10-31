<div>
    <div class="px-2 pb-6 pt-4 bg-slate-800 sm:space-y-4">
        <!-- Buttons -->
        <div class="flex sm:p-2 space-x-2">
            <div class="flex space-x-2 w-full">
                <x-jet-button class="w-full text-xs bg-purple-700 h-8 md:h-10" wire:click="finishLesson()">
                    <x-clarity-success-standard-line class="w-6 h-6 mr-2" />
                        Finish Lesson
                </x-jet-button>
            </div>

            <div class="flex space-x-2 w-full">
                @auth
                <x-jet-button class="w-full bg-purple-700 h-8 md:h-10" id="report-error-btn">
                    <x-clarity-error-standard-solid class="w-6 h-6 text-red-400 mr-2" />
                    Report error
                </x-jet-button>
                @endauth

                @guest
                <x-jet-button class="w-full bg-purple-700 h-8 md:h-10" id="report-error-btn" disabled>
                    <x-clarity-error-standard-solid class="w-6 h-6 text-red-400 mr-2" />
                    Report error
                </x-jet-button>
                @endguest
            </div>
        </div>

        <div class="w-full p-2 flex my-4">
            <div class="rounded p-4 m-auto uppercase text-2xl md:text-3xl" id="word">

            </div>
        </div>

        <div class="w-full grid grid-cols-2 px-2 gap-2">
            <x-buttons.secondary id="btn-0" class="md:text-lg"></x-buttons.secondary>
            <x-buttons.secondary id="btn-1" class="md:text-lg"></x-buttons.secondary>
            <x-buttons.secondary id="btn-2" class="md:text-lg"></x-buttons.secondary>
            <x-buttons.secondary id="btn-3" class="md:text-lg"></x-buttons.secondary>
        </div>
    </div>

    <!-- Prototype modal success-->
    <x-jet-dialog-modal wire:model="modalSuccessVisibility" id="modalSuccess">
        <x-slot name="title">
            <div class="w-full flex justify-center font-bold text-lg">
                <div class="my-auto mr-2">
                    {{ __("Tak! Dobra odpowiedź!") }}
                </div>
                <x-clarity-success-standard-line class="text-green-400 h-12 my-auto"/>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="space-y-2 my-4 text-lg w-full">
                <div>
                    j.polski: <span class="italic font-thin">{{ $data['word']['polish'] }}</span>
                </div>
                <div>
                    twój język: <span class="italic font-thin">{{ $data['word'][$language] }}</span>
                </div>
                <div>
                    przykładowe zdanie: <span class="italic font-thin">{{ $data['word']['sample_sentence'] }}</span>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-1">

                <x-buttons.secondary wire:click="hideModals" class="w-1/2">
                    {{ __("Next")}}
                </x-buttons.secondary>

            </div>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Prototype modal failure-->
    <x-jet-dialog-modal wire:model="modalFailureVisibility" id="modalFailure">
        <x-slot name="title">
            <div class="w-full flex justify-center font-bold text-lg">
                <div class="my-auto mr-2">
                    {{ __("Ups! Tym razem się nie udało!") }}
                </div>
                <x-clarity-exclamation-circle-line class="text-red-600 h-12 my-auto"/>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="space-y-2 my-4 text-lg w-full">
                <div>
                    j.polski: <span class="italic font-thin">{{ $data['word']['polish'] }}</span>
                </div>
                <div>
                    twój język: <span class="italic font-thin">{{ $data['word'][$language] }}</span>
                </div>
                <div>
                    przykładowe zdanie: <span class="italic font-thin">{{ $data['word']['sample_sentence'] }}</span>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-1">

                <x-buttons.secondary wire:click="hideModals" class="w-1/2">
                    {{ __("Next")}}
                </x-buttons.secondary>

            </div>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Prototype modal finish lesson-->
    <x-jet-dialog-modal wire:model="modalFinishLessonVisibility">
        <x-slot name="title">
            <div class="font-bold text-lg">
                {{ __("Gratulacje! Skończyłeś lekcje!") }}
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="space-y-2 my-4 text-lg w-full">
                <div class="text-lg">
                    {{ __("Gratulacje! Oto twój rezultat.") }}
                </div>
                <div>
                    udane próby: <span class="italic font-thin">{{ $successCount }}</span>
                </div>
                <div>
                    nieudane próby: <span class="italic font-thin">{{ $failureCount }}</span>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-1">

                <a href="{{route('category.index', 'quiz')}}">
                    <x-buttons.third class="w-1/2">
                        {{ __("Next")}}
                    </x-buttons.third>
                </a>

            </div>
        </x-slot>
    </x-jet-dialog-modal>


    <script type="text/javascript" >

        document.addEventListener('livewire:load', () => {

            let word;
            let startTime;
            let wrongAnswers = [];
            let words = @js($words);
            const wordDiv = document.getElementById("word");
            const reportErrorBtn = document.getElementById("report-error-btn");
            const btns = [];

            const language = @js($language);
            const authCheck = @js($authCheck);
            const isLearned = @js($isLearned);
            let data = {'class':'UserQuizWord'};

            //Is any modal visible.
            let modalsFlag = false;

            function startTimer() {
                return Math.floor(Date.now() / 1000);
            }

            function loadRandomWord() {
                return words[Math.floor(Math.random() * words.length)];
            }

            function fillDiv() {
                wordDiv.textContent = word[language];
            }

            //Load 3 wrong words.
            function loadWrongAnswers() {
                if(isEnoughWords()) {
                    //Get randome word.
                    newWord = words[Math.floor(Math.random() * words.length)];

                    // If word is same as expected answer or this word is already in wrongAnswers arr, call recurency to get another.
                    // Else sanitize word and push to wrongAnswers.
                    if((newWord['id'] === word['id']) || wrongAnswers.includes(newWord)){
                        loadWrongAnswers();
                    } else {
                        newWord['polish'] = removeSpecialChars(newWord['polish']);
                        wrongAnswers.push(newWord);
                        if(wrongAnswers.length < 3) loadWrongAnswers();
                    }
                }
            }

            function assignAnswersToBtns() {
                let allAnswers = shuffleArray(wrongAnswers.concat(word));
                for (let i = 0; i < allAnswers.length; i++) {
                    btns[i] = document.getElementById("btn-"+i);
                    btns[i].setAttribute("word-id", allAnswers[i]['id'])
                    btns[i].textContent = allAnswers[i]['polish'];
                }
            }

            function shuffleArray(array) {
                return array.sort(() => Math.random() - 0.5);
            }

            function checkAnswer(id) {
                return id === parseInt(word['id']);
            }

            function handleButtonClick(btn) {
                const wordId = parseInt(btn.getAttribute('word-id'));
                const isCorrectAnswer = checkAnswer(wordId);

                data.time = Math.floor(Date.now() / 1000) - startTime;
                data.word = word;

                if (isCorrectAnswer) {
                    handleCorrectAnswer();
                } else {
                    handleIncorrectAnswer();
                }
            }

            function handleCorrectAnswer() {

                ///Find index of word
                let index = words.findIndex(obj => {
                    return obj.id === word.id;
                });

                if(authCheck && words[index].hasOwnProperty('user_quiz_words')) {

                    words[index].user_quiz_words[0].is_learned++;
                    //If there is no more words to learn, set finish lesson flag to true.
                    removeLearned();
                    data.lesson_finished = !isEnoughWords();

                } else {
                    data.lesson_finished = false;
                }

                @this.success(data);
            }

            function handleIncorrectAnswer() {
                @this.failure(data);
            }

            //Another redundance from typing component.
            function removeSpecialChars(string) {
                return string.replace(/[^\w\sąćęłńóśźżĄĆĘŁŃÓŚŹŻ]/g, '');
            }

            //Remove learned words from collection and set new to is_learned = 0.
            //This function is almost same as in typing mode?
            function removeLearned() {
                newWords = words.filter((word) => {

                    if(!word.hasOwnProperty('user_quiz_words') || word.user_quiz_words.length == 0) {
                        word.user_quiz_words = [];
                        word.user_quiz_words[0] = {'is_learned':0};
                    }
                    return (word.user_quiz_words[0].is_learned < isLearned);
                });

                if(newWords.length != 0) {
                    words = [...newWords];
                } else {
                    words.length = 0;
                }
            }

            function isEnoughWords() {
                return words.length > 4;
            }

            function resetVariables() {
                wrongAnswers = [];
            }

            function init(isFirst = false) {

                if(isFirst) {
                    removeLearned();
                }

                resetVariables();
                if(isEnoughWords()) {
                    word = loadRandomWord();
                    word['polish'] = removeSpecialChars(word['polish']);
                    fillDiv();
                    loadWrongAnswers();
                    assignAnswersToBtns();
                } else {
                    @this.finishLesson();
                }

                startTime = startTimer();
            }

            init(true);

            document.addEventListener('init', () => init());

            for (let i = 0; i < btns.length; i++) {
                btns[i].addEventListener('click', () => {
                    handleButtonClick(btns[i]);
                });
            }

            reportErrorBtn.addEventListener('click', () => {
            let currentProtocol = window.location.protocol;
            let currentHost = window.location.hostname;
            let newUrl = currentProtocol + "//" + currentHost + "/errors/create/" + word['id'] + "/" + language;
            window.open(newUrl);
        });

        });

    </script>
</div>
