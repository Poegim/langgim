<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add word') }}
        </h2>
    </x-slot>

    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full overflow-hidden align-middle">

                <form method="POST" action="{{route('admin.words.update', $word)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="space-y-2">
                        <div>
                            <x-jet-label for="word">Polish:</x-jet-label>
                            <x-jet-input name="word" id="word" type="text" value="{{$word->pl_word}}"/>
                            <x-jet-input-error for="word" />
                        </div>

                        @foreach (config('langgim.allowed_languages') as $language)
                        @switch($language)
                            @case('ukrainian')
                                <div class="mt-2">
                                    <x-jet-label for="{{$language}}">{{ucfirst($language)}} name:</x-jet-label>
                                    <x-jet-input name="{{$language}}" id="{{$language}}" type="text"
                                    value="{{$word->uaWord->word}}"
                                    />
                                    <x-jet-input-error for="{{$language}}"/>
                                </div>
                                @break
                            @case('english')
                                <div class="mt-2">
                                    <x-jet-label for="{{$language}}">{{ucfirst($language)}} name:</x-jet-label>
                                    <x-jet-input name="{{$language}}" id="{{$language}}" type="text"
                                    value="{{$word->enWord->word}}"
                                    />
                                    <x-jet-input-error for="{{$language}}"/>
                                </div>
                                @break
                            @case('german')
                                <div class="mt-2">
                                    <x-jet-label for="{{$language}}">{{ucfirst($language)}} name:</x-jet-label>
                                    <x-jet-input name="{{$language}}" id="{{$language}}" type="text"
                                    value="{{$word->geWord->word}}"
                                    />
                                    <x-jet-input-error for="{{$language}}"/>
                                </div>
                                @break
                            @case('spanish')
                                <div class="mt-2">
                                    <x-jet-label for="{{$language}}">{{ucfirst($language)}} name:</x-jet-label>
                                    <x-jet-input name="{{$language}}" id="{{$language}}" type="text"
                                    value="{{$word->esWord->word}}"
                                    />
                                    <x-jet-input-error for="{{$language}}"/>
                                </div>
                                @break
                            @default

                        @endswitch
                        @endforeach

                        <div>
                            <x-jet-label for="sample_sentence">Sample sentence:</x-jet-label>
                            <x-jet-input name="sample_sentence" id="sample_sentence" type="text" value="{{$word->sample_sentence}}"/>
                            <x-jet-input-error for="sample_sentence" />
                        </div>

                        <div>

                            <x-jet-label for="category">Category:</x-jet-label>
                            <select name="category" id="category"
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-64">
                                @foreach ($categories as $category)
                                <optgroup label="{{$category->name}}">
                                    @foreach ($category->subcategories as $subcategory)
                                    <option value="{{$category->id}}.{{$subcategory->id}}" @if(($category->id == $word->category_id) && ($subcategory->id == $word->subcategory_id)) selected="selected" @endif>{{$subcategory->name}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                            <x-jet-input-error for="category" />
                        </div>
                        <div>
                            <x-jet-label for="audio_file">Audio file:</x-jet-label>
                            <input type="file" name="audio_file" id="audio_file">
                            <x-jet-input-error for="audio_file" />
                        </div>
                    </div>
                    <div class="mt-2">
                        <x-jet-button>Save</x-jet-button>
                    </div>
                </form>


            </div>
        </div>

    </div>

</x-app-layout>
