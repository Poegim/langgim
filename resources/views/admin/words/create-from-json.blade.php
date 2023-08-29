<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            {{ __('Add word') }}
        </h2>
    </x-slot>

    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full overflow-hidden align-middle">

                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="bg-red-800 text-gray-200 w-full rounded mb-4 p-2">
                            {{ $error }}<br/>
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{route('admin.store-from-json')}}">
                    @csrf

                    <div class="space-y-2">

                        <div class="bg-black text-green-300 p-4 mb-4 rounded">
                            Example format:<br />
                            {<br />
                                "polish": "jabłko",<br />
                                "ukrainian": "яблуко",<br />
                                "english": "apple",<br />
                                "german": "Apfel",<br />
                                "spanish": "pomme",<br />
                                "sample_sentence": "Lorem ipsum"<br />
                              },<br />
                        </div>

                        <div>
                            <textarea name="content" id="content" rows="10" class="rounded w-full text-gray-800"></textarea>
                        </div>
                        <div>
                            <x-jet-label for="category">Category:</x-jet-label>
                            <select name="category" id="category"
                                class="text-gray-800 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-64">
                                @foreach ($categories as $category)
                                <optgroup label="{{$category->name}}">
                                    @foreach ($category->subcategories as $subcategory)
                                    <option value="{{$category->id}}.{{$subcategory->id}}">{{$subcategory->name}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                            <x-jet-input-error for="category" />
                        </div>
                    </div>
                    <div class="mt-2">
                        <x-buttons.primary>Save</x-buttons.primary>
                    </div>
                </form>


            </div>
        </div>

    </div>

</x-app-layout>
