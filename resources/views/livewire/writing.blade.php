<div class="text-gray-200 bg-gray-800 p-6 rounded-md w-8/12 mx-auto mt-12 text-center">



    <div>
        <div id="word_div" class="">
            <div class="h-10">
                <h1 class="mt-5">{{ $word->ua_word }}</h1>
            </div>
            <div class="mt-5 flex justify-center">
                @foreach($guessedChars as $key => $char)
                    <div class="grid grid-cols-1">
                        <div class="w-4">
                            <span> {{$char}} </span>
                        </div>
                        <div class="w-4 h-4">
                            <div class="text-green-400 hidden" id="success_{{$key}}">
                                <x-clarity-success-line class="h-4 w-4"/>
                            </div>
                            <div class="text-red-500 hidden" id="failure_{{$key}}">
                                <x-clarity-times-line class="h-4 w-4"/>
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

        <div id="word_success" class="h-full w-full hidden">
            <div class="flex justify-center">
                <x-clarity-success-line class="h-20 w-20 text-green-400"/>
            </div>
            <div class="text-center">
                {{$word->sample_sentence}}
            </div>
            <div class="mt-4">
                <x-buttons.primary onclick="hideSuccess()">Następne</x-buttons.primary>
            </div>
        </div>

        <div id="word_failure" class="h-full w-full hidden">
		<div class="">
			{{$word->pl_word}}
		</div>
        	<div class="flex justify-center">
                	<x-clarity-times-line class="h-20 w-20 text-red-500"/>
		</div>
            <div class="text-center">
                {{$word->sample_sentence}}
            </div>
            <div class="mt-4">
		<x-buttons.third onclick="hideFailure()">Następne</x-buttons.third>
            </div>
        </div>


    </div>

</div>

<script type="text/javascript">

    allowedKeys = ['A','Ą','B','C','Ć','D','E','Ę','F','G','H','I','J','K','L','Ł','M','N','O','Ó','P','Q','R','S','Ś','T','U','V','W','X','Y','Z','Ż','Ź'];

    document.addEventListener('keydown', function (event) {
    
        let word_failure;
        let word_succes;
        word_failure = document.getElementById("word_failure");
        word_success = document.getElementById("word_success");
	
	if((word_failure.classList.contains('hidden'))  && (word_success.classList.contains('hidden')))
	{
       		for (const element of allowedKeys) {
            	if(element.toLowerCase() == event.key.toLowerCase())
            	{
               	 @this.keyPressed(event.key.toLowerCase());
       		}
        	}
	}
    });

    document.addEventListener('validKey', function (data) {
        let div;
        div = document.getElementById("success_"+(data.detail.charNumber-1));
        div.classList.remove("hidden");
        setTimeout( function(){
            div.classList.add("hidden");
        }, 500);
    });

    document.addEventListener('invalidKey', function (data) {
        let div;
        div = document.getElementById("failure_"+(data.detail.charNumber-1));
        div.classList.remove("hidden");
        setTimeout( function(){
            div.classList.add("hidden");
        }, 500);
    });

    document.addEventListener('successWord', function () {
        let word_div;
        let word_succes;
        word_div = document.getElementById("word_div");
        word_succes = document.getElementById("word_success");

        word_div.classList.add("hidden");
        word_succes.classList.remove("hidden");


    });

    document.addEventListener('failureWord', function () {
        let word_div;
        let word_failure;
        word_div = document.getElementById("word_div");
        word_failure = document.getElementById("word_failure");

        word_div.classList.add("hidden");
        word_failure.classList.remove("hidden");

    });

    function hideSuccess() {
        @this.loadWord();
        let word_div;
        let word_succes;
        word_div = document.getElementById("word_div");
        word_succes = document.getElementById("word_success");
        word_div.classList.remove("hidden");
        word_succes.classList.add("hidden");
    };

	function hideFailure() {
   	@this.loadWord();
       	let word_div;
        let word_failure;
        word_div = document.getElementById("word_div");
        word_succes = document.getElementById("word_failure");
        word_div.classList.remove("hidden");
        word_succes.classList.add("hidden");
    }

</script>
