<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Word;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Interfaces\ForeignWordInterface;
use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Collection;

class Writing extends Component
{
    //Error reporting
    public ?string $message = null;
    public ?string $title = null;

    //Writing
    public ?string $lastKey = null;
    protected ?Collection $allWords = null; //All  words for create user words

    public ?Collection $words = null; //Words for this lesson, with arent already learned
    public string $wordsArray = "";


    public ?Word $word = null;
    public ?Word $previousWord = null;
    public array $guessedChars = [];
    public array $wordArray = [];


    public ?string $language;
    private ?string $withLanguage;
    public ?Category $category = null;
    public ?Subcategory $subcategory = null;
    public string $foreignWord = '';
    public string $previousForeignWord = '';
    public ?int $wordLength = null;
    public int $learnedWords = 0;
    public int $charNumber = 0;

    //Modals
    public bool $modalSuccessVisibility = false;
    public bool $modalFailureVisibility = false;
    public bool $modalLessonSuccessVisibility = false;
    public bool $modalReportErrorVisibility = false;

    //Tries
    public int $wrongTry = 0;
    public const ALLOWED_TRIES = 3;
    public const IS_LEARNED = 3;
    public int $wordSuccessGlobal = 0;
    public int $wordFailureGlobal = 0;

    /**
     * Rules for reporting error validator
     */
    protected $rules = [
        'title' => 'required|min:4',
        'message' => 'required|min:6',
    ];

    public function mount($language, $category = NULL, $subcategory = NULL): void
    {

        $this->language = $language;
        $this->category = $category;
        $this->subcategory = $subcategory;

        if(auth()->check())
        {
            if($this->category != NULL)
            {
                $this->createUserWords();
            }

            $this->saveLastUsedCategory();
        }

        $this->queryBuilder();
        $this->mergeUserWordsIntoWords();
        !$this->loadWord() ? $this->render() : $this->generateWordArrays();
    }

    /**
     * queryBuilder gets words list with related child words of second languege
     */
    public function queryBuilder(): void
    {
        if ($this->category != null) {

            if($this->subcategory !=null)
            {

                $this
                ->words = Word::with('userWords')
                ->where($this->language, '!=', NULL)
                ->where('category_id', '=', $this->category->id)
                ->where('subcategory_id', '=', $this->subcategory->id)
                ->whereRelation('userWords', 'language', '=', $this->language)
                ->get();

            } else
            {
                $this
                ->words = Word::with('userWords')
                ->where($this->language, '!=', NULL)
                ->where('category_id', '=', $this->category->id)
                ->whereRelation('userWords', 'language', '=', $this->language)
                ->get();

            }
        } else
        {
            $this->words = Word::where($this->language, '!=', NULL)->get();
        }

        $this->wordsArray = $this->words;
    }

    /*
    * Merge user words into words to get data about already learned
    */
    private function mergeUserWordsIntoWords(): void
    {
        if(auth()->check())
        {
            foreach ($this->words as $key => $word)
            {
                foreach($word->userWords as $userWord)
                {
                    if($userWord->language == $this->language)
                    {
                        $userWord->is_learned >= self::IS_LEARNED ? $this->words->pull($key) : null;
                    }
                }
            }
        }
    }

    /**
     * Loads single word
     */
    public function loadWord(): bool
    {
        $this->resetVariables();

        /**
         * If user is logged-in, delete from words collection already learned words and get random from not learned.
         * If there is no words to learn return false.
         * If user is not logged, just get random word.
         */
        if(auth()->check())
        {
            if($this->words->isEmpty())
            {
                return false;
            }
        }

        $this->word = $this->words->random();

        $this->previousWord == null ? $this->previousWord = $this->word : null;
        $this->foreignWord = $this->word->{$this->language};
        $this->generateWordArrays();

        return true;

    }

    public function saveLastUsedCategory(): void
    {

        if ($this->subcategory != NULL)
        {
            $user = User::findOrFail(auth()->id());
            $user->subcategory = $this->subcategory->id;
            $user->category = $this->category->id;
            $user->save();
        } elseif($this->category != NULL)
        {
            $user = User::findOrFail(auth()->id());
            $user->category = $this->category->id;
            $user->subcategory = NULL;
            $user->save();
        }

    }

    /**
     * If user learning this category first time, we are creating user_words
     * to save learning progress.
     */
    public function createUserWords()
    {
        if($this->category != NULL)
        {
            //Getting all words for create UserWords
            $this->allWords = Word::where($this->language, '!=', NULL)
            ->where('category_id', '=', $this->category->id)
            ->get();

            //Creating UserWords
            foreach($this->allWords as $word)
            {
                auth()->user()->userWords()->updateOrCreate(
                    [
                        'user_id' => auth()->id(),
                        'word_id' => $word->id,
                        'language' => $this->language,
                        'wrong_try' => 0,
                    ],
                );
            }
        }
    }

    public function resetVariables(): void
    {
        $this->charNumber = 0;
        $this->wrongTry = 0;
        $this->wordArray = [];
        $this->guessedChars = [];
        $this->lastKey = null;
        $this->modalSuccessVisibility = false;
        $this->modalFailureVisibility = false;
    }

    /**
     * Genarates word array with subarrays, and guessed chars array.
     * In word array the word is split into single characters,
     * if the character is present only in the polish alphabet,
     * a key with an alternative latin alphabet character is added,
     * to avoid sittuation where a user who doesnt have a polish keyboard
     * is unable to guess the char
     *
     * example: letter 'ą' is represented by array of 'a' and 'ą',
     * so if expected char is 'ą' user can use just 'a'
     *
     * Guessed chars array keeps "_" chars as long as this char isnt guessed.
     */
    public function generateWordArrays(): void
    {
        $this->wordLength = mb_strlen($this->word->polish, 'UTF-8');

        for ($i = 0; $i < $this->wordLength; $i++) {
            $this->wordArray[$i] = [strtolower(mb_substr($this->word->polish, $i, 1, 'UTF-8'))];

            switch ($this->wordArray[$i][0] ) {
                case 'ą':
                    $this->wordArray[$i][1] = 'a';
                    break;
                case 'ć':
                    $this->wordArray[$i][1] = 'c';
                    break;
                case 'ę':
                    $this->wordArray[$i][1] = 'e';
                    break;
                case 'ł':
                    $this->wordArray[$i][1] = 'l';
                    break;
                case 'ń':
                    $this->wordArray[$i][1] = 'n';
                    break;
                case 'ó':
                    $this->wordArray[$i][1] = 'o';
                    break;
                case 'ś':
                    $this->wordArray[$i][1] = 's';
                    break;
                case 'ź':
                    $this->wordArray[$i][1] = 'z';
                    break;
                case 'ż':
                    $this->wordArray[$i][1] = 'z';
                    break;
            }

            $this->guessedChars[$i] = '_';
        }
    }

    public function keyPressed($key): void
    {
        $key == 'space' ? $key = ' ' : null;
        $this->lastKey = $key;
        $this->isKeyValid();
    }

    /**
     * Checks is pressed key an expected key.
     */
    public function isKeyValid(): void
    {

        if (in_array($this->lastKey, $this->wordArray[$this->charNumber]))
        {
            $this->charNumber++;
            $this->guessedChars[$this->charNumber-1] = $this->lastKey;
            $this->dispatchBrowserEvent('validKey', ['charNumber' => $this->charNumber]);
            $this->charNumber == $this->wordLength ? $this->success() : null;

        } else
        {
            $this->wrongTry++;
            $this->dispatchBrowserEvent('invalidKey', ['charNumber' => ($this->charNumber+1)]);
            $this->wrongTry >= self::ALLOWED_TRIES ? $this->failure() : null;
        }

    }

    /**
     * success is called when word has been guessed
     * shows success modal ale load next word
     */
    public function success(): void
    {
        $this->wordSuccessGlobal++;
        $this->previousWord = $this->word;
        $this->previousForeignWord = $this->foreignWord;

        if(auth()->check())
        {
            if($this->updateUserWord(true) == true)
            {

                if($this->isLessonFinished())
                {
                    $this->modalLessonSuccessVisibility = true;

                } else
                {
                    $this->loadWord();
                    $this->modalSuccessVisibility = true;
                }
            }

        } else
        {
            $this->loadWord();
            $this->modalSuccessVisibility = true;
        }

    }

    public function hint(): void
    {
        $this->wrongTry = self::ALLOWED_TRIES + 1;
        $this->failure();
    }

    /**
     * failure is called what user failed to guess word
     * shows modal failure and load next word
     */
    public function failure(): void
    {
        $this->wordFailureGlobal++;
        auth()->check() ? $this->updateUserWord(false) : null;
        $this->previousWord = $this->word;
        $this->previousForeignWord = $this->foreignWord;
        $this->loadWord();
        $this->modalFailureVisibility = true;
    }

    /**
     * Saves user progress of learning actual word.
     */
    public function updateUserWord(bool $isSucces): bool
    {

        $userWord = auth()->user()->userWords()->firstOrNew(
            [
                'user_id' => auth()->id(),
                'word_id' => $this->word->id,
            ]
        );

        $userWord->user_id = auth()->id();
        $userWord->wrong_try = $this->wrongTry;
        $userWord->language = $this->language;

        if($isSucces)
        {
            $userWord->is_learned++;
        } else
        {
            $userWord->is_learned <= 0 ? null : $userWord->is_learned--;
        }

        if($userWord->save())
        {
            return true;
        } else
        {
            return false;
        }

    }

    public function isLessonFinished(): bool
    {
        foreach($this->words as $word)
        {
            foreach($word->userWords as $userWord)
            {
                if(($userWord->language == $this->language) && ($userWord->is_learned < self::IS_LEARNED)) return false;
            }
        }

        return true;

    }

    public function manualFinishLesson(): void
    {
        $this->modalLessonSuccessVisibility = true;
    }

    public function hideModals(): void
    {
        $this->modalSuccessVisibility = false;
        $this->modalFailureVisibility = false;
        $this->modalReportErrorVisibility = false;
    }

    public function reportError(): void
    {
        $this->validate();

        $this->foreignWord->errors()->create([
            'user_id' => auth()->id(),
            'word_id' => $this->word->id,
            'title' => $this->title,
            'message' => $this->message,
            'language' => $this->language,
        ]);

        $this->modalReportErrorVisibility = false;
        $this->message = null;
        $this->title = null;

    }

    public function render(): View
    {
        return view('livewire.writing');
    }
}
