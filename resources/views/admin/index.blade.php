
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="px-2 sm:py-6">
        <div class="max-w-7xl">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="px-2 sm:px-24 py-6">
                    <a href="{{route('admin.categories.index')}}"><x-buttons.primary class="m-2">Categories</x-buttons.primary></a>
                    <a href="{{route('admin.words.index')}}"><x-buttons.secondary class="m-2">Words</x-buttons.secondary></a>
                    <a href="{{route('admin.users.index')}}"><x-buttons.third class="m-2">Users</x-buttons.third></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
