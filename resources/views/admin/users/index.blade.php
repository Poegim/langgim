<x-app-layout>

<!-- Index Post -->
<div class="max-w-7xl mx-auto mt-8 p-0 sm:p-2">
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
                            Name
                            </th>
                            <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            E-mail
                            </th>
                            <th class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">

                            </th>
                        </tr>
                    </thead>
                        @foreach ($users as $user)
                        <tr class="bg-white text-gray-800 text-sm text-left">
                            <td class="px-6 py-3 ">{{$user->id}}</td>
                            <td class="px-6 py-3 ">{{$user->name}}</td>
                            <td class="px-6 py-3 ">{{$user->email}}</td>
                            <td>
                                <div class="flex space-x-1">
                                    <livewire:admin.users.delete :user="$user" />
                                    <div>
                                        <a href="{{route('admin.users.edit', $user)}}">
                                            <x-clarity-note-edit-line class="w-5 h-5 text-blue-700" />
                                        </a>
                                    </div>
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
</div>


</x-app-layout>
