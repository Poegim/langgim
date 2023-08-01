<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            {{ __('Errors') }}
        </h2>
    </x-slot>
    @livewire('admin.error.error')
</x-app-layout>
