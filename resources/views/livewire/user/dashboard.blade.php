<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 justify-center mb-4 mr-2">

        <!-- Continue Learning -->
        <!-- Couldnt be just passed a null if subcategory is a null? -->
        @if ($category != NULL)
        <div class="overflow-hidden rounded-lg shadow-lg bg-slate-800 mt-2 mx-2 flex flex-col">
            <div class="p-4 relative">

                @if($subcategory != NULL)
                <a href="{{route('category.show', [$category, $subcategory])}}">
                    <x-buttons.third class="w-full">
                        <div>Continue learning</div>
                    </x-button.third>
                </a>
                @else
                <a href="{{route('category.show', [$category])}}">
                    <x-buttons.secondary class="w-full">
                        <div>Continue learning</div>
                    </x-button.secondary>
                </a>
                @endif
                <div class="flex mt-2">
                    <span class="flex mr-2 h-5 w-5 cursor-pointer" x-data="{ tooltip: false }"
                    x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                    class="ml-2 h-5 w-5 cursor-pointer">

                    <x-tni-info-circle-o class="w-6 h-6 text-blue-500" />

                    <div x-show="tooltip" x-cloak class="text-sm text-gray-200 absolute bg-blue-400 rounded-lg p-2
                    transform translate-x-3">
                    Kategoria
                    </div>
                    </span>
                    <p class="flex leading-normal">
                        Category: {{ $category->name }}
                    </p>
                </div>
                @if($subcategory != NULL)
                <div class="flex mt-2">
                    <span class="flex mr-2 h-5 w-5 cursor-pointer" x-data="{ tooltip: false }"
                    x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                    class="ml-2 h-5 w-5 cursor-pointer">

                    <x-tni-info-circle-o class="w-6 h-6 text-blue-500" />

                    <div x-show="tooltip" x-cloak class="text-sm text-gray-200 absolute bg-blue-400 rounded-lg p-2
                    transform translate-x-3">
                    Podkategoria
                    </div>
                    </span>
                    <p class="flex leading-normal">
                        Subcategory: {{ $subcategory->name }}
                    </p>
                </div>
                @endif

            </div>

        </div>
        @endif

        <!-- Chose language -->
        @if (empty(auth()->user()->language))
        <x-choose-language />
        @endif

    </div>
</div>
