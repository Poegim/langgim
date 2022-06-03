<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Subcategory') }}
        </h2>
    </x-slot>

    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full overflow-hidden align-middle">

                <form method="POST" action="{{route('admin.subcategories.store')}}">
                    @csrf

                    <div class="space-y-3">
                        <div>
                            <x-jet-label for="name">Name:</x-jet-label>
                            <x-jet-input name="name" id="name" type="text" class="w-64"/>
                            <x-jet-input-error for="name"/>
                        </div>

                        <div>
                            <x-jet-label for="category">Category:</x-jet-label>
                            <select name="category" id="category" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-64">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="category"/>
                        </div>

                        <div>
                            <x-jet-button>Save</x-jet-button>
                            <a href="{{route('admin.categories.index')}}">
                                <x-jet-danger-button type="button">Back</x-jet-danger-button>
                            </a>
                        </div>

                    </div>
                </form>


            </div>
        </div>

    </div>

</x-app-layout>
