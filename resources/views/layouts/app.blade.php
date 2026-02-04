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
        /* Mobile sidebar overlay: show when checkbox is checked */
        #mobile-sidebar-toggle:checked ~ .app-sidebar { transform: translateX(0); }
        #mobile-sidebar-toggle:checked ~ .mobile-sidebar-backdrop { opacity: 1; pointer-events: auto; }
    </style>
</head>
<body class="font-sans antialiased min-h-screen flex flex-col bg-gradient-to-br from-slate-50 via-white to-emerald-50/30 dark:from-slate-950 dark:via-slate-900 dark:to-slate-950 text-slate-800 dark:text-slate-100">
    <div class="flex flex-1 relative">
        <input type="checkbox" id="mobile-sidebar-toggle" class="sr-only peer" aria-hidden="true" />
        @include('partials.app-sidebar')
        <label for="mobile-sidebar-toggle" class="mobile-sidebar-backdrop fixed inset-0 z-[90] bg-black/50 opacity-0 pointer-events-none transition-opacity duration-300 lg:hidden" aria-label="Close menu"></label>

        {{-- Main content area --}}
        <div class="flex flex-col flex-1 min-w-0 min-h-0">
            {{-- Top header bar --}}
            <header class="flex-shrink-0">
                <div class="rounded-2xl m-4 ml-0 lg:ml-0 flex items-center justify-between h-16 px-4 sm:px-6 bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-lg shadow-slate-200/50 dark:shadow-slate-900/50">
                    <div class="flex items-center gap-3 min-w-0">
                        <label for="mobile-sidebar-toggle" class="lg:hidden list-none cursor-pointer p-2 -ml-2 rounded-xl text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50 select-none" aria-label="Open menu">
                            <span class="text-xl" aria-hidden="true">☰</span>
                        </label>
                        <h1 class="text-lg font-semibold text-slate-900 dark:text-white truncate">
                            @yield('page-title', 'Dashboard')
                        </h1>
                    </div>
                    <div class="flex items-center gap-2 sm:gap-4">
                        {{-- Language switch placeholder --}}
                        <div class="flex items-center gap-2 px-3 py-2 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50/50 dark:bg-slate-800/50 text-slate-600 dark:text-slate-400 text-sm">
                            <span aria-hidden="true">🌐</span>
                            <span class="hidden sm:inline">Language</span>
                        </div>
                        {{-- Dummy profile --}}
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-500 flex items-center justify-center text-white text-sm font-medium shadow-md shadow-emerald-500/25" title="Profile">
                            U
                        </div>
                    </div>
                </div>
            </header>

            {{-- Page content (no z-index so sidebar overlay stays on top on mobile) --}}
            <main class="flex-1 px-4 pb-8 sm:px-6 lg:px-8 bg-transparent">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
