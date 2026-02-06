@extends('layouts.app')

@section('title', 'Appearance & Preferences')
@section('page-title', 'Appearance & Preferences')

@section('content')
<style>
    .toggle-dot { transition: transform 0.2s; }
    .peer:checked ~ .toggle-track .toggle-dot { transform: translateX(1.25rem); }
</style>

<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Appearance & Preferences</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Theme, layout, and display options</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5 space-y-6">
        <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200">Theme</h3>
        <div class="flex flex-wrap gap-3">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="theme" value="light" class="rounded-full border-slate-300 text-emerald-600 focus:ring-emerald-500" checked>
                <span class="text-sm text-slate-800 dark:text-slate-200">Light</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="theme" value="dark" class="rounded-full border-slate-300 text-emerald-600 focus:ring-emerald-500">
                <span class="text-sm text-slate-800 dark:text-slate-200">Dark</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="theme" value="system" class="rounded-full border-slate-300 text-emerald-600 focus:ring-emerald-500">
                <span class="text-sm text-slate-800 dark:text-slate-200">System</span>
            </label>
        </div>
        <div class="flex items-center justify-between gap-4 py-2 border-t border-slate-200 dark:border-slate-700">
            <div>
                <p class="text-sm font-medium text-slate-800 dark:text-slate-200">Compact sidebar</p>
                <p class="text-xs text-slate-500 dark:text-slate-400">Show icons only when collapsed</p>
            </div>
            <label class="relative inline-flex cursor-pointer items-center">
                <input type="checkbox" class="peer sr-only" id="compact_sidebar">
                <div class="toggle-track relative h-6 w-11 rounded-full bg-slate-200 dark:bg-slate-600 peer-focus:ring-2 peer-focus:ring-emerald-500/20 peer-checked:bg-emerald-500">
                    <span class="toggle-dot absolute left-0.5 top-1 h-4 w-4 rounded-full bg-white shadow border border-slate-200 dark:border-slate-600"></span>
                </div>
            </label>
        </div>
        <div class="flex flex-wrap gap-3 pt-2">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 shadow-md">Save</button>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5 space-y-4">
        <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200">Barcode & Printers</h3>
        <div>
            <label for="barcode_format" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Default barcode format</label>
            <select id="barcode_format" class="w-full max-w-xs rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                <option value="code128">Code 128</option>
                <option value="code39">Code 39</option>
                <option value="ean13">EAN-13</option>
            </select>
        </div>
        <div>
            <label for="default_printer" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Default printer</label>
            <select id="default_printer" class="w-full max-w-xs rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                <option value="">None</option>
                <option value="receipt">Receipt Printer</option>
                <option value="label">Label Printer</option>
            </select>
        </div>
        <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 shadow-md">Save</button>
    </div>
</div>
@endsection
