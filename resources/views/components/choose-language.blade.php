<div class="rounded-lg shadow-lg bg-slate-800 flex flex-col">
    <div class="p-4 relative flex h-full space-x-2">

        <div class="my-auto">
            <x-clarity-user-outline-badged class="w-20 h-20"/>
        </div>
        <div class="my-auto">
            {{ __("messages.You didnt choose your language, go to profile page to do that.") }}
        </div>
    </div>
    <div class="p-4">
        <a href="{{route('profile.show')}}">
            <x-buttons.secondary class="w-full">
                <div>{{ __("messages.profil") }}</div>
            </x-button.secondary>
        </a>
    </div>
</div>
