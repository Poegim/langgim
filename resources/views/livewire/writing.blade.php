<div class="text-gray-200 bg-gray-800 p-6 rounded-md w-8/12 mx-auto mt-12 text-center">
    
    <div class="flex justify-center h-12">
        <div class="hidden text-green-400" id="success">
            <x-clarity-success-line class="h12- w-12"/>
        </div>

        <div class="hidden text-red-600" id="failure">
            <x-clarity-times-line class="h12- w-12"/>
        </div>
    </div>

    <div class="h-10">
        <h1 class="mt-5">{{ $word->ua_word }}</h1>
    </div>

    <div>
        <h1 class="mt-5">
            @foreach($guessedChars as $key => $char)
                <span> {{$char}} </span>
            @endforeach
        </h1>
        <h1 class="pt-5 h-16"> {{ $lastKey }} </h1>
    </div>

    <div class="h-10">
        <p>Actual char: {{ $charNumber+1 }}</p>
        <p>Word legth: {{ $wordLength }} </p>
    </div>

</div>

<script type="text/javascript">

    allowedKeys = ['A','Ą','B','C','Ć','D','E','Ę','F','G','H','I','J','K','L','Ł','M','N','O','Ó','P','Q','R','S','Ś','T','U','V','W','X','Y','Z','Ż','Ź'];

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

</script>
