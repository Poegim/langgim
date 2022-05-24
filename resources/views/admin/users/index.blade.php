<x-app-layout>

<!-- Index Post -->
<div class="max-w-7xl mx-auto mt-8 p-2">
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            ID
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Title
                            </th>
                            <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Description
                            </th>

                            <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                            Action</th>
                        </tr>
                    </thead>
                    @foreach($categories as $category)
                        <tr class="bg-white text-gray-800 text-sm text-left">
                            <td class="px-6 py-3 ">{{$category->id}}</td>
                            <td class="px-6 py-3 ">{{$category->name}}</td>
                            <td class="px-6 py-3 ">{{$category->created_at}}</td>
                            <td class="px-6 py-3 ">Actions</td>
                        </tr>
                    @endforeach
                    <tbody class="bg-white">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


</x-app-layout>
