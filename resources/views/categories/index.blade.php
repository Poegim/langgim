<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Choose category') }}
        </h2>
    </x-slot>

    @foreach ($categories as $category)
    <div class="overflow-hidden rounded-lg shadow-lg bg-white mt-4 sm:mx-2 flex flex-col p-4">
        <span class="font-extrabold">
            <a href="{{route('category.show', [$category])}}">
                {{$category->name}}
            </a>
        </span>

        <ul class="divide-y-2 divide-gray-100">
            @foreach ($category->subcategories as $subcategory)
                <li class="p-3 ml-4">
                    <a href="{{route('category.show', [$category, $subcategory])}}">
                        {{$subcategory->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    @endforeach

</x-app-layout>
