<div>
    <div class="sm:px-4 pt-12 flex justify-center">
        <div class="w-full sm:w-2/3 md:w-2/3 lg:w-1/2 p-4">
            <div class="tracking-wider font-bold text-gray-600 mb-4 flex justify-center">
                <div>

                    <h1>
                        Welcome to LearnPolish.eu,
                    </h1>
                    <span class="font-thin text-md">
                        simple and free app for learning Polish.
                    </span>
                </div>
            </div>

            <div class="w-full sm:rounded-lg shadow bg-white p-4 mt-4">


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
    </div>
</div>
