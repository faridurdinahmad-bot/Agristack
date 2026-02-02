@extends('layouts.public')

@section('title', config('app.name', 'AgriStack') . ' — ' . __('Landing'))

@section('content')
<div class="px-4 sm:px-6 lg:px-8 py-12 sm:py-20">
    <div class="max-w-5xl mx-auto">
        {{-- Hero --}}
        <div class="text-center mb-16 sm:mb-20">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm border border-white/60 dark:border-slate-600/50 shadow-md text-sm text-slate-600 dark:text-slate-400 mb-8">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                Agriculture &amp; commerce platform
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-slate-900 dark:text-white">
                <span class="bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 dark:from-white dark:via-slate-100 dark:to-slate-200 bg-clip-text text-transparent">Welcome to</span>
                <br>
                <span class="bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 bg-clip-text text-transparent">{{ config('app.name', 'AgriStack') }}</span>
            </h1>
            <p class="mt-6 max-w-2xl mx-auto text-lg text-slate-600 dark:text-slate-400 leading-relaxed">
                Your platform for agriculture management. Register as a vendor or staff, or sign in to get started.
            </p>
        </div>

        {{-- Feature section --}}
        <section class="space-y-6 sm:space-y-8">
            <h2 class="text-xl font-semibold text-slate-900 dark:text-white text-center sm:text-left">What we offer</h2>
            <div class="grid sm:grid-cols-3 gap-4 sm:gap-6">
                <article class="p-6 sm:p-8 rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500/20 to-teal-500/20 dark:from-emerald-400/20 dark:to-teal-400/20 flex items-center justify-center mb-4">
                        <span class="text-2xl">🌾</span>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Agriculture Management</h3>
                    <p class="mt-3 text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Plan crops, track seasons, and manage farm operations from a single dashboard. Built for growers and agribusinesses who need clarity and control.
                    </p>
                </article>
                <article class="p-6 sm:p-8 rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500/20 to-teal-500/20 dark:from-emerald-400/20 dark:to-teal-400/20 flex items-center justify-center mb-4">
                        <span class="text-2xl">📦</span>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Inventory &amp; Stock Control</h3>
                    <p class="mt-3 text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Keep stock levels visible, get low-stock alerts, and sync inventory across locations. Reduce waste and never run out of key inputs.
                    </p>
                </article>
                <article class="p-6 sm:p-8 rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500/20 to-teal-500/20 dark:from-emerald-400/20 dark:to-teal-400/20 flex items-center justify-center mb-4">
                        <span class="text-2xl">👥</span>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Vendor &amp; Staff Management</h3>
                    <p class="mt-3 text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Onboard vendors and staff with clear roles and permissions. One place for teams, suppliers, and access control.
                    </p>
                </article>
            </div>
        </section>
    </div>
</div>
@endsection
