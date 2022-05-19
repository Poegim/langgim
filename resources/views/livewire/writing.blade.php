<div class="text-gray-200 bg-gray-800 p-6 rounded-md w-8/12 mx-auto mt-12 text-center">

    <div class="flex justify-center h-12">


        <div class="hidden text-red-600" id="failure">
            <x-clarity-times-line class="h12- w-12"/>
        </div>
    </div>

    <div class="h-10">
        <h1 class="mt-5">{{ $word->ua_word }}</h1>
    </div>

    <div>
        <div id="word_div" class="">
            <div class="mt-5 flex justify-center">
                @foreach($guessedChars as $key => $char)
                    <div class="grid grid-cols-1">
                        <div class="w-4">
                            <span> {{$char}} </span>
                        </div>
                        <div class="w-4">
                        <div class="hidden text-green-400" id="success">
                            <x-clarity-success-line class="h-4 w-4"/>
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

        <div id="word_success" class="h-full w-full flex justify-center hidden">
        <x-clarity-success-line class="h-20 w-20 text-green-400"/>
        <div>
    </div>

</div>

<script type="text/javascript">

    allowedKeys = ['A','Ą','B','C','Ć','D','E','Ę','F','G','H','I','J','K','L','Ł','M','N','O','Ó','P','Q','R','S','Ś','T','U','V','W','X','Y','Z','Ż','Ź'];

    document.addEventListener('keydown', function (event) {

        for (const element of allowedKeys) {
            if(element.toLowerCase() == event.key.toLowerCase())
            {
                @this.keyPressed(event.key.toLowerCase());
            }
        }
    });

    document.addEventListener('validKey', function (data) {
        let div;
        div = document.getElementById("success");
        div.classList.remove("hidden");
        setTimeout( function(){
            div.classList.add("hidden");
        }, 500);
    });

    document.addEventListener('invalidKey', function (data) {
        let div;
        div = document.getElementById("failure");
        div.classList.remove("hidden");
        setTimeout( function(){
            div.classList.add("hidden");
        }, 500);
    });

    document.addEventListener('successWord', function (data) {
        let word_div;
        let word_succes;
        word_div = document.getElementById("word_div");
        word_succes = document.getElementById("word_success");

        word_div.classList.add("hidden");
        word_succes.classList.remove("hidden");

        setTimeout( function(){
            word_div.classList.remove("hidden");
            word_succes.classList.add("hidden");
        }, 3000);
    });

</script>
