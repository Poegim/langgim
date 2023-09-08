<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            {{ __('Choose category') }}
        </h2>
    </x-slot>


    @if ((!$language == NULL) && in_array($language, config('langgim.allowed_languages')))
    @foreach ($categories as $category)

        @if ((auth()->check()) && ($category->this_language_words != 0))

        <div class="overflow-hidden border-b border-slate-700" x-data="{ open: true }">
            <div class="flex justify-start min-w-min">
                <div class="bg-slate-800 w-full px-4 py-2 flex space-x-2">
                    <img src="{{asset('images/flags/'.$language.'.svg')}}" alt="{{$language}}" class="w-5 h-5 my-auto">
                    <p>
                        <h1 class="text-base sm:text-2xl">{{$category->name}}</h1>
                    </p>
                </div>
                <button type="button" x-on:click="open = ! open"><x-heroicon-s-chevron-up-down class="w-6 h-6"/></button>
            </div>

            <div x-show="open" x-collapse.duration.700ms>
                @foreach ($category->subcategories as $subcategory)
                @if ($subcategory->this_language_words != 0)
                <div class="flex justify-start min-w-min">
                    <div class="bg-slate-900 w-full px-6 py-2 flex space-x-2">
                        <img src="{{asset('images/flags/'.$language.'.svg')}}" alt="{{$language}}" class="w-5 h-5 my-auto">
                        <p>
                            <h1 class="text-sm sm:text-lg">{{$subcategory->name}}</h1>
                        </p>
                    </div>
                </div>
                @endif
                @endforeach
            </div>

        </div>
        @endif


        @guest
        @if($category->this_language_words != 0)

            @foreach ($category->subcategories as $subcategory)
            @if ($subcategory->this_language_words != 0)

            @endif
            @endforeach

        @endif
        @endguest

    @endforeach
    @endif



    <!-- OLD  -->



    @if ((!$language == NULL) && in_array($language, config('langgim.allowed_languages')))
    @foreach ($categories as $category)

        @if ((auth()->check()) && ($category->this_language_words != 0))

        <div class="overflow-hidden rounded-lg shadow-lg bg-slate-800 mt-4 sm:mx-2 flex flex-col p-4">
            <div class="flex justify-between">
                <div class="flex">
                    @if ($category->{$language} != NULL)
                    <span class="mr-2 h-5 w-5 cursor-pointer" x-data="{ tooltip: false }"
                    x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                    class="ml-2 h-5 w-5 cursor-pointer">

                    <x-tni-info-circle-o class="w-6 h-6 text-blue-500" />

                    <div x-show="tooltip" x-cloak class="pl-2 text-sm text-gray-200 absolute bg-blue-400 rounded-lg p-2
                    transform translate-y-2">
                        {{ $category->{$language} }}
                    </div>
                    </span>
                    @endif
                    <a href="{{route('category.show', [$category])}}" class="ml-2 h-6 mt-1 sm:mt-0 text-base sm:text-lg">
                        {{$category->name}} ({{$category->learned_words}}/{{$category->this_language_words}})
                    </a>
                </div>
                <div class="mr-3 flex">

                    @if ($category->learned_words == $category->this_language_words)
                    <span class="mr-2 h-5 w-5 cursor-pointer" x-data="{ tooltip: false }" x-on:mouseover="tooltip = true"
                        x-on:mouseleave="tooltip = false" class="ml-2 h-5 w-5 cursor-pointer">

                        <x-tni-tick-circle-o class="w-6 h-6 text-blue-500" />

                        <div x-show="tooltip" x-cloak class="text-sm text-gray-200 absolute bg-blue-400 rounded-lg p-2
                    transform translate-y-2">

                            This category has been fully learned.
                        </div>

                    </span>
                    @endif
                    @if ($category->learned_words != 0)
                    <livewire:categories.reset :category="$category" :subcategory="NULL">
                    @endif
                </div>
            </div>

            <ul class="divide-y divide-opacity-50 divide-slate-500">
                @foreach ($category->subcategories as $subcategory)
                @if ($subcategory->this_language_words != 0)
                <div class="flex p-3 ml-6 justify-between">
                    <li class="flex">
                        @if ($subcategory->{$language} != NULL)
                        <span class="mr-2 h-5 w-5 cursor-pointer" x-data="{ tooltip: false }"
                        x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                        class="ml-2 h-5 w-5 cursor-pointer">

                        <x-tni-info-circle-o class="w-6 h-6 text-blue-500" />

                        <div x-show="tooltip" x-cloak class="text-sm text-gray-200 absolute bg-blue-400 rounded-lg p-2
                        transform translate-y-2">
                            {{ $subcategory->{$language} }}
                        </div>
                        </span>
                        @endif
                        <a href="{{route('category.show', [$category, $subcategory])}}" class="ml-2 h-6 mt-1 text-sm sm:text-base">
                            {{$subcategory->name}} ({{$subcategory->learned_words}}/{{$subcategory->this_language_words}})
                        </a>
                    </li>
                    <div class="flex">
                        @if ($subcategory->learned_words == $subcategory->this_language_words)
                        <span class="mr-2 h-5 w-5 cursor-pointer" x-data="{ tooltip: false }"
                            x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                            class="ml-2 h-5 w-5 cursor-pointer">

                            <x-tni-tick-circle-o class="w-6 h-6 text-blue-500" />

                            <div x-show="tooltip" class="text-sm text-gray-200 absolute bg-blue-400 rounded-lg p-2
                            transform translate-y-2">
                                This category has been fully learned.
                            </div>

                        </span>
                        @endif

                        @if ($subcategory->learned_words != 0)

                        <livewire:categories.reset :category="$category" :subcategory="$subcategory">
                        @endif

                    </div>
                </div>
                @endif
                @endforeach
            </ul>
        </div>
        @endif


        @guest
        @if($category->this_language_words != 0)
        <div class="overflow-hidden rounded-lg shadow-lg bg-slate-800 mt-4 sm:mx-2 flex flex-col p-4">
            <div class="flex justify-between">
                <a href="{{route('category.show', [$category])}}">
                    {{$category->name}}
                </a>
                <div class="mr-3 flex">

                </div>
            </div>

            <ul class="divide-y divide-opacity-50 divide-slate-500">
                @foreach ($category->subcategories as $subcategory)
                @if ($subcategory->this_language_words != 0)
                <div class="flex p-3 ml-4 justify-between">
                    <li>
                        <a href="{{route('category.show', [$category, $subcategory])}}">
                            {{$subcategory->name}}
                        </a>
                    </li>
                    <div class="flex">

                    </div>
                </div>
                @endif
                @endforeach

            </ul>
        </div>
        @endif
        @endguest

    @endforeach

    @else
    <div class="overflow-hidden rounded-lg shadow-lg bg-slate-800 mx-2 mt-4 flex flex-col">
        <div class="px-6 py-4">
            <h4 class="mb-3 text-xl font-semibold tracking-tight ">Choose language</h4>
            <div class="flex mt-2">
                <span class="flex mr-2 h-5 w-5 cursor-pointer" x-data="{ tooltip: false }"
                x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                class="ml-2 h-5 w-5 cursor-pointer">

                <x-tni-info-circle-o class="w-6 h-6 text-blue-500" />

                <div x-show="tooltip" x-cloak class="text-sm text-gray-200 absolute bg-blue-400 rounded-lg p-2
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
                <x-buttons.primary class="mt-2 w-full">Lets go!</x-button.third>
            </a>
        </div>
    </div>
    @endif

</x-app-layout>
