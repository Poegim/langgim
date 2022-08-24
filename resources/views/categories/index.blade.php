<x-app-layout>

        @foreach ($categories as $category)
        <div class="overflow-hidden rounded-lg shadow-lg bg-white mt-4 mx-2 flex flex-col p-4">
            <span class="font-extrabold">
                {{$category->name}}
            </span>

            <ul class="divide-y-2 divide-gray-100">
                @foreach ($category->subcategories as $subcategory)
                    <li class="p-3 ml-4">{{$subcategory->name}}</li>
                @endforeach
            </ul>
        </div>
        @endforeach

</x-app-layout>
