<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            {{ __('Guest mode') }}
        </h2>
    </x-slot>

    <div class="p-2">
        <div class="max-w-7xl mx-auto">
            <div class="overflow-hidden sm:rounded-lg">
                @if ((!$language == NULL) && in_array($language, config('langgim.allowed_languages')))
                <livewire:writing :language="$language">
                    @else
                    <div class="flex justify-center">
                        <div class="w-full sm:max-w-md px-4 py-4 bg-slate-800 shadow-md overflow-hidden sm:rounded">

                            <div class="mb-4 flex justify-center">
                                <span class="text-xl uppercase text-gray-300 md:tracking-widest">
                                    Choose your language:
                                </span>
                            </div>

                            @foreach (config('langgim.allowed_languages') as $language)

                            <a href="{{route('guest', $language)}}" class="">
                                <div class="flex justify-around hover:bg-purple-900 transition-all duration-300 rounded border border-slate-700 my-2">
                                    <div class="flex space-x-4 py-2">
                                        <div class="shadow rounded-lg flex relative">
                                            <img src="{{asset('/images/flags/'.$language.'.svg')}}"
                                                class="w-16 sm:w-24 rounded-md shadow z-30">
                                            <img src="{{asset('/images/flags/polish.svg')}}"
                                                class="w-16 sm:w-24 rounded-md -right-10 sm:-right-16 absolute shadow hover:none">
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <span
                                            class="h-1 uppercase text-sm md:text-lg font-semibold">{{Illuminate\Support\Str::limit($language, 3, '')}}
                                            - POL
                                        </span>
                                    </div>
                                </div>
                            </a>

                            @endforeach
                        </div>
                    </div>
                    @endif
            </div>
        </div>
    </div>

</x-app-layout>
