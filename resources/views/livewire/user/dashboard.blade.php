<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 justify-center mb-4 gap-2">

        <!-- Continue Learning -->
        <!-- Couldnt be just passed a null if subcategory is a null? -->
        @if ($category != NULL)
        <div class="rounded-lg shadow-lg bg-slate-800 flex flex-col">
            <div class="p-2 relative">

                @if($subcategory != NULL)
                <a href="{{route('category.show', ['typing', $category, $subcategory->slug])}}">
                    <x-buttons.third class="w-full">
                        <div>Continue writing</div>
                    </x-button.third>
                </a>
                @else
                <a href="{{route('category.show', ['typing', $category])}}">
                    <x-buttons.secondary class="w-full">
                        <div>Continue writing</div>
                    </x-button.secondary>
                </a>
                @endif

                <div class="flex justify-between mt-2">
                    <p class="flex leading-normal">
                        Category: {{ $category->{$language} }}
                    </p>
                    <span class="flex mr-2 h-5 w-5 cursor-pointer" x-data="{ tooltip: false }"
                    x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                    class="ml-2 h-5 w-5 cursor-pointer">

                    <x-tni-info-circle-o class="w-6 h-6 text-blue-500" />

                    <div x-show="tooltip" x-cloak class="text-sm text-gray-200 absolute bg-blue-900 rounded-lg p-2
                    transform translate-x-8">
                    {{ $category->name }}
                    </div>
                    </span>

                </div>

                @if($subcategory != NULL)
                <div class="flex mt-2">
                    <span class="flex mr-2 h-5 w-5 cursor-pointer" x-data="{ tooltip: false }"
                    x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                    class="ml-2 h-5 w-5 cursor-pointer">

                    <x-tni-info-circle-o class="w-6 h-6 text-blue-500" />

                    <div x-show="tooltip" x-cloak class="text-sm text-gray-200 absolute bg-blue-400 rounded-lg p-2
                    transform translate-x-3">
                    {{ $subcategory->name }}
                    </div>
                    </span>
                    <p class="flex leading-normal">
                        Subcategory: {{ $subcategory->{$language} }}
                    </p>
                </div>
                @endif


            </div>

        </div>
        @else
            <div class="rounded-lg shadow-lg bg-slate-800 flex flex-col">
                <div class="p-2 relative">
                    <a href="{{route('category.show', ['typing', $category])}}">
                        <x-buttons.secondary class="w-full">
                            <div>{{ __("Zacznij pisać") }}</div>
                        </x-button.secondary>
                    </a>
                    <div class="mt-2">
                        {{ __("Jeszcze nie próbowałeś pisać, sprawdź się teraz.") }}
                    </div>
                </div>
            </div>
        @endif

        <!-- Chose language -->
        @if (empty(auth()->user()->language))
        <x-choose-language />
        @endif

    </div>
</div>
