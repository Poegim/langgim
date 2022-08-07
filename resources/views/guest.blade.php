<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Guest mode') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                @if ((!$language == NULL) && in_array($language, $allowedLanguages))
                    <livewire:writing :language="$language">
                @else
                    <div class="flex justify-center space-x-4">
                        <a href="{{route('guest', 'ukrainian')}}">
                            <img src="{{asset('/images/flags/ua.svg')}}" class="w-24 hover:opacity-90 rounded-md">
                        </a>

                        <a href="{{route('guest', 'english')}}">
                        <img src="{{asset('/images/flags/gb.svg')}}" class="w-24 hover:opacity-90 rounded-md">
                        </a>

                        <a href="{{route('guest', 'german')}}">
                        <img src="{{asset('/images/flags/de.svg')}}" class="w-24 hover:opacity-90 rounded-md">
                        </a>

                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
