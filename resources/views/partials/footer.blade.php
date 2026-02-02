<footer class="mt-auto">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-4 sm:pb-5">
        <div class="rounded-2xl bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-lg shadow-slate-200/50 dark:shadow-slate-900/50 px-6 sm:px-8 py-8 sm:py-10">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
                <div class="flex flex-wrap items-center justify-center sm:justify-start gap-x-6 gap-y-1 text-sm">
                    <a href="{{ route('about') }}" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 transition-colors">About</a>
                    <a href="{{ route('privacy') }}" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 transition-colors">Privacy Policy</a>
                    <a href="{{ route('terms') }}" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 transition-colors">Terms &amp; Conditions</a>
                    <a href="{{ route('contact') }}" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 transition-colors">Contact</a>
                </div>
                <p class="text-sm text-slate-500 dark:text-slate-400 text-center sm:text-right">
                    City, Country
                </p>
            </div>
            <div class="mt-6 pt-6 border-t border-slate-200/80 dark:border-slate-700/50 text-center">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    &copy; {{ date('Y') }} {{ config('app.name', 'AgriStack') }}. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
