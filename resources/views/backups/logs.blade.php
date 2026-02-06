@extends('layouts.app')

@section('title', 'Backup Logs')
@section('page-title', 'Backup Logs')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Backup Logs</h2>
            <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">View backup operation logs (UI only)</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Clear Logs</button>
        </div>
    </div>

    {{-- Filters --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="log_from" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">From</label>
                <input type="date" id="log_from" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="log_to" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">To</label>
                <input type="date" id="log_to" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div>
                <label for="log_type" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Type</label>
                <select id="log_type" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="create">Create</option>
                    <option value="restore">Restore</option>
                    <option value="delete">Delete</option>
                    <option value="download">Download</option>
                </select>
            </div>
            <div>
                <label for="log_status" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Status</label>
                <select id="log_status" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="success">Success</option>
                    <option value="failed">Failed</option>
                </select>
            </div>
        </div>
        <div class="flex flex-wrap gap-3 mt-4">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Apply</button>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Clear filters</button>
        </div>
    </div>

    {{-- Logs Table --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 dark:bg-slate-800/95 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase w-10">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Date & Time</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Action</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Backup</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Message</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                        <td class="px-4 py-3 text-slate-500">1</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">04 Feb 2025, 2:00 AM</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Create</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Full Backup</td>
                        <td class="px-4 py-3"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">Success</span></td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Backup created successfully (125 MB)</td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                        <td class="px-4 py-3 text-slate-500">2</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">03 Feb 2025, 2:00 AM</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Create</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Full Backup</td>
                        <td class="px-4 py-3"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">Success</span></td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Backup created successfully (124 MB)</td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                        <td class="px-4 py-3 text-slate-500">3</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">02 Feb 2025, 10:15 AM</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Download</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Full Backup - 01 Feb</td>
                        <td class="px-4 py-3"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">Success</span></td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Backup downloaded successfully</td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                        <td class="px-4 py-3 text-slate-500">4</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">01 Feb 2025, 2:00 AM</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Create</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Full Backup</td>
                        <td class="px-4 py-3"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-red-100 dark:bg-red-500/20 text-red-700 dark:text-red-400">Failed</span></td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Insufficient storage space</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t border-slate-200 dark:border-slate-700 text-sm text-slate-600 dark:text-slate-400">Showing 1 to 4 of 156 (dummy)</div>
    </div>
</div>
@endsection
