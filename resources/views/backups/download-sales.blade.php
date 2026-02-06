@extends('layouts.app')

@section('title', 'Download Sales Data as CSV / Excel')
@section('page-title', 'Download Sales Data')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Download Sales Data</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Export sales data as CSV or Excel (UI only)</p>
    </div>

    <form class="space-y-6">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Export Options</h3>
            <div class="space-y-4">
                <div>
                    <label for="export_format" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Format <span class="text-red-500">*</span></label>
                    <select id="export_format" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="csv">CSV</option>
                        <option value="excel">Excel (XLSX)</option>
                    </select>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="date_from" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">From Date</label>
                        <input type="date" id="date_from" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                    <div>
                        <label for="date_to" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">To Date</label>
                        <input type="date" id="date_to" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap gap-3">
            <button type="submit" class="px-6 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Download</button>
            <a href="{{ route('app.backups.dashboard') }}" class="px-6 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
