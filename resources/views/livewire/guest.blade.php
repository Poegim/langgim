
<x-slot name="header">
    {{ __('Guest mode') }}
</x-slot>
<div x-data="{ modePicker: true, languagePicker: false }" x-cloak class="max-w-7xl mx-auto sm:py-10 sm:px-6 lg:px-8">

    <div class="mx-auto">
        <div class="overflow-hidden sm:rounded-lg">

            @if (($mode == 'typing') && (!$language == NULL) && in_array($language, config('langgim.allowed_languages')))
                <livewire:typing :language="$language">
            @elseif (($mode == 'quiz') && (!$language == NULL) && in_array($language, config('langgim.allowed_languages')))
                <livewire:quiz :language="$language">
            @else

            <div class="flex justify-center" x-show="modePicker">
                <div class="w-full sm:max-w-md px-4 py-4 bg-slate-800 shadow-md overflow-hidden sm:rounded">
                    <div class="mb-4 flex justify-center">
                        <span class="text-xl uppercase text-gray-300 md:tracking-widest">
                            {{ __("Choose mode") }}:
                        </span>
                    </div>
                    <div class="flex space-x-2">
                            <x-jet-secondary-button class="w-1/2" x-on:click="languagePicker = true; modePicker = false" wire:click="setMode('quiz')">
                                <div class="flex flex-col justify-center w-full space-y-2">
                                    <div>
                                        <x-tni-question-circle-o class="w-10 h-10 mx-auto"/>
                                    </div>
                                    <div>
                                        quiz
                                    </div>
                                </div>
                            </x-jet-secondary-button>

                            <x-jet-secondary-button class="w-1/2" x-on:click="languagePicker = true; modePicker = false" wire:click="setMode('typing')">
                                <div class="flex flex-col justify-center w-full space-y-2">
                                    <div>
                                        <x-clarity-keyboard-line class="w-10 h-10 mx-auto"/>
                                    </div>
                                    <div>
                                        typing
                                    </div>
                                </div>
                            </x-jet-secondary-button>
                    </div>
                </div>
            </div>

            <div class="flex justify-center" x-show="languagePicker">
                <div class="w-full sm:max-w-md px-4 py-4 bg-slate-800 shadow-md overflow-hidden sm:rounded">

                    <div class="mb-4 flex justify-center">
                        <span class="text-xl uppercase text-gray-300 md:tracking-widest">
                            {{$mode}}
                        </span>
                    </div>

                    @foreach (config('langgim.allowed_languages') as $lang)

                    <a href="{{route('guest', [$mode, $lang])}}">
                        <div class="flex justify-around hover:bg-purple-900 transition-all duration-300 rounded border border-slate-700 my-2">
                            <div class="flex space-x-4 py-2">
                                <div class="shadow rounded-lg flex relative">
                                    <img src="{{asset('/images/flags/'.$lang.'.svg')}}"
                                        class="w-16 sm:w-24 rounded-md shadow z-30">
                                    <img src="{{asset('/images/flags/polish.svg')}}"
                                        class="w-16 sm:w-24 rounded-md -right-10 sm:-right-16 absolute shadow hover:none">
                                </div>
                            </div>
                            <div class="my-auto">
                                <span
                                    class="h-1 uppercase text-sm md:text-lg font-semibold">{{Illuminate\Support\Str::limit($lang, 3, '')}}
                                    - POL
                                </span>
                            </div>
                        </div>
                    </a>

                    @endforeach
                </div>
            </div>

            @endif
        </div>
    </div>
</div>
