<x-app-layout>
    <x-slot name="header">
            {{__('messages.report error')}}
    </x-slot>

    <form method="POST" action="{{route('errors.store')}}">
        @csrf
        <div class="mt-4 mb-4 flex flex-col space-y-2 capitalize rounded bg-slate-700 p-4 lg:w-1/2 max-w-7xl mx-auto">
            <div class="uppercase font-bold">
                {{__('messages.report error')}}
            </div>
            <div>
                <label class="text-gray-300 text-sm" for="title">{{__('messages.title')}}:</label>
                <x-jet-input type="text" class="block w-full" name="title" id="title">
                </x-jet-input>
                <x-jet-input-error for="title" />
            </div>

            <div>
                <label class="text-gray-300 text-sm" for="message">{{__('message')}}:</label>
                <x-jet-input type="text" class="block w-full" name="message" id="message">
                </x-jet-input>
                <x-jet-input-error for="message" />
            </div>

            <input type="hidden" value="{{$language}}" name="language" id="language">
            <x-jet-input-error for="language" />
            <input type="hidden" value="{{$word_id}}" name="word_id" id="word_id">
            <x-jet-input-error for="word_id" />

            <div>
                <x-jet-danger-button type="submit" class="mt-2">{{__('messages.save')}}</x-jet-danger-button>
            </div>
        </div>
    </form>
</x-app-layout>
