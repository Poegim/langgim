<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="space-y-2 sm:space-y-0 block sm:flex sm:space-x-2">
        <div class="block sm:flex">
            <a href="{{route('admin.categories.index')}}">
                <x-buttons.primary class="w-full sm:w-min">Categories</x-buttons.primary>
            </a>
        </div>
        <div class="block sm:flex">
            <a href="{{route('admin.words.index')}}">
                <x-buttons.primary class="w-full sm:w-min">Words</x-buttons.primary>
            </a>
        </div>

        <div class="block sm:flex">
            <a href="{{route('admin.users.index')}}">
                <x-buttons.primary class="w-full sm:w-min">Users</x-buttons.primary>
            </a>
        </div>
        <div class="block sm:flex">
            <a href="{{route('admin.errors')}}">
                <x-buttons.primary class="w-full sm:w-min">Errors</x-buttons.primary>
            </a>
        </div>

    </div>

</x-app-layout>
