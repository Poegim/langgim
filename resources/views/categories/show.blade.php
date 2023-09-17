<x-app-layout>
    <x-slot name="header">
        {{ __('Learning: ') }} {{$category->name}}
    </x-slot>

    <div class="py-2 sm:py-6">
        <div class="max-w-7xl mx-auto">
            <div class="overflow-hidden sm:rounded-lg shadow-lg">
                @if ((!$language == NULL) && in_array($language, config('langgim.allowed_languages')))
                    <livewire:writing
                        :language="$language"
                        :category="$category"
                        :subcategory="$subcategory"
                        >
                @else
                <x-choose-language />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
