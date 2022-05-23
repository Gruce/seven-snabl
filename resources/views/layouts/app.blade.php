<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="{{ asset('img/a.png') }}" type="image/x-icon">
        {{--  Fonts  --}}
        <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.6/dist/flowbite.min.css" />
        @livewireStyles
        @wireUiScripts
        @laravelPWA

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>
    </head>
    <body class="font-sans antialiased" dir="rtl">
        <x-jet-banner />
        <x-notifications />
        <x-dialog />
        <div class="min-h-screen bg-gray-100">
            <div class="print:hidden">
                @livewire('navigation-menu')
            </div>


            <!-- Page Heading -->
            @hasSection('title')
                <header class="bg-white">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        @yield('title')
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="container px-4 py-5 mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
