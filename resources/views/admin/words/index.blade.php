<x-app-layout>

    <!-- Index Post -->
    <div class="max-w-7xl mx-auto mt-8 p-2">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="flex justify-end py-2 px-0 space-x-2 mb-2">
                    <a href="{{route('admin.words.create')}}" class="w-full">
                        <x-jet-secondary-button class="w-full">
                            <div class="mt-1">
                                Add word
                            </div>
                            <x-clarity-add-line class="w-6 h-6" />
                        </x-jet-secondary-button>
                    </a>

                </div>
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-200 uppercase border-b border-gray-200 bg-slate-700">
                                    ID
                                </th>
                                <th class="border-b border-gray-200 bg-slate-700">

                                </th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-200 uppercase border-b border-gray-200 bg-slate-700">
                                    Polish
                                </th>
                                <th
                                    class="px-1 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-200 uppercase border-b border-gray-200 bg-slate-700">
                                    Audio
                                </th>

                                <th
                                    class="hidden md:table-cell px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-200 uppercase border-b border-gray-200 bg-slate-700">
                                    Sample Sentence</th>
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-200 uppercase border-b border-gray-200 bg-slate-700">
                                    Category</th>
                                <th
                                    class="hidden md:table-cell px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-200 uppercase border-b border-gray-200 bg-slate-700">
                                    Subcategory
                                </th>

                                @foreach (config('langgim.allowed_languages') as $language)
                                <th
                                    class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-200 uppercase border-b border-gray-200 bg-slate-700">
                                    {{ substr($language, 0, 3) }}
                                </th>
                                @endforeach

                            </tr>
                        </thead>
                        <tbody class="bg-slate-800">
                            @foreach($words as $word)
                            <tr class="bg-slate-800  text-sm text-left">
                                <td class="px-2 py-3">{{$word->id}}</td>
                                <td class="">
                                    <div class="flex">
                                        <a href="{{route('admin.words.edit', $word)}}">
                                            <x-clarity-note-edit-line class="w-5 h-5 text-blue-700" />
                                        </a>
                                        <livewire:admin.words.delete :word="$word" />
                                    </div>
                                </td>
                                <td class="flex px-2 py-3 space-x-1">
                                    <div>
                                        {{$word->polish}}
                                    </div>
                                </td>

                                <td class="">
                                    @if($word->audio_file)
                                    <x-tni-file-tick-o class="w-5 h-5 text-green-600" />
                                    <livewire:admin.words.audio-file.delete :word="$word" />
                                    @else
                                    <x-tni-file-x-o class="w-5 h-5 text-red-700" />
                                    @endif
                                </td>

                                <td class="hidden md:table-cell px-2 py-3">{!! $word->sample_sentence !!}</td>
                                <td class="px-2 py-3">{!! $word->category->name !!}</td>
                                <td class="hidden md:table-cell px-2 py-3">
                                    {{$word->subcategory != null ? $word->subcategory->name : null }}</td>
                                @foreach (config('langgim.allowed_languages') as $language)

                                <td class="hidden md:table-cell px-2 py-3">
                                    @if($word->{$language} != NULL)
                                    <x-clarity-check-circle-line class="h-6 w-6 text-green-600" />
                                    @endif
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="bg-slate-800 rounded p-2 mt-2 shadow mb-2">
                    {{ $words->links() }}
                </div>

            </div>
        </div>
    </div>


</x-app-layout>
