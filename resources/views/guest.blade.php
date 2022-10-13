<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Guest mode') }}
        </h2>
    </x-slot>

    <div class="py-2 sm:py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                @if ((!$language == NULL) && in_array($language, config('langgim.allowed_languages')))
                    <livewire:writing :language="$language">
                @else
                    @foreach (config('langgim.allowed_languages') as $language)
                    <div class="flex justify-center space-x-4">
                        <a href="{{route('guest', $language)}}">
                            <img src="{{asset('/images/flags/'.$language.'.svg')}}" class="w-24 hover:opacity-90 rounded-md">
                        </a>

                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
