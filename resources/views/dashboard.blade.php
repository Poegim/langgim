<x-app-layout>
    <x-slot name="header">
            {{ __('start') }}
    </x-slot>

    <div class="py-2 sm:py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:user.dashboard />
        </div>
    </div>
</x-app-layout>
