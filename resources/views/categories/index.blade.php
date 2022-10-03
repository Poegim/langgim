<x-app-layout>


{{-- @foreach ($categories as $category)

    @foreach ($category->words as $word)

    {{ dump($word->userWords->isEmpty()) }}<br>

    {{ $loop->count}} words count <br>

    {{$loop->iteration}} word iteration, <br>
    {{$loop->parent->iteration}}, category iteration

    @endforeach
@endforeach --}}

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
                {{$category->name}} ({{$category->learned_words}}/{{$category->words->count()}})
            </a>
            <div class="mr-3 flex">

                <span class="mr-2 h-5 w-5 cursor-pointer"
                        x-data="{ tooltip: false }"
                        x-on:mouseover="tooltip = true"
                        x-on:mouseleave="tooltip = false"
                        class="ml-2 h-5 w-5 cursor-pointer">

                        <x-tni-tick-circle-o class="w-6 h-6 text-blue-500"/>

                        <div
                        x-show="tooltip"
                        class="text-sm text-white absolute bg-blue-400 rounded-lg p-2
                        transform translate-y-2">
                            This category has been fully learned.
                         </div>

                        </span>

                <livewire:categories.reset
                :category="$category"
                :subcategory="NULL"
                >
                </div>
        </div>

        <ul class="divide-y-2 divide-gray-100">
            @foreach ($category->subcategories as $subcategory)
                <div class="flex p-3 ml-4 justify-between">
                    <li>
                        <a href="{{route('category.show', [$category, $subcategory])}}">
                            {{$subcategory->name}} ({{$subcategory->learned_words}}/{{$subcategory->words->count()}})
                        </a>
                    </li>
                    <div class="flex">

                        <span class="mr-2 h-5 w-5 cursor-pointer"
                        x-data="{ tooltip: false }"
                        x-on:mouseover="tooltip = true"
                        x-on:mouseleave="tooltip = false"
                        class="ml-2 h-5 w-5 cursor-pointer">

                        <x-tni-tick-circle-o class="w-6 h-6 text-blue-500"/>

                        <div
                        x-show="tooltip"
                        class="text-sm text-white absolute bg-blue-400 rounded-lg p-2
                        transform translate-y-2">
                            This category has been fully learned.
                         </div>

                        </span>

                        <livewire:categories.reset
                        :category="$category"
                        :subcategory="$subcategory"
                        >
                    </div>
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
