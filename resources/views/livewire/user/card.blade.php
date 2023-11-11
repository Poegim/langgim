<div>
    <section class="flex font-medium items-center justify-center">

        <section class="w-full mx-auto bg-slate-800 rounded px-4 py-4 shadow-lg mt-4">
            <div class="flex items-center justify-between">
                <span class="text-gray-400 text-sm">{{__('messages.Time spend')}}: {{auth()->user()->timer()}}</span>

                <span class="text-blue-400 hover:text-blue-200 transition-all duration-300 relative">
                    @if (auth()->user()->language === '')
                    <span class="flex h-3 w-3 absolute -right-2 -top-2 z-10">
                        <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                        <span class="inline-flex rounded-full h-3 w-3 bg-pink-500"></span>
                    </span>
                    @endif
                    <a href="{{ route('profile.show') }}">
                        <x-clarity-settings-solid class="h-8 w-8 hover:rotate-90 transition-all duration-1000"/>
                    </a>
                </span>

            </div>
            <div class="mt-6 mx-auto w-fit">
                <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}"
                    class="rounded-full h-28 w-28 object-cover">
            </div>

            <div class="mt-8 ">
                <h2 class="text-white font-bold text-2xl tracking-wide">{{ Auth::user()->name }}</h2>
            </div>
            <p class="text-blue-400 font-semibold ">
                {{__('messages.'.auth()->user()->level())}}
            </p>
            <div class="h-1 w-full bg-black mt-8 rounded-full">
                <div class="h-1 rounded-full {{$class}} bg-yellow-500 "></div>
            </div>

            <div class="flex justify-between">

                <div class="mt-2 text-white text-sm">
                    <span class="text-gray-400 font-semibold capitalize">{{__('messages.writing')}}</span>
                    <span>{{$levelStatus}}%</span>
                </div>

                {{-- <div class="mt-2 text-white text-sm">
                    <span class="text-gray-400 font-semibold">Ratio:</span>
                    <span>25%</span>
                </div> --}}

            </div>
            <div class="flex justify-between">
                <div class="mt-2 text-white text-sm">
                    <span class="text-gray-400 font-semibold capitalize">{{__('messages.words')}}:</span>
                    <span>{{$learnedWordsOnLevel}}</span>
                </div>
                {{-- <div class="mt-2 text-white text-sm">
                    <span class="text-gray-400 font-semibold">Quiz points:</span>
                    <span>999</span>
                </div> --}}
            </div>
            {{-- <div class="flex justify-between">
                <div class="mt-2 text-white text-sm">
                    <span class="text-gray-400 font-semibold">Tests:</span>
                    <span>16/32</span>
                </div>
                <div class="mt-2 text-white text-sm">

                </div>
            </div> --}}

        </section>
    </section>
</div>
