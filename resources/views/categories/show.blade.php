<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Learning: ') }} {{$category->name}}
        </h2>
    </x-slot>

    <div class="py-2 sm:py-6">
        <div class="max-w-7xl mx-auto">
            <div class="overflow-hidden sm:rounded-lg shadow-lg">
                @if ((!$language == NULL) && in_array($language, config('langgim.allowed_languages')))
                    <livewire:writing
                        :language="$language"
                        :category="$category"
                        :subcategory="$subcategory"
                        >
                @else
                    <div class="overflow-hidden rounded-lg shadow-lg bg-white flex flex-col">
                        <div class="px-6 py-4">
                            <h4 class="mb-3 text-xl font-semibold tracking-tight text-gray-800">Choose language</h4>
                            <div class="flex mt-2">
                                <span class="flex mr-2 h-5 w-5 cursor-pointer" x-data="{ tooltip: false }"
                                x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                                class="ml-2 h-5 w-5 cursor-pointer">

                                <x-tni-info-circle-o class="w-6 h-6 text-blue-500" />

                                <div x-show="tooltip" x-cloak class="text-sm text-white absolute bg-blue-400 rounded-lg p-2
                                transform translate-x-3">
                                Nie wybrałeś języka, zrób to w zakładce profil.
                                </div>
                                </span>
                                <p class="flex leading-normal text-gray-700">
                                    You didnt choose your language, go to profile page to do that.
                                </p>
                            </div>
                        </div>
                        <div class="mt-auto mb-2 px-2">
                            <a href="{{route('profile.show')}}">
                                <x-buttons.third class="mt-2 w-full">Lets go!</x-button.third>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
