<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/estilo-inicio.css') }}">
    </head>
    <body class="font-sans antialiased">

         @include('layouts.home.navbar')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        @include('layouts.home.footer')

        <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    </body>
</html>
