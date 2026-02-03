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
        @include('partials.app-sidebar')

        {{-- Main content area --}}
        <div class="flex flex-col flex-1 min-w-0">
            {{-- Top header bar --}}
            <header class="flex-shrink-0">
                <div class="rounded-2xl m-4 ml-0 lg:ml-0 flex items-center justify-between h-16 px-4 sm:px-6 bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-lg shadow-slate-200/50 dark:shadow-slate-900/50">
                    <div class="flex items-center gap-3 min-w-0">
                        <details class="lg:hidden relative">
                            <summary class="list-none cursor-pointer p-2 -ml-2 rounded-xl text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50 select-none">
                                <span class="text-xl" aria-hidden="true">☰</span>
                            </summary>
                            <div class="absolute left-0 top-full mt-2 w-64 max-h-[80vh] overflow-y-auto rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-xl z-50 py-2">
                                <a href="{{ route('app.dashboard') }}" class="block px-4 py-2.5 text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700/50">📊 Dashboard</a>
                                <div class="border-t border-slate-200 dark:border-slate-600 my-1"></div>
                                <a href="{{ route('app.inventory.products-list') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">📦 Inventory</a>
                                <a href="{{ route('app.people.roles') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">👥 People</a>
                                <a href="{{ route('app.sales.add-sale') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">💰 Sales</a>
                                <a href="{{ route('app.purchase.add-purchase') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">🛒 Purchase</a>
                                <a href="{{ route('app.expense.categories') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">💸 Expense</a>
                                <a href="{{ route('app.hr.employees') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">🧑‍💼 HR &amp; Payroll</a>
                                <a href="{{ route('app.utilities.bills') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">🔌 Utilities</a>
                                <a href="{{ route('app.finance.banks') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">🏦 Finance</a>
                                <a href="{{ route('app.reports.stock') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">📈 Reports</a>
                                <a href="{{ route('app.sync.website') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">🔄 Sync</a>
                                <a href="{{ route('app.settings.business') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">⚙️ Settings</a>
                                <div class="border-t border-slate-200 dark:border-slate-600 my-1"></div>
                                <a href="{{ route('app.analytics') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">📈 Analytics</a>
                                <a href="{{ route('app.documents') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">📑 Documents</a>
                                <a href="{{ route('app.notifications') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">🔔 Notifications</a>
                                <a href="{{ route('app.audit-logs') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">📜 Audit / Logs</a>
                                <a href="{{ route('app.support') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">🆘 Support</a>
                                <a href="{{ route('app.backups') }}" class="block px-4 py-2.5 text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50">💾 Backups</a>
                            </div>
                        </details>
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

            {{-- Page content --}}
            <main class="flex-1 px-4 pb-8 sm:px-6 lg:px-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
