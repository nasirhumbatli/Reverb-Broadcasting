<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script>
            window.addEventListener('DOMContentLoaded', function () {
                window.Echo.channel('maintenance-channel')
                    .listen('.maintenance', function (event) {
                        let location = document.getElementsByTagName('main')[0];
                        let div = document.createElement('div');
                        div.style.width = '100%';
                        div.style.height = '32px';
                        div.style.lineHeight = '32px';
                        div.style.textAlign = 'center';
                        div.style.color = 'white';
                        div.style.background = 'blue';
                        div.innerHTML = event.message;
                        location.insertBefore(div, location.firstChild);
                    });

                window.Echo.private('App.Models.User.' + {{auth()->id()}})
                    .listen('.managers-backup-exported-event', function(event){
                        let location = document.getElementsByTagName('main')[0];
                        let div = document.createElement('div');
                        div.style.width = '100%';
                        div.style.height = '32px';
                        div.style.lineHeight = '32px';
                        div.style.textAlign = 'center';
                        div.style.color = 'white';
                        div.style.background = 'green';
                        div.innerHTML = 'Dear ' + event.userName + ', your backups successfully exported!';
                        location.insertBefore(div, location.firstChild);
                    });
            });
        </script>
    </body>
</html>
