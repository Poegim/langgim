<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            {{ __('Choose category') }}
        </h2>
    </x-slot>

    <div>
        @if ((!$language == NULL) && in_array($language, config('langgim.allowed_languages')))
        @foreach ($categories as $category)

            @if ((auth()->check()) && ($category->this_language_words != 0))

            <div class="overflow-hidden border-b border-slate-700 bg-slate-800" x-data="{ open: false }">
                <div class="flex justify-start min-w-min overflow-hidden">
                    <button type="button" x-cloak x-on:click="open = ! open" :class="open ? '' : 'rotate-180'" class="mx-auto p-1 text-gray-300 hover:text-pink-600 transition-all duration-500">
                        <x-heroicon-s-chevron-up class="w-6 h-6"/>
                    </button>
                    @if ($category->{$language} != NULL)
                        <div class="my-auto ml-2 cursor-pointer" x-data="{ tooltip: false }"
                        x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                        class="cursor-pointer">

                        <img src="{{asset('images/flags/'.$language.'.svg')}}" alt="{{$language}}" class="w-8 h-8 my-auto">

                            <div x-show="tooltip" x-cloak class="pl-2 text-sm text-gray-200 absolute bg-blue-400 rounded-lg p-2
                            transform translate-y-2">
                                {{ $category->{$language} }}
                            </div>
                        </div>
                    @endif

                    <div class="bg-slate-800 w-full pl-2 py-2 flex space-x-2">
                        <a href="{{route('category.show', [$category])}}" class="w-full hover:text-white hover:ml-1 transition-all duration-100 hover:font-bold">
                            <p>
                                <h1 class="text-base sm:text-xl uppercase">{{$category->name}}</h1>
                            </p>
                        </a>
                    </div>

                    <div class="flex justify-start">
                        <div class="flex my-auto overflow-hidden mr-1">
                            @if ($category->learned_words != 0)
                            <livewire:categories.reset :category="$category" :subcategory="NULL">
                            @endif
                        </div>

                        <div class="bg-slate-700 text-gray-300 text-xs sm:text-sm w-12 flex">
                            <div class="m-auto">
                                {{round(($category->learned_words/$category->this_language_words)*100), 0}}%
                            </div>
                        </div>
                    </div>

                </div>

                <div x-show="open" x-cloak x-collapse.duration.500ms>
                    @foreach ($category->subcategories as $subcategory)
                    @if ($subcategory->this_language_words != 0)
                    <div class="flex justify-start min-w-min bg-slate-900">
                        <div class=" w-full px-6 py-2 flex space-x-2">
                            <img src="{{asset('images/flags/'.$language.'.svg')}}" alt="{{$language}}" class="w-5 h-5 my-auto">
                            <a href="{{route('category.show', [$category, $subcategory])}}" class="w-full hover:text-white hover:font-bold transition-all duration-100">
                                <p>
                                    <h1 class="text-sm sm:text-lg">{{$subcategory->name}}</h1>
                                </p>
                            </a>
                        </div>
                        <div class="flex justify-start">
                            <div class="flex my-auto overflow-hidden mr-1">
                                @if ($subcategory->learned_words != 0)
                                <livewire:categories.reset :category="$category" :subcategory="$subcategory">
                                    @endif
                            </div>

                            <div class="bg-slate-700 text-gray-300 text-xs sm:text-sm w-12 flex">
                                <div class="m-auto">
                                    {{round(($subcategory->learned_words/$subcategory->this_language_words)*100), 0}}%
                                </div>
                            </div>
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
    </div>


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
