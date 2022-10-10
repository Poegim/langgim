<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 justify-center">

        <!-- Continue Learning -->
        @if ($category != NULL)
        <div class="overflow-hidden rounded-lg shadow-lg bg-white mt-4 mx-2 flex flex-col">
            <div class="p-4 relative">

                @if($subcategory != NULL)
                <a href="{{route('category.show', [$category, $subcategory])}}">
                    <x-buttons.third class="mt-2 w-full">Continue learning</x-button.third>
                </a>
                @else
                <a href="{{route('category.show', [$category])}}">
                    <x-buttons.third class="mt-2 w-full">Continue learning</x-button.third>
                </a>
                @endif

                <p class="leading-normal text-gray-700 mt-6">
                    Category: {{ $category->name }}
                </p>
                @if($subcategory != NULL)
                <p class="leading-normal text-gray-700">
                    Subcategory: {{ $subcategory->name }}
                </p>
                @endif

            </div>

        </div>
        @endif

        <!-- Chose language -->
        @if (empty(auth()->user()->language))
        <div class="overflow-hidden rounded-lg shadow-lg bg-white mx-2 mt-4 flex flex-col">
            <div class="p-4">
                <a href="{{route('profile.show')}}">
                    <x-buttons.third class="mt-2 w-full">Choose language!</x-button.third>
                </a>
                <p class="leading-normal text-gray-700 mt-6">
                    You didnt choose your language, go to profile page to do that.
                </p>
                <p class="leading-normal text-gray-700 mt-2">
                    Nie wybrałeś języka, zrób to w zakładce profil.
                </p>
            </div>
        </div>
        @endif

    </div>
</div>
