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
                        <div>
                            <x-jet-label for="ua_word">Ukrainian:</x-jet-label>
                            <x-jet-input name="ua_word" id="ua_word" type="text" value="{{$word->uaWord ? $word->uaWord->word : ''}}"/>
                            <x-jet-input-error for="ua_word" />
                        </div>
                        <div>
                            <x-jet-label for="en_word">English:</x-jet-label>
                            <x-jet-input name="en_word" id="en_word" type="text" value="{{$word->uenord ? $word->enWord->word : ''}}"/>
                            <x-jet-input-error for="en_word" />
                        </div>
                        <div>
                            <x-jet-label for="ge_word">German:</x-jet-label>
                            <x-jet-input name="ge_word" id="ge_word" type="text" value="{{$word->geWord ? $word->geWord->word : ''}}"/>
                            <x-jet-input-error for="ge_word" />
                        </div>
                        <div>
                            <x-jet-label for="sample_sentence">Sample sentecne:</x-jet-label>
                            <x-jet-input name="sample_sentence" id="sample_sentence" type="text" value="{{$word->sample_sentence}}"/>
                            <x-jet-input-error for="sample_sentence" />
                        </div>
                        <div>
                            <x-jet-label for="category">Category:</x-jet-label>
                            <select name="category" id="category"
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-64">
                                @foreach ($categories as $category)
                                <optgroup label="{{$category->name}}">
                                    <option value="{{$category->id}}.0" @if($category->id == $word->category_id) selected="selected" @endif>{{$category->name}}</option>
                                    @foreach ($category->subcategories as $subcategory)
                                    <option value="{{$category->id}}.{{$subcategory->id}}" @if($category->id == $word->category_id) selected="selected" @endif>{{$subcategory->name}}</option>
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
