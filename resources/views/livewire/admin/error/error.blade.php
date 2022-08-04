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
                            <td class="sm:px-4 px-1 py-2">{{$errorItem->id}}</td>
                            <td class="sm:px-4 px-1 py-2">{{$errorItem->title}}</td>
                            <td class="sm:px-4 px-1 py-2">{{$errorItem->user->name}}</td>
                            <td class="sm:px-4 px-1 py-2">{{$errorItem->status ? 'Fixed' : 'Waiting'}}</td>
                            <td class="sm:px-4 px-1 py-2">{{$errorItem->created_at}}</td>
                            <td>
                                <div class="flex">
                                    <a class="cursor-pointer" wire:click="showDeleteModal({{$errorItem->id}})"
                                        wire:loading.attr="disabled">
                                        <x-clarity-remove-line class="w-5 h-5 text-red-700" />
                                    </a>
                                    <a class="cursor-pointer" wire:click="showViewModal({{$errorItem->id}})"
                                        wire:loading.attr="disabled">
                                        <x-clarity-eye-line class="w-5 h-5 text-blue-500" />
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <x-jet-dialog-modal wire:model="deleteModalVisibility">
        <x-slot name="title">
            {{ __("Delete Error: ")}} {{$errorModelId}}
        </x-slot>

        <x-slot name="content">
            {{ __("CRITICAL WARNING! Are you sure want to delete? You cant undo this action!")}}
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-1">

                <x-jet-secondary-button wire:click="$toggle('deleteModalVisibility')" wire:loading.attr="disabled">
                    {{ __("Cancel")}}
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="destroyModel" wire:loading.attr='disabled'>
                    {{ __("Delete")}}
                </x-jet-danger-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- view / Edit Modal -->
    <x-jet-dialog-modal wire:model="viewModalVisibility">
        <x-slot name="title">
            <div class="flex justify-between">
                <div class="mt-2 text-sm">
                    {!! $title !!}
                </div>
                <div>
                    <label for="toggle" class="text-xs text-gray-700">{{$status ? 'Fixed' : 'Waiting'}}</label>
                    <div class="relative inline-block w-10 m-2 align-middle select-none transition duration-200 ease-in">
                        <input wire:model="status" type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" />
                        <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                </div>

            </div>

        </x-slot>

        <x-slot name="content">
            <div class="text-sm">
                <p>
                    Language: {{ $language }}
                </p>
                <p class="mt-4">
                    Message:
                </p>
                <p class="">
                    {!! $message !!}
                </p>
            </div>
            <div class="text-xs mt-4">
                @if ($errorModel)
                Created by: {{ $errorModel->user->name }}, {{ $errorModel->user->email }}
                <p>
                Created at:    {{ $date ? $date : '' }}
                </p>
                @endif
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-1">

                <x-jet-secondary-button wire:click="$toggle('viewModalVisibility')" wire:loading.attr="disabled">
                    {{ __("Cancel")}}
                </x-jet-secondary-button>

                <x-jet-button wire:click="updateModel" wire:loading.attr='disabled'>
                    {{ __("Save")}}
                </x-jet-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>


</div>
