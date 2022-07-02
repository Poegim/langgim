<div>

        <!-- Index Post -->
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow rounded-md sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="sm:px-4 px-1 py-2 text-sm font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50 w-1">
                                    ID
                                </th>
                                <th
                                    class="sm:px-4 px-1 py-2 text-sm font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Title
                                </th>

                                <th
                                    class="sm:px-4 px-1 py-2 text-sm font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    User
                                </th>
                                <th
                                class="sm:px-4 px-1 py-2 text-sm font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Status
                                </th>
                                <th
                                class="sm:px-4 px-1 py-2 text-sm font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Date
                                </th>
                                <th
                                class="sm:px-4 px-1 py-2 text-sm font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    CRUD
                                </th>

                        </thead>
                        <tbody class="bg-white">
                            @foreach ($errorsCollection as $errorItem)
                            <tr class="bg-white text-gray-800 text-sm text-left">
                                <td class="px-6 py-3 ">{{$errorItem->id}}</td>
                                <td class="px-6 py-3 ">{{$errorItem->title}}</td>
                                <td class="px-6 py-3 ">{{$errorItem->user_id}}</td>
                                <td class="px-6 py-3 ">{{$errorItem->status}}</td>
                                <td class="px-6 py-3 ">{{$errorItem->created_at}}</td>
                                <td>
                                    CRUD
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
