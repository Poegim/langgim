<x-app-layout>
    <x-slot name="header">

        {{ __('Report error') }}

    </x-slot>
    <div>
        Did u found any mistake?
    </div>

    <form method="POST" action="{{route('errors.store')}}">
    @csrf
    <div class="mt-4 mb-4 flex flex-col space-y-2">
            <div>
                <label for="title">Title:</label>
                <x-jet-input type="text" class="block w-full lg:w-1/2" name="title" id="title">
                </x-jet-input>
                <x-jet-input-error for="title" />
            </div>

            <div>
                <label for="message">Message:</label>
                <x-jet-input type="text" class="block w-full lg:w-1/2" name="message" id="message">
                </x-jet-input>
                <x-jet-input-error for="message" />
            </div>

            <input type="hidden" value="{{$language}}" name="language" id="language">
            <x-jet-input-error for="language" />
            <input type="hidden" value="{{$word_id}}" name="word_id" id="word_id">
            <x-jet-input-error for="word_id" />

            <div>
                <x-jet-button class="mt-2">Save</x-jet-button>
            </div>
        </div>
    </form>
</x-app-layout>
