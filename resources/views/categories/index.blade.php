<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Choose category') }}
        </h2>
    </x-slot>

    @if ((!$language == NULL) && in_array($language, config('langgim.allowed_languages')))

    @foreach ($categories as $category)
    <div class="overflow-hidden rounded-lg shadow-lg bg-white mt-4 sm:mx-2 flex flex-col p-4">
        <div class="font-extrabold flex justify-between">
            <a href="{{route('category.show', [$category])}}">
                {{$category->name}}
            </a>
            <span class="mr-3">
                <livewire:categories.reset
                :category="$category"
                :subcategory="NULL"
                >
            </span>
        </div>

        <ul class="divide-y-2 divide-gray-100">
            @foreach ($category->subcategories as $subcategory)
                <div class="flex p-3 ml-4 justify-between">
                    <li>
                        <a href="{{route('category.show', [$category, $subcategory])}}">
                            {{$subcategory->name}}
                        </a>
                    </li>
                    <livewire:categories.reset
                    :category="$category"
                    :subcategory="$subcategory"
                    >
                </div>
            @endforeach
        </ul>
    </div>
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
