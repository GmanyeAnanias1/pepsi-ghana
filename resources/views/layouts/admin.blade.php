<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-FR0N/Ny4I9YdD7bG4Uw2tPCT6W5YZ00eUIE7j9C5hBoSzQzMQYwdQZPLJ/ytgRBi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
 <!-- Flash Messages -->
@if (session('success'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 5000)"
        x-show="show"
        x-transition
        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4"
    style="margin-top: -45rem; margin-left: 30rem; width: 30rem;text-align: center;">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 5000)"
        x-show="show"
        x-transition
        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4"
    >
        {{ session('error') }}
    </div>
@endif

<body class="font-sans antialiased">
    <!-- Page Heading -->
            <header class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">
                    @yield('header')
                </h1>
            </header>
    <div class="min-h-screen bg-gray-100">
        <!-- Sidebar Navigation -->
        <nav class="fixed top-0 left-0 bottom-0 w-64 bg-gray-800 text-white p-4">


<img src="{{ asset('images/man.png') }}" alt="" style="border-radius: 50%; width:4rem; margin-bottom:5px; margin-left:64px; margin-top:10px;">
<div class="text-center mb-8">
<h2>{{ strtoupper(Auth::user()->name) }}</h2>
</div>

            <ul>
                <li class="mb-2">
                    <a href="{{ route('dashboard') }}" class="block p-2 hover:bg-gray-700 rounded">
                       <i class="fa fa-home " style="color: rgb(153, 243, 153)"></i>
                        Dashboard
                    </a>

                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.jobs.index') }}" class="block p-2 hover:bg-gray-700 rounded">
                        <i class="fa fa-briefcase" style="color: rgb(153, 243, 153)"></i>
                        Manage Jobs
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.applications.index') }}" class="block p-2 hover:bg-gray-700 rounded">
                        <i class="fas fa-file" style="color: rgb(153, 243, 153)"></i>
                        Manage Applications
                    </a>
                </li>
                <li class="mt-8">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left p-2 hover:bg-gray-700 rounded">
                            <i class="fas fa-sign-out-alt" style="color: red"></i>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div class="ml-64 p-8">

            <!-- Page Content -->
            <main style="margin-top: -45rem;">
                @yield('content')
            </main>
        </div>
    </div>
    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-svNyhrxHUK+y5zZQ3Xt0HJKQ6uOk+5fHVbHYklc+h5uZg6bKD+BRLZTQvJe5gx8v" crossorigin="anonymous"></script>
    </script>
</body>
</html>
