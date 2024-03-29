<x-app-layout>

    <x-slot name="header">
        {{ __('Create Category') }}
    </x-slot>

    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full overflow-hidden align-middle">

                <form method="POST" action="{{route('admin.categories.store')}}">
                    @csrf

                    <div>
                        <div>
                            <x-jet-label for="name">Name:</x-jet-label>
                            <x-jet-input name="name" id="name" type="text" />
                            <x-jet-input-error for="name"/>
                        </div>

                        @foreach (config('langgim.allowed_languages') as $language)
                            <div class="mt-2">
                                <x-jet-label for="{{$language}}">{{ucfirst($language)}} name:</x-jet-label>
                                <x-jet-input name="{{$language}}" id="{{$language}}" type="text" />
                                <x-jet-input-error for="{{$language}}"/>
                            </div>
                        @endforeach

                        <div>
                            <x-jet-label for="priority">Priority: </x-jet-label>
                            <x-jet-input name="priority" id="priority" type="number" min="0" max="5" value="0"/>
                            <x-jet-input-error for="priority"/>
                        </div>

                    </div>
                    <div class="mt-2">
                        <x-buttons.primary>Save</x-buttons.primary>
                    </div>
                </form>


            </div>
        </div>

    </div>

</x-app-layout>
