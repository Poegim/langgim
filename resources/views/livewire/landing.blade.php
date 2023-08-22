<div class="flex flex-col sm:justify-center items-center">
    <div class="mt-10 py-10 bg-slate-800 rounded-lg w-screen max-w-md">
        <div class="w-full text-center">
            <h1 class="text-2xl md:text-3xl">
                Welcome to LearnPolish.eu,
            </h1>
            <span class="font-thin text-md tracking-wider">
                simple and free app for learning Polish.
            </span>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4">
            <div class="text-center">
                <a href="{{route('register')}}">
                    <x-buttons.primary class="w-full h-16 md:text-lg">
                        <div>Register</div>
                    </x-buttons.primary>
                </a>
            </div>

            <div class="mt-6">
                <a href="{{route('login')}}">
                    <x-buttons.secondary class="w-full h-16 md:text-lg">
                        <div>Log in</div>
                        </x-buttons.secondary>
                </a>
            </div>
            <div class="mt-6">
                <a href="{{route('guest')}}">
                    <x-buttons.third class="w-full h-16 md:text-lg">
                        <div>Guest mode</div>
                        </x-buttons.third>
                </a>
            </div>
        </div>
    </div>
</div>
