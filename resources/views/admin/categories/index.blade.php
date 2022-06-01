<x-app-layout>

    <!-- Index Post -->
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="flex justify-end py-2 px-0">
                <a href="{{route('admin.categories.create')}}">
                <x-jet-secondary-button>
                    <div class="mt-1">
                        Add category
                    </div>
                    <x-clarity-add-line class="w-6 h-6"/>
                </x-jet-secondary-button>
                </a>
            </div>
            <div
                class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow rounded-md sm:rounded-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="sm:px-4 px-1 py-2 text-xs sm:text-sm font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                ID
                            </th>
                            <th
                                class="sm:px-4 px-1 py-2 text-xs sm:text-sm font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Title
                            </th>

                            <th
                                class="sm:px-4 px-1 py-2 text-xs sm:text-sm font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Description
                            </th>

                            <th
                                class="sm:px-4 px-1 py-2 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                                Action</th>
                        </tr>
                    </thead>
                    @foreach($categories as $category)
                    <tr class="bg-white text-gray-800 text-xs sm:text-sm text-left">
                        <td class="sm:px-4 px-1 py-2 ">{{$category->id}}</td>
                        <td class="sm:px-4 px-1 py-2 ">{{$category->name}}</td>
                        <td class="sm:px-4 px-1 py-2 ">{{$category->created_at}}</td>
                        <td class="sm:px-4 px-1 py-2 ">
                            <div class="flex justify-center">
                                <a href="{{route('admin.categories.edit', $category)}}">
                                    <x-clarity-note-edit-line class="w-5 h-5 text-blue-700" />
                                </a>
                                <x-clarity-remove-line class="w-5 h-5 text-red-700" />
                            </div>

                        </td>
                    </tr>
                    @endforeach
                    <tbody class="bg-white">
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</x-app-layout>
