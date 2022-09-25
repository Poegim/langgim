<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Choose category') }}
        </h2>
    </x-slot>

    @foreach ($categories as $category)
    <div class="overflow-hidden rounded-lg shadow-lg bg-white mt-4 sm:mx-2 flex flex-col p-4">
        <div class="font-extrabold flex justify-between">
            <a href="{{route('category.show', [$category])}}">
                {{$category->name}}
            </a>
            <span class="mr-3">
                <livewire:categories.reset
                :category="$category"
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

</x-app-layout>
