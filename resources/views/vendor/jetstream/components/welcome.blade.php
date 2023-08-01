<div class="p-6 sm:px-20 bg-black">
    <div class="mt-8 text-2xl text-center">
        Select native language:
    </div>

    <div class="my-8 text-gray-500 grid grid-cols-3">

        @foreach (config('countries') as $key => $country)
        <div>
            <a href="" class="text-gray-200 hover:text-gray-300">
                <div class="flex justify-center text-lg">
                    {{$country}}
            </div>
            <div class="flex justify-center">
                <img src="{{asset('/storage/images/flags/'.$key.'.svg')}}" class="w-24 hover:opacity-90 rounded-md">
            </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
