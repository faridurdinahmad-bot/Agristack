<header class="sticky top-0 z-50">
    <nav class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 pb-2 sm:pt-5 sm:pb-3">
        <div class="flex items-center justify-between h-14 px-5 rounded-2xl bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-lg shadow-slate-200/50 dark:shadow-slate-900/50">
            <a href="{{ url('/') }}" class="text-lg font-semibold tracking-tight bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 bg-clip-text text-transparent">
                {{ config('app.name', 'AgriStack') }}
            </a>
            <ul class="flex items-center gap-1 sm:gap-2">
                <li>
                    <a href="{{ route('register.vendor') }}"
                       class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-800/80 rounded-xl transition-colors">
                        <span class="text-lg" aria-hidden="true">🏪</span>
                        Register Vendor
                    </a>
                </li>
                <li>
                    <a href="{{ route('register.staff') }}"
                       class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100/80 dark:hover:bg-slate-800/80 rounded-xl transition-colors">
                        <span class="text-lg" aria-hidden="true">👤</span>
                        Register Staff
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 rounded-xl shadow-md shadow-emerald-500/25 transition-all hover:shadow-lg hover:shadow-emerald-500/30">
                        <span class="text-lg" aria-hidden="true">🔐</span>
                        Sign In
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
