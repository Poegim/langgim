<div class="text-gray-200 bg-gray-800 p-6 rounded-md w-8/12 mx-auto mt-12 text-center">

    <div class="h-10">
        <h1 class="mt-5">{{ $word->ua_word }}</h1>
    </div>

    <div>
        <h1 class="mt-5">
            {{ $guessedChars }}
            @for($i = 1; $i<(strlen($word->pl_word)+1)-$charNumber; $i++)
                <span id={{$i."_char"}}>_</span>
            
            @endfor
        </h1>
        <h1 class="pt-5"> {{ $lastKey }} </h1>
    </div>

    <div class="h-10">
        <p>Actual char: {{ $charNumber+1 }}</p>
        <p>Word legth: {{ $wordLength }} </p>
    </div>

</div>

<script>

    allowedKeys = [
        'A',
        'Ą',
        'B',
        'C',
        'Ć',
        'D',
        'E',
        'Ę',
        'F',
        'G',
        'H',
        'I',
        'J',
        'K',
        'L',
        'Ł',
        'M',
        'N',
        'O',
        'Ó',
        'P',
        'Q',
        'R',
        'S',
        'Ś',
        'T',
        'U',
        'V',
        'W',
        'X',
        'Y',
        'Z',
        'Ź',
        'Ż',
    ];

    var charSpan = null;

    document.addEventListener('keydown', function (event) {

        for (const element of allowedKeys) {
            if((element == event.key) || (element.toLowerCase() == event.key))
            {
                @this.keyPressed(event.key.toLowerCase());
                console.log(event.key.toLowerCase());
            }
        }
    });

    document.addEventListener('invalidKey', function (data) {
        console.log('Invalid key: '+data.detail.key);
    });

</script>
