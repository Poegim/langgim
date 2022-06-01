<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="space-x-1">
        <a href="{{route('admin.categories.index')}}">
            <x-buttons.primary>Categories</x-buttons.primary>
        </a>
        <a href="{{route('admin.words.index')}}">
            <x-buttons.secondary>Words</x-buttons.secondary>
        </a>
        <a href="{{route('admin.users.index')}}">
            <x-buttons.third>Users</x-buttons.third>
        </a>
    </div>

</x-app-layout>
