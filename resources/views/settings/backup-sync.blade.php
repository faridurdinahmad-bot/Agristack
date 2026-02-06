@extends('layouts.app')

@section('title', 'Backup & Synchronization')
@section('page-title', 'Backup & Synchronization')

@section('content')
<style>
    .toggle-dot { transition: transform 0.2s; }
    .peer:checked ~ .toggle-track .toggle-dot { transform: translateX(1.25rem); }
</style>

<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Backup & Synchronization</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Backup and sync options (UI only)</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5 space-y-6">
        <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200">Auto backup</h3>
        <div class="flex items-center justify-between gap-4 flex-wrap">
            <div>
                <p class="text-sm font-medium text-slate-800 dark:text-slate-200">Enable automatic backups</p>
                <p class="text-xs text-slate-500 dark:text-slate-400">Daily backup at chosen time</p>
            </div>
            <label class="relative inline-flex cursor-pointer items-center">
                <input type="checkbox" class="peer sr-only" id="auto_backup_toggle" checked>
                <div class="toggle-track relative h-6 w-11 rounded-full bg-slate-200 dark:bg-slate-600 peer-focus:ring-2 peer-focus:ring-emerald-500/20 peer-checked:bg-emerald-500">
                    <span class="toggle-dot absolute left-0.5 top-1 h-4 w-4 rounded-full bg-white shadow border border-slate-200 dark:border-slate-600"></span>
                </div>
            </label>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 border-t border-slate-200 dark:border-slate-700">
            <div>
                <label for="backup_time" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Backup time</label>
                <input type="time" id="backup_time" value="03:00" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div>
                <label for="backup_retention" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Keep last</label>
                <select id="backup_retention" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="7">7 days</option>
                    <option value="14">14 days</option>
                    <option value="30" selected>30 days</option>
                </select>
            </div>
        </div>
        <div class="flex flex-wrap gap-3 pt-2">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 shadow-md">Save</button>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600">Backup now</button>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5 space-y-4">
        <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200">Sync with website</h3>
        <div class="flex items-center justify-between gap-4 flex-wrap">
            <div>
                <p class="text-sm font-medium text-slate-800 dark:text-slate-200">Auto sync enabled</p>
                <p class="text-xs text-slate-500 dark:text-slate-400">Sync products and orders on schedule</p>
            </div>
            <label class="relative inline-flex cursor-pointer items-center">
                <input type="checkbox" class="peer sr-only" id="auto_sync_toggle">
                <div class="toggle-track relative h-6 w-11 rounded-full bg-slate-200 dark:bg-slate-600 peer-focus:ring-2 peer-focus:ring-emerald-500/20 peer-checked:bg-emerald-500">
                    <span class="toggle-dot absolute left-0.5 top-1 h-4 w-4 rounded-full bg-white shadow border border-slate-200 dark:border-slate-600"></span>
                </div>
            </label>
        </div>
        <p class="text-xs text-slate-500 dark:text-slate-400">Configure sync in <a href="{{ route('app.sync.website') }}" class="text-emerald-600 dark:text-emerald-400 hover:underline">Sync with Website</a>.</p>
        <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 shadow-md">Save</button>
    </div>
</div>
@endsection
