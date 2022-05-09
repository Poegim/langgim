<div class="text-gray-200 bg-gray-800 p-6 rounded-md w-8/12 mx-auto mt-12 text-center">

    <div class="h-10">
        <h1 class="mt-5">{{ $word->ua_word }}</h1>
    </div>

    <div class="h-10">
        <h1 class="mt-5">{{ $lastKey }}</h1>
    </div>

    <div class="h-10">
        <p>Actual char: {{ $charNumber }}</p>
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

    document.addEventListener('keydown', function (event) {

        for (const element of allowedKeys) {
            if((element == event.key) || (element.toLowerCase() == event.key))
            {
                @this.keyPressed(event.key.toLowerCase());
            }
        }
    });

</script>
