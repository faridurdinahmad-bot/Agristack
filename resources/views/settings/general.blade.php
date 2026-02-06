@extends('layouts.app')

@section('title', 'General Settings')
@section('page-title', 'General Settings')

@section('content')
<style>
    .toggle-dot { transition: transform 0.2s; }
    .peer:checked ~ .toggle-track .toggle-dot { transform: translateX(1.25rem); }
</style>

<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">General Settings</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Application-wide defaults and behaviour</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5 space-y-6">
        <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200">Application</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="app_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Application name</label>
                <input type="text" id="app_name" value="AgriStack" placeholder="App name"
                    class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div>
                <label for="default_currency" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Default currency</label>
                <select id="default_currency" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="PKR" selected>PKR</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                </select>
            </div>
            <div>
                <label for="date_format" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Date format</label>
                <select id="date_format" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="d-m-Y">DD-MM-YYYY</option>
                    <option value="m-d-Y">MM-DD-YYYY</option>
                    <option value="Y-m-d">YYYY-MM-DD</option>
                </select>
            </div>
            <div>
                <label for="timezone" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Timezone</label>
                <select id="timezone" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="Asia/Karachi" selected>Asia/Karachi</option>
                    <option value="UTC">UTC</option>
                    <option value="America/New_York">America/New York</option>
                </select>
            </div>
        </div>
        <div class="flex items-center justify-between gap-4 py-2 border-t border-slate-200 dark:border-slate-700">
            <div>
                <p class="text-sm font-medium text-slate-800 dark:text-slate-200">Show dashboard welcome message</p>
                <p class="text-xs text-slate-500 dark:text-slate-400">Display a short tip on the dashboard</p>
            </div>
            <label class="relative inline-flex cursor-pointer items-center">
                <input type="checkbox" class="peer sr-only" id="welcome_toggle" checked>
                <div class="toggle-track relative h-6 w-11 rounded-full bg-slate-200 dark:bg-slate-600 peer-focus:ring-2 peer-focus:ring-emerald-500/20 peer-checked:bg-emerald-500">
                    <span class="toggle-dot absolute left-0.5 top-1 h-4 w-4 rounded-full bg-white shadow border border-slate-200 dark:border-slate-600"></span>
                </div>
            </label>
        </div>
        <div class="flex flex-wrap gap-3 pt-2">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Save changes</button>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Reset to default</button>
        </div>
    </div>
</div>
@endsection
