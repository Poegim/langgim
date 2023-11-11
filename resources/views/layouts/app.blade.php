<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500;1,600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        @if (App::environment('production'))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-N5KFMQZ01K"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-N5KFMQZ01K');
            </script>
        @endif

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <style>
            [x-cloak] {
                display: none;
            }
        </style>


    </head>
    <body class="font-sans antialiased text-gray-200">
        <x-jet-banner />

        <div class="min-h-screen bg-slate-900">


            <!-- Page Content -->
            <main>
                <div class="flex flex-col sm:flex-row">
                    @livewire('navigation-menu')
                    <div class="sm:w-full py-2 sm:py-6 px-2 sm:px-4 lg:px-8">
                        <!-- Page Heading -->
                        @if (isset($header))
                        <header class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-end mb-2">
                            <div class="w:1/2 rounded-r bg-gradient-to-r from-slate-900 to-slate-800 sm:mb-4 flex justify-end align-middle py-1 pr-2 sm:pr-4 text-slate-300">
                                <h2 class="text-xs sm:text-sm lg:text-base tracking-wider my-auto pr-2 italic lowercase">
                                    {{ $header }}
                                </h2>
                                <x-clarity-map-line class="w-5 h-5 my-auto"/>
                            </div>
                        </header>
                        @endif
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>

        @stack('modals')
        @livewireScripts
    </body>
</html>
