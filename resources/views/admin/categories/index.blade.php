<x-app-layout>

    <x-slot name="header">
            {{ __('Categories') }}
    </x-slot>

    <!-- Index Post -->
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="flex justify-end py-2 px-0 space-x-2 mb-2">
                <a href="{{route('admin.categories.create')}}" class="w-full">
                <x-jet-secondary-button class="w-full">
                    <div class="mt-1">
                        Add category
                    </div>
                    <x-clarity-add-line class="w-6 h-6"/>
                </x-jet-secondary-button>
                </a>

                <a href="{{route('admin.subcategories.create')}}" class="w-full">
                    <x-jet-secondary-button class="w-full">
                        <div class="mt-1">
                            Add subcategory
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
                                class="sm:px-4 px-1 py-2 text-sm font-medium leading-4 tracking-wider text-left text-gray-200 uppercase border-b border-gray-200 bg-slate-700 w-1">
                                ID
                            </th>
                            <th
                                class="sm:px-4 px-1 py-2 text-sm font-medium leading-4 tracking-wider text-left text-gray-200 uppercase border-b border-gray-200 bg-slate-700">
                                Title
                            </th>

                            <th
                                class="sm:px-4 px-1 py-2 text-sm font-medium leading-4 tracking-wider text-left text-gray-200 uppercase border-b border-gray-200 bg-slate-700">
                                Subcategories
                            </th>

                    </thead>
                    <tbody class="bg-slate-800">
                    @foreach($categories as $category)
                    <tr class="bg-slate-800  text-sm text-left border-b">
                        <td class="sm:px-4 px-1 py-2 ">{{$category->id}}</td>
                        <td class="sm:px-4 px-1 py-2 flex space-x-1">
                            <div class="flex justify-center">
                                <a href="{{route('admin.categories.edit', $category)}}">
                                    <x-clarity-note-edit-line class="w-5 h-5 text-blue-700" />
                                </a>

                                <livewire:admin.categories.delete :category="$category" />
                            </div>
                            <div>
                                {{$category->name}}
                            </div>
                        </td>
                        <td class="sm:px-4 px-1 py-2 ">
                            <div>
                                @foreach ($category->subcategories as $subcategory)
                                    <div class="flex space-x-1">
                                        <livewire:admin.subcategories.delete :subcategory="$subcategory" />
                                        <div>
                                            <a href="{{route('admin.subcategories.edit', $subcategory)}}">
                                                <x-clarity-note-edit-line class="w-5 h-5 text-blue-700" />
                                            </a>
                                        </div>
                                        <div>
                                            {{$subcategory->name}}
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</x-app-layout>
