<x-app-layout>

    <!-- Index Post -->
    <div class="max-w-7xl mx-auto mt-8 p-2">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    ID
                                </th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Polish
                                </th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Ukrainian
                                </th>

                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Sample Sentence</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Category</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Subcategory</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Action</th>
                            </tr>
                        </thead>
                        @foreach($words as $word)
                        <tr class="bg-white text-gray-800 text-sm text-left">
                            <td class="px-2 py-3 ">{{$word->id}}</td>
                            <td class="px-2 py-3 ">{{$word->pl_word}}</td>
                            <td class="px-2 py-3 ">{{$word->ua_word}}</td>
                            <td class="px-2 py-3 ">{!! $word->sample_sentence !!}</td>
                            <td class="px-2 py-3 ">{!! $word->category->name !!}</td>
                            <td class="px-2 py-3 ">{{$word->subcategory != null ? $word->subcategory->name : null }}</td>
                            <td class="px-2 py-3 ">CRUD + FILE</td>
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
