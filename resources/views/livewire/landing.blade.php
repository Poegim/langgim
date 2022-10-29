<div class="mt-10 flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100">
    <div>
        <h1 class="text-2xl">
            Welcome to LearnPolish.eu,
        </h1>
        <span class="font-thin text-md tracking-wider">
            simple and free app for learning Polish.
        </span>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="text-center">
            <a href="{{route('register')}}">
                <x-buttons.primary class="w-full h-16">
                    <div>Register</div>
                    <div class="text-sm font-extralight">Zarejestruj</div>
                </x-buttons.primary>
            </a>
        </div>

        <div class="mt-6">
            <a href="{{route('login')}}">
                <x-buttons.secondary class="w-full h-16">
                    <div>Log in</div>
                    <div class="text-sm font-extralight">Zaloguj</div>
                    </x-buttons.primary>
            </a>
        </div>
        <div class="mt-6">
            <a href="{{route('guest')}}">
                <x-buttons.third class="w-full h-16">
                    <div>Guest mode</div>
                    <div class="text-sm font-extralight">Tryb gościa</div>
                    </x-buttons.primary>
            </a>
        </div>
    </div>
</div>
