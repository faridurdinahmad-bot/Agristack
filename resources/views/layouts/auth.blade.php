<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'AgriStack'))</title>

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
<body class="font-sans antialiased min-h-screen flex flex-col bg-gradient-to-br from-slate-50 via-white to-emerald-50/40 dark:from-slate-950 dark:via-slate-900 dark:to-slate-950 text-slate-800 dark:text-slate-100">
    <header class="flex-shrink-0 py-6 px-4">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
            <a href="{{ url('/') }}" class="text-lg font-semibold tracking-tight bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 bg-clip-text text-transparent">
                {{ config('app.name', 'AgriStack') }}
            </a>
            <a href="{{ url('/') }}" class="text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 transition-colors">
                ← Back to home
            </a>
        </div>
    </header>

    <main class="flex-1 flex items-center justify-center px-4 py-8 sm:py-12">
        <div class="w-full max-w-md">
            <div class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 p-8 sm:p-10">
                @yield('content')
            </div>
            @hasSection('footer-link')
                <p class="mt-6 text-center text-sm text-slate-600 dark:text-slate-400">
                    @yield('footer-link')
                </p>
            @endif
        </div>
    </main>
</body>
</html>
