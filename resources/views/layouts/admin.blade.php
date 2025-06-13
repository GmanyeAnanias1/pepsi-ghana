<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

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
            {{-- <div class="text-xl font-bold mb-8">{{ config('app.name') }} Admin</div> --}}
<img src="{{ asset('images/pep-1.png') }}" alt="" style="border-radius: 50%; width:3rem; margin-bottom:50px; margin-left:60px; margin-top:10px;">

<h2>{{ strtoupper(Auth::user()->name) }}</h2>

            <ul>
                {{-- <li class="mb-2">
                    <a href="{{ route('admin.dashboard') }}" class="block p-2 hover:bg-gray-700 rounded">
                        Dashboard
                    </a>
                </li> --}}
                <li class="mb-2">
                    <a href="{{ route('admin.jobs.index') }}" class="block p-2 hover:bg-gray-700 rounded">
                        Manage Jobs
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.applications.index') }}" class="block p-2 hover:bg-gray-700 rounded">
                        Manage Applications
                    </a>
                </li>
                <li class="mt-8">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left p-2 hover:bg-gray-700 rounded">
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

</body>
</html>
