<x-app-layout>
    <x-slot name="header">
        {{ __('messages.learning') }}: {{$category->name}}
    </x-slot>

    <div class="max-w-7xl mx-auto sm:py-10 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="overflow-hidden sm:rounded-lg shadow-lg">

                @if ((!$language == NULL) && in_array($language, config('langgim.allowed_languages')))
                    @if ($mode === 'typing')

                    <livewire:typing
                        :language="$language"
                        :category="$category"
                        :subcategory="$subcategory"
                        >

                    @elseif ($mode === 'quiz')

                    <livewire:quiz
                        :language="$language"
                        :category="$category"
                        :subcategory="$subcategory"
                        >

                    @endif
                @else
                <x-choose-language />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
