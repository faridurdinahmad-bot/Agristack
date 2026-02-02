@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6 sm:space-y-8">
    {{-- Stats cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <div class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 p-6">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Revenue</p>
            <p class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">—</p>
            <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Coming soon</p>
        </div>
        <div class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 p-6">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Orders</p>
            <p class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">—</p>
            <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Coming soon</p>
        </div>
        <div class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 p-6">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Products</p>
            <p class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">—</p>
            <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Coming soon</p>
        </div>
        <div class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 p-6">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Users</p>
            <p class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">—</p>
            <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">Coming soon</p>
        </div>
    </div>

    {{-- Main content card --}}
    <div class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-200/80 dark:border-slate-700/50">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Overview</h2>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Your dashboard at a glance.</p>
        </div>
        <div class="p-6 sm:p-8">
            <p class="text-slate-600 dark:text-slate-400">
                Welcome to your dashboard. Connect your data and start managing your agriculture and commerce operations from here.
            </p>
        </div>
    </div>
</div>
@endsection
