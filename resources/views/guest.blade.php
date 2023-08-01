<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            {{ __('Guest mode') }}
        </h2>
    </x-slot>

    <div class="py-2 sm:py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                @if ((!$language == NULL) && in_array($language, config('langgim.allowed_languages')))
                <livewire:writing :language="$language">
                    @else
                    <div class="flex justify-center">
                        <div class="w-full sm:max-w-md px-6 py-4 bg-slate-800 shadow-md overflow-hidden sm:rounded-lg">

                            <div class="mb-4 flex justify-center">
                                <span class="text-xl uppercase text-gray-300 md:tracking-widest">
                                    Choose your language:
                                </span>
                            </div>

                            @foreach (config('langgim.allowed_languages') as $language)
                            <div class="flex justify-around">
                                <div class="flex space-x-4 mb-4">
                                    <div class="shadow rounded-lg">
                                        <a href="{{route('guest', $language)}}" class="flex relative hover:opacity-90">
                                            <img src="{{asset('/images/flags/'.$language.'.svg')}}"
                                            class="w-16 sm:w-24 rounded-md shadow z-30">
                                            <img src="{{asset('/images/flags/polish.svg')}}"
                                            class="w-16 sm:w-24 rounded-md -right-10 sm:-right-16 absolute shadow hover:none">
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-3 sm:mt-6">
                                    <span class="h-1 uppercase text-sm md:text-md">{{Illuminate\Support\Str::limit($language, 3, '')}} - POL</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
            </div>
        </div>
    </div>

</x-app-layout>
