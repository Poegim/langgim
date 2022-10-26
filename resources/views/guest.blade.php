<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Guest mode') }}
        </h2>
    </x-slot>

    <div class="py-2 sm:py-6">

        <div class="mt-10 flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100">

            <div>
                    <span class="text-2xl">
                        Choose your language:
                    </span>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="flex justify-center">

                    <div class="font-thin">
                        <div class="overflow-hidden sm:rounded-lg">
                            @if ((!$language == NULL) && in_array($language, config('langgim.allowed_languages')))
                                <livewire:writing :language="$language">
                            @else
                            <div class="flex justify-center space-x-4">
                                @foreach (config('langgim.allowed_languages') as $language)
                                    <div>
                                        <a href="{{route('guest', $language)}}">
                                            <img src="{{asset('/images/flags/'.$language.'.svg')}}" class="w-24 hover:opacity-90 rounded-md">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        </div>
    </div>
</x-app-layout>
