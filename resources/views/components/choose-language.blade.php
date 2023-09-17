<div class="overflow-hidden rounded shadow bg-slate-800 flex flex-col">
    <div class="px-6 py-4">
        <h4 class="mb-3 text-xl font-semibold tracking-tight ">Choose language</h4>
        <div class="flex mt-2">
            <span class="flex mr-2 h-5 w-5 cursor-pointer" x-data="{ tooltip: false }"
            x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
            class="ml-2 h-12 w-12 cursor-pointer">

            <x-tni-info-circle-o class="text-pink-500" />

            <div x-show="tooltip" x-cloak class="text-sm text-gray-200 absolute bg-blue-400 rounded-lg p-2
            transform translate-x-3">
            Nie wybrałeś języka, zrób to w zakładce profil.
            </div>
            </span>
            <p class="flex leading-normal text-gray-400">
                You didnt choose your language, go to profile page to do that.
            </p>
        </div>
    </div>
    <div class="mb-2 p-2 mx-4">
        <a href="{{route('profile.show')}}">
            <x-buttons.primary class="mt-2 w-full">Lets go!</x-button.third>
        </a>
    </div>
</div>
