<x-app-layout>
    <x-slot name="header">

        {{ __('Report error') }}

    </x-slot>

    <form method="POST" action="{{route('errors.store')}}">
        @csrf
        <div class="mt-4 mb-4 flex flex-col space-y-2 capitalize rounded bg-slate-700 p-4 lg:w-1/2 max-w-7xl mx-auto">
            <div class="normal-case">
                {{__('Did u found any mistake')}}?
            </div>
            <div>
                <label for="title">{{__('messages.title')}}:</label>
                <x-jet-input type="text" class="block w-full" name="title" id="title">
                </x-jet-input>
                <x-jet-input-error for="title" />
            </div>

            <div>
                <label for="message">{{__('message')}}:</label>
                <x-jet-input type="text" class="block w-full" name="message" id="message">
                </x-jet-input>
                <x-jet-input-error for="message" />
            </div>

            <input type="hidden" value="{{$language}}" name="language" id="language">
            <x-jet-input-error for="language" />
            <input type="hidden" value="{{$word_id}}" name="word_id" id="word_id">
            <x-jet-input-error for="word_id" />

            <div>
                <x-jet-button class="mt-2">{{__('save')}}</x-jet-button>
            </div>
        </div>
    </form>
</x-app-layout>
