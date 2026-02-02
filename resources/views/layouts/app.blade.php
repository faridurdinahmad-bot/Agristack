<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') — {{ config('app.name', 'AgriStack') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif

    <style>
        .font-sans { font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; }
    </style>
</head>
<body class="font-sans antialiased min-h-screen flex flex-col bg-gradient-to-br from-slate-50 via-white to-emerald-50/30 dark:from-slate-950 dark:via-slate-900 dark:to-slate-950 text-slate-800 dark:text-slate-100">
    <div class="flex flex-1">
        {{-- Sidebar --}}
        <aside class="hidden lg:flex lg:flex-shrink-0 lg:w-64 lg:flex-col">
            <div class="flex flex-col flex-grow rounded-2xl m-4 mr-0 bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
                <div class="flex items-center h-16 px-6 border-b border-slate-200/80 dark:border-slate-700/50">
                    <a href="{{ route('dashboard') }}" class="text-lg font-semibold bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 bg-clip-text text-transparent">
                        {{ config('app.name', 'AgriStack') }}
                    </a>
                </div>
                <nav class="flex-1 px-4 py-6 space-y-1">
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-emerald-700 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200/50 dark:border-emerald-500/20">
                        <span aria-hidden="true">📊</span>
                        Dashboard
                    </a>
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 transition-colors">
                        <span aria-hidden="true">📦</span>
                        Products
                    </a>
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 transition-colors">
                        <span aria-hidden="true">👥</span>
                        Users
                    </a>
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 transition-colors">
                        <span aria-hidden="true">⚙️</span>
                        Settings
                    </a>
                </nav>
                <div class="p-4 border-t border-slate-200/80 dark:border-slate-700/50">
                    <a href="{{ url('/') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-700/50 transition-colors">
                        ← Back to site
                    </a>
                </div>
            </div>
        </aside>

        {{-- Main content area --}}
        <div class="flex flex-col flex-1 min-w-0">
            {{-- Topbar --}}
            <header class="flex-shrink-0">
                <div class="rounded-2xl m-4 ml-0 lg:ml-0 flex items-center justify-between h-16 px-4 sm:px-6 bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-lg shadow-slate-200/50 dark:shadow-slate-900/50">
                    <div class="flex items-center gap-3">
                        <details class="lg:hidden relative group">
                            <summary class="list-none cursor-pointer text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white p-2 -ml-2 rounded-xl transition-colors select-none">
                                <span class="text-xl" aria-hidden="true">☰</span>
                            </summary>
                            <div class="absolute left-0 top-full mt-2 w-56 rounded-2xl bg-white/95 dark:bg-slate-800/95 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 py-2 z-50">
                                <a href="{{ route('dashboard') }}" class="block px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700/50">Dashboard</a>
                                <a href="{{ route('dashboard') }}" class="block px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700/50">Products</a>
                                <a href="{{ route('dashboard') }}" class="block px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700/50">Users</a>
                                <a href="{{ route('dashboard') }}" class="block px-4 py-3 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700/50">Settings</a>
                            </div>
                        </details>
                        <h1 class="text-lg font-semibold text-slate-900 dark:text-white truncate">
                            @yield('page-title', 'Dashboard')
                        </h1>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-slate-500 dark:text-slate-400 hidden sm:inline">Welcome back</span>
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-500 flex items-center justify-center text-white text-sm font-medium shadow-md shadow-emerald-500/25">
                            U
                        </div>
                    </div>
                </div>
            </header>

            {{-- Page content --}}
            <main class="flex-1 px-4 pb-8 sm:px-6 lg:px-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
