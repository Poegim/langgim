<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        {{-- <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script> --}}
        <script src="https://www.google.com/recaptcha/api.js?render=6Ldrr2wiAAAAALaBNlzaDc31aTl7177oV4W3-rrs"></script>

    </head>
    <body>
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">

            <!-- Page Content -->
            <main>
                <div class="max-w-7xl mx-auto py-6 px-2 sm:px-4 lg:px-8">
                {{ $slot }}
                </div>
            </main>
        </div>

        @stack('scripts')
    </body>
</html>
