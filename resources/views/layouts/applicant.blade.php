<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicon -->
        {{-- <img src="{{ asset('favicon.ico.png') }}" alt="Logo" {{ $attributes }}> --}}

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
          <!-- Link to vendor styles -->
<link rel="stylesheet" href="{{ asset('assets/css/vendor.css') }}">

<!-- Link to your main stylesheet -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <!-- Javascript link-->
    <script src="{{ asset('asset/js/app.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.js') }}"></script>


    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100" style="margin-top: -3rem;">
            @include('layouts.navigation')
            <x-sidebar />

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
                {{-- {{ $slot }} --}}
                @yield('content')


    </body>

</html>
