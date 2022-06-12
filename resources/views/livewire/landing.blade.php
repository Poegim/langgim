<div>
    <div class="px-4 pt-12 flex justify-center">
        <div class="w-full sm:w-2/3 md:w-1/2 lg:w-1/4">
            <div class="hidden">
                {{-- <a href="{{route('register')}}"> --}}
                    <x-buttons.primary class="w-full h-18">
                        <div>Register</div>
                        <div class="text-sm font-extralight">Rejestracja</div>
                    </x-buttons.primary>
                {{-- </a> --}}

            </div>
            <div class="mt-2">
                <span class="text-sm font-extralight">
                    Registeration is temporary unavailable.
                    This app is under development.
                </span>

            </div>

            <div class="mt-24">
                <a href="{{route('login')}}"><x-buttons.secondary class="w-full h-16">
                    <div>Log in</div>
                    <div class="text-sm font-extralight">Zaloguj</div>
                </x-buttons.primary>
            </a>
            </div>
            <div class="mt-6">
                <a href="{{route('guest')}}"><x-buttons.third class="w-full h-16">
                    <div>Guest mode</div>
                    <div class="text-sm font-extralight">Tryb gościa</div>
                </x-buttons.primary>
            </a>
            </div>
        </div>
    </div>
</div>
