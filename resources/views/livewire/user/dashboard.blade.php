<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 justify-center">

        <!-- Continue Learning -->
        @if ($category != NULL)
        <div class="overflow-hidden rounded-lg shadow-lg bg-white mt-4 mx-2 flex flex-col">
            <div class="px-6 py-4 relative">
                <h4 class="mb-3 text-xl font-semibold tracking-tight text-gray-800">Continue learning</h4>
                <p class="leading-normal text-gray-700">
                    Category: {{ $category }}
                </p>
                <p class="leading-normal text-gray-700">
                    Subcategory: {{ $subcategory }}
                </p>
            </div>
            <div class="mt-auto mb-2 px-2">
                <x-buttons.third class="mt-2 w-full">Go!</x-button.third>
            </div>
        </div>
        @endif

        <!-- Chose language -->
        @if (empty(auth()->user()->language))
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



    </div>
</div>
