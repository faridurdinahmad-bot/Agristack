@extends('layouts.app')

@section('title', 'Error Logs')
@section('page-title', 'Error Logs')

@section('content')
<style>
    #audit-detail-modal-toggle { display: none; }
    #audit-detail-modal { display: none; }
    #audit-detail-modal-toggle:checked ~ #audit-detail-modal { display: flex; }
</style>
<input type="checkbox" id="audit-detail-modal-toggle" class="sr-only" aria-hidden="true" />
<div id="audit-detail-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <label for="audit-detail-modal-toggle" class="absolute inset-0 bg-black/50 backdrop-blur-sm cursor-pointer" aria-label="Close"></label>
    <div class="relative z-10 bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-600 shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-slate-200 dark:border-slate-700">
            <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Error log detail</h3>
            <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Dummy modal</p>
        </div>
        <div class="p-6 space-y-3 text-sm">
            <div class="flex justify-between"><span class="text-slate-500 dark:text-slate-400">Date</span><span class="text-slate-800 dark:text-slate-200">03 Feb 2025, 2:45 PM</span></div>
            <div class="flex justify-between"><span class="text-slate-500 dark:text-slate-400">Level</span><span class="text-slate-800 dark:text-slate-200">Error</span></div>
            <div class="flex justify-between"><span class="text-slate-500 dark:text-slate-400">File</span><span class="text-slate-800 dark:text-slate-200">OrderController.php:142</span></div>
            <div class="pt-2 border-t border-slate-200 dark:border-slate-700"><p class="text-slate-500 dark:text-slate-400 mb-1">Message</p><p class="text-slate-700 dark:text-slate-300">Undefined array key. (Dummy error)</p></div>
        </div>
        <div class="p-6 border-t border-slate-200 dark:border-slate-700">
            <label for="audit-detail-modal-toggle" class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 cursor-pointer">Close</label>
        </div>
    </div>
</div>

<div class="space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Error Logs</h2>
            <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Application errors and exceptions (UI only)</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Export</button>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Clear</button>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="el_from" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">From</label>
                <input type="date" id="el_from" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="el_to" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">To</label>
                <input type="date" id="el_to" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div>
                <label for="el_level" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Level</label>
                <select id="el_level" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="error">Error</option>
                    <option value="warning">Warning</option>
                    <option value="critical">Critical</option>
                </select>
            </div>
            <div class="sm:col-span-2">
                <label for="el_search" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Search</label>
                <input type="text" id="el_search" placeholder="Message, file" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
        </div>
        <div class="flex flex-wrap gap-3 mt-4">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Apply</button>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Clear filters</button>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 dark:bg-slate-800/95 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase w-10">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Level</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Message</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">File</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50"><td class="px-4 py-3 text-slate-500">1</td><td class="px-4 py-3 text-slate-600 dark:text-slate-400">03 Feb 2025, 2:45 PM</td><td class="px-4 py-3"><span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-red-50 dark:bg-red-500/10 text-red-700 dark:text-red-400 border border-red-200 dark:border-red-500/20">Error</span></td><td class="px-4 py-3 text-slate-600 dark:text-slate-400">Undefined array key</td><td class="px-4 py-3 text-slate-500 dark:text-slate-400 text-xs">OrderController.php:142</td><td class="px-4 py-3 text-center"><label for="audit-detail-modal-toggle" class="inline-flex px-3 py-1.5 rounded-lg text-xs font-medium text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 cursor-pointer">View</label></td></tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50"><td class="px-4 py-3 text-slate-500">2</td><td class="px-4 py-3 text-slate-600 dark:text-slate-400">02 Feb 2025, 11:00 AM</td><td class="px-4 py-3"><span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-amber-50 dark:bg-amber-500/10 text-amber-700 dark:text-amber-400 border border-amber-200 dark:border-amber-500/20">Warning</span></td><td class="px-4 py-3 text-slate-600 dark:text-slate-400">Deprecated function called</td><td class="px-4 py-3 text-slate-500 dark:text-slate-400 text-xs">Helper.php:88</td><td class="px-4 py-3 text-center"><label for="audit-detail-modal-toggle" class="inline-flex px-3 py-1.5 rounded-lg text-xs font-medium text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 cursor-pointer">View</label></td></tr>
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t border-slate-200 dark:border-slate-700 text-sm text-slate-600 dark:text-slate-400">Showing 1 to 2 of 5 (dummy)</div>
    </div>
</div>
@endsection
