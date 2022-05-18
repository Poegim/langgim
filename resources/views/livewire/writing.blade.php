<div class="text-gray-200 bg-gray-800 p-6 rounded-md w-8/12 mx-auto mt-12 text-center">

    <div class="h-10">
        <h1 class="mt-5">{{ $word->ua_word }}</h1>
    </div>

    <div>
        <h1 class="mt-5">
            @foreach($guessedChars as $key => $char)
                <span id={{$key."_char"}}> {{$char}} </span>
            @endforeach
        </h1>
        <h1 class="pt-5"> {{ $lastKey }} </h1>
    </div>

    <div class="h-10">
        <p>Actual char: {{ $charNumber+1 }}</p>
        <p>Word legth: {{ $wordLength }} </p>
    </div>

    <div x-data="{show: false}" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="bg-green-200 text-black mr-4 px-2" style="display: none;">
    Your personal information has been updated!  (1614715825)
    </div>

    <div class="flex justify-center">
    <x-clarity-success-line class="h12- w-12"/>
    </div>

</div>

<script type="text/javascript">

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
        'Ż',
        'Ź',
    ];

    let span;

    document.addEventListener('keydown', function (event) {

        for (const element of allowedKeys) {
            if(element.toLowerCase() == event.key.toLowerCase())
            {
                @this.keyPressed(event.key.toLowerCase());
                console.log(event.key.toLowerCase());
            }
        }
    });

    document.addEventListener('validKey', function (data) {
        span = document.getElementById((data.detail.charId-1)+"_char");
        console.log(span);

    });

    document.addEventListener('invalidKey', function (data) {
        // console.log('Invalid key: '+data.detail.key);
    });

</script>
