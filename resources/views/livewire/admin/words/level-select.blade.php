<div class="flex relative">
    <select
        class="text-xs rounded text-gray-900 {{$bg[$level-1]}} w-full"
        wire:change="saveOnChange()"
        wire:model="level"
        id="level_select_{{$word->id}}"
        >
        @foreach (config('langgim.levels') as $configLevel)
        <option value="{{$loop->index+1}}">{{$configLevel}}</option>
        @endforeach
    </select>
    <x-jet-action-message class="flex" on="saved">
        <div class="absolute top-1 bottom-1 bg-green-500 rounded -right-12 w-10 flex justify-center">
            <div class="m-auto">&#x2714;</div>
        </div>
    </x-jet-action-message>
</div>
