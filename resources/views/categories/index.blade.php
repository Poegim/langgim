<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Choose category') }}
        </h2>
    </x-slot>

    @if ((!$language == NULL) && in_array($language, config('langgim.allowed_languages')))
    @foreach ($categories as $category)

        @if ((auth()->check()) && ($category->this_language_words != 0))

        <div class="overflow-hidden rounded-lg shadow-lg bg-white mt-4 sm:mx-2 flex flex-col p-4">
            <div class="font-extrabold flex justify-between">
                <a href="{{route('category.show', [$category])}}">
                    {{$category->name}} ({{$category->learned_words}}/{{$category->this_language_words}})
                </a>
                <div class="mr-3 flex">

                    @if ($category->learned_words == $category->this_language_words)
                    <span class="mr-2 h-5 w-5 cursor-pointer" x-data="{ tooltip: false }" x-on:mouseover="tooltip = true"
                        x-on:mouseleave="tooltip = false" class="ml-2 h-5 w-5 cursor-pointer">

                        <x-tni-tick-circle-o class="w-6 h-6 text-blue-500" />

                        <div x-show="tooltip" class="text-sm text-white absolute bg-blue-400 rounded-lg p-2
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

            <ul class="divide-y-2 divide-gray-100">
                @foreach ($category->subcategories as $subcategory)
                @if ($subcategory->this_language_words != 0)
                <div class="flex p-3 ml-4 justify-between">
                    <li>
                        <a href="{{route('category.show', [$category, $subcategory])}}">
                            {{$subcategory->name}} ({{$subcategory->learned_words}}/{{$subcategory->this_language_words}})
                        </a>
                    </li>
                    <div class="flex">
                        @if ($subcategory->learned_words == $subcategory->this_language_words)

                        <span class="mr-2 h-5 w-5 cursor-pointer" x-data="{ tooltip: false }"
                            x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                            class="ml-2 h-5 w-5 cursor-pointer">

                            <x-tni-tick-circle-o class="w-6 h-6 text-blue-500" />

                            <div x-show="tooltip" class="text-sm text-white absolute bg-blue-400 rounded-lg p-2
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
        @if($category->this_language_words != 0)
        <div class="overflow-hidden rounded-lg shadow-lg bg-white mt-4 sm:mx-2 flex flex-col p-4">
            <div class="font-extrabold flex justify-between">
                <a href="{{route('category.show', [$category])}}">
                    {{$category->name}}
                </a>
                <div class="mr-3 flex">

                </div>
            </div>

            <ul class="divide-y-2 divide-gray-100">
                @foreach ($category->subcategories as $subcategory)
                <div class="flex p-3 ml-4 justify-between">
                    <li>
                        <a href="{{route('category.show', [$category, $subcategory])}}">
                            {{$subcategory->name}}
                        </a>
                    </li>
                    <div class="flex">

                    </div>
                </div>

            @endforeach

            </ul>
        </div>
        @endif

    @endforeach

    @else
    <div class="overflow-hidden rounded-lg shadow-lg bg-white mx-2 mt-4 flex flex-col">
        <div class="px-6 py-4">
            <h4 class="mb-3 text-xl font-semibold tracking-tight text-gray-800">Choose language</h4>
            <p class="leading-normal text-gray-700">
                You didnt choose your language, go to profile page to do that.
            </p>
            <p class="leading-normal text-gray-700 mt-2">
                Nie wybrałeś języka, zrób to w zakładce profil.
            </p>
        </div>
        <div class="mt-auto mb-2 px-2">
            <a href="{{route('profile.show')}}">
                <x-buttons.third class="mt-2 w-full">Lets go!</x-button.third>
            </a>
        </div>
    </div>
    @endif

</x-app-layout>
