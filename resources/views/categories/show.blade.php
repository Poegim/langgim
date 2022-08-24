<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Learning: ') }} {{$category->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                @if ((!$language == NULL) && in_array($language, config('langgim.allowed_languages')))
                    <livewire:writing
                        :language="$language"
                        :category="$category"
                        :subcategory="$subcategory"
                        >
                @else
                    <div class="overflow-hidden rounded-lg shadow-lg bg-white mx-2 mt-4 flex flex-col">
                        <div class="px-6 py-4">
                            <h4 class="mb-3 text-xl font-semibold tracking-tight text-gray-800">Choose language</h4>
                            <p class="leading-normal text-gray-700">
                                You didnt choose your language, go to profile page to do that.
                            </p>
                            <p class="leading-normal text-gray-700 mt-2">
                                Nie wybrałeś języka, zrób to w zakładce profil.
                            </p>
                        </div>
                        <div class="mt-auto mb-2 px-2">
                            <a href="{{route('profile.show')}}">
                                <x-buttons.third class="mt-2 w-full">Lets go!</x-button.third>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
