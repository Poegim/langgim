<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="mt-10 flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100">
        <div>
            <h1>
                <span class="text-3xl">
                    About!
                </span>
            </h1>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="pt-4 flex justify-center">

                <div class="font-thin">
                    <p>
                        <span class="text-lg font-bold">LearnPolish.eu</span> is free app for ... You know what.
                        To take full advantage, register your free account.
                        The app is in development, so expect new features to come soon and the word base continues to grow.
                    </p>
                    <p class="mt-4">
                        I hope you enyoj this app,
                        if you have any problems or ideas please contact us via error reports system,
                        with is available for registered users.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
