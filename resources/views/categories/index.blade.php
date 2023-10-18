<x-app-layout>
    <x-slot name="header">
        {{ __('Choose category') }}
    </x-slot>
    <div class="max-w-7xl mx-auto sm:py-10 sm:px-6 lg:px-8">
        @if ((!$language == NULL) && in_array($language, config('langgim.allowed_languages')))
        <div class="rounded overflow-hidden">
            @foreach ($categories as $category)

                @if ((auth()->check()) && ($category->this_language_words != 0))

                <div class="overflow-hidden border-b border-slate-700 hover:bg-blue-500 bg-slate-800" x-cloak x-data="{ open: false }">
                    <div class="flex justify-start min-w-min overflow-hidden">
                        <button type="button" x-on:click="open = ! open" :class="open ? '' : 'rotate-180'" class="mx-auto p-1 text-gray-300 hover:text-pink-600 transition-all duration-500">
                            <x-heroicon-s-chevron-up class="w-6 h-6 rounded-full bg-slate-900 p-1"/>
                        </button>

                        <a href="{{route('category.show', [$category])}}" class="w-full hover:text-white hover:ml-1 transition-all duration-100 hover:font-bold p-2">
                            <div class="w-full">
                                <p>
                                    <h1 class="text-sm sm:text-xl uppercase">{{$category->name}}</h1>
                                </p>
                                <div class="text-xs sm:text-sm italic">
                                    {{ $category->{$language} }}
                                </div>
                            </div>
                        </a>

                        <div class="flex justify-start">
                            <div class="flex my-auto overflow-hidden mr-1">
                                @if ($category->learned_words != 0)
                                <livewire:categories.reset :categoryId="$category->id" :subcategoryId="NULL">
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
                            <a href="{{route('category.show', [$category, $subcategory])}}" class="hover:bg-slate-700 w-full hover:text-white hover:font-bold transition-all duration-100 p-2">
                                <div class="w-full">
                                    <p>
                                        <h1 class="text-sm sm:text-lg">{{$subcategory->name}}</h1>
                                    </p>
                                </div>
                                <div class="text-xs sm:text-sm italic">
                                    {{ $subcategory->{$language} }}
                                </div>
                            </a>
                            <div class="flex justify-start">
                                <div class="flex my-auto overflow-hidden mr-1">
                                    @if ($subcategory->learned_words != 0)
                                    <livewire:categories.reset :categoryId="$category->id" :subcategoryId="$subcategory->id">
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

                <div class="overflow-hidden border-b border-slate-700 hover:bg-blue-500 bg-slate-800" x-cloak x-data="{ open: false }">
                    <div class="flex justify-start min-w-min overflow-hidden">
                        <button type="button" x-on:click="open = ! open" :class="open ? '' : 'rotate-180'" class="mx-auto p-1 text-gray-300 hover:text-pink-600 transition-all duration-500">
                            <x-heroicon-s-chevron-up class="w-6 h-6 rounded-full bg-slate-900 p-1"/>
                        </button>

                        <a href="{{route('category.show', [$category])}}" class="w-full hover:text-white hover:ml-1 transition-all duration-100 hover:font-bold p-2">
                            <div class="w-full">
                                <p>
                                    <h1 class="text-sm sm:text-xl uppercase">{{$category->name}}</h1>
                                </p>
                                <div class="text-xs sm:text-sm italic">
                                    {{ $category->{$language} }}
                                </div>
                            </div>
                        </a>
                    </div>

                    <div x-show="open" x-cloak x-collapse.duration.500ms>
                        @foreach ($category->subcategories as $subcategory)
                        @if ($subcategory->this_language_words != 0)
                        <div class="flex justify-start min-w-min bg-slate-900">
                            <a href="{{route('category.show', [$category, $subcategory])}}" class="hover:bg-slate-700 w-full hover:text-white hover:font-bold transition-all duration-100 p-2">
                                <div class="w-full">
                                    <p>
                                        <h1 class="text-sm sm:text-lg">{{$subcategory->name}}</h1>
                                    </p>
                                </div>
                                <div class="text-xs sm:text-sm italic">
                                    {{ $subcategory->{$language} }}
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>

                </div>

                @endif
                @endguest

            @endforeach
        </div>
        @else
        <x-choose-language />
        </div>
        @endif
    </div>
</x-app-layout>
