@extends('layouts.app')

@section('title', 'Sync Schedule')
@section('page-title', 'Sync Schedule')

@section('content')
<style>
    .toggle-dot { transition: transform 0.2s; }
    .peer:checked ~ .toggle-track .toggle-dot { transform: translateX(1.25rem); }
</style>

<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Sync Schedule</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Set when to run automatic sync</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5 space-y-6">
        <div class="flex items-center justify-between gap-4 flex-wrap">
            <div>
                <p class="text-sm font-medium text-slate-800 dark:text-slate-200">Auto sync</p>
                <p class="text-xs text-slate-500 dark:text-slate-400">Run sync automatically at the chosen time</p>
            </div>
            <label class="relative inline-flex cursor-pointer items-center">
                <input type="checkbox" class="peer sr-only" id="auto_sync_toggle" checked>
                <div class="toggle-track relative h-6 w-11 rounded-full bg-slate-200 dark:bg-slate-600 peer-focus:ring-2 peer-focus:ring-emerald-500/20 peer-checked:bg-emerald-500">
                    <span class="toggle-dot absolute left-0.5 top-1 h-4 w-4 rounded-full bg-white shadow border border-slate-200 dark:border-slate-600"></span>
                </div>
            </label>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 border-t border-slate-200 dark:border-slate-700">
            <div>
                <label for="sync_frequency" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Frequency</label>
                <select id="sync_frequency" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="hourly">Every hour</option>
                    <option value="daily" selected>Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="custom">Custom</option>
                </select>
            </div>
            <div>
                <label for="sync_time" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Time</label>
                <input type="time" id="sync_time" value="02:00" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
        </div>

        <div class="flex flex-wrap gap-3 pt-2">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Save schedule</button>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Reset to default</button>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
        <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200 mb-2">Next scheduled sync</h3>
        <p class="text-slate-600 dark:text-slate-400">05 Feb 2025 at 02:00 AM (dummy — no backend)</p>
    </div>
</div>
@endsection
