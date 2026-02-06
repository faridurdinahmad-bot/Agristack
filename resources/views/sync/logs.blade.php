@extends('layouts.app')

@section('title', 'Sync Logs')
@section('page-title', 'Sync Logs')

@section('content')
<style>
    #log-detail-modal-toggle { display: none; }
    #log-detail-modal { display: none; }
    #log-detail-modal-toggle:checked ~ #log-detail-modal { display: flex; }
</style>
<input type="checkbox" id="log-detail-modal-toggle" class="sr-only" aria-hidden="true" />
<div id="log-detail-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <label for="log-detail-modal-toggle" class="absolute inset-0 bg-black/50 backdrop-blur-sm cursor-pointer" aria-label="Close modal"></label>
    <div class="relative z-10 bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-600 shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-slate-200 dark:border-slate-700 sticky top-0 bg-white dark:bg-slate-800">
            <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Sync run details</h3>
            <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">04 Feb 2025, 10:32 AM — Full sync</p>
        </div>
        <div class="p-6 space-y-3 text-sm">
            <div class="flex justify-between"><span class="text-slate-500 dark:text-slate-400">Status</span><span class="font-medium text-emerald-600 dark:text-emerald-400">Success</span></div>
            <div class="flex justify-between"><span class="text-slate-500 dark:text-slate-400">Products synced</span><span class="text-slate-800 dark:text-slate-200">124</span></div>
            <div class="flex justify-between"><span class="text-slate-500 dark:text-slate-400">Orders synced</span><span class="text-slate-800 dark:text-slate-200">18</span></div>
            <div class="flex justify-between"><span class="text-slate-500 dark:text-slate-400">Duration</span><span class="text-slate-800 dark:text-slate-200">~12 sec</span></div>
            <div class="pt-2 border-t border-slate-200 dark:border-slate-700">
                <p class="text-slate-500 dark:text-slate-400 mb-1">Message</p>
                <p class="text-slate-700 dark:text-slate-300">Sync completed without errors. (Dummy detail)</p>
            </div>
        </div>
        <div class="p-6 border-t border-slate-200 dark:border-slate-700">
            <label for="log-detail-modal-toggle" class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 cursor-pointer">Close</label>
        </div>
    </div>
</div>

<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Sync Logs</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">History of sync runs</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div>
                <label for="log_type" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Type</label>
                <select id="log_type" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="full">Full sync</option>
                    <option value="products">Products only</option>
                    <option value="orders">Orders only</option>
                </select>
            </div>
            <div>
                <label for="log_status" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Status</label>
                <select id="log_status" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="success">Success</option>
                    <option value="failed">Failed</option>
                    <option value="partial">Partial</option>
                </select>
            </div>
            <div>
                <label for="log_date_from" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">From date</label>
                <input type="date" id="log_date_from" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div>
                <label for="log_date_to" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">To date</label>
                <input type="date" id="log_date_to" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
        </div>
        <div class="flex flex-wrap gap-3 mt-4">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Apply</button>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Clear</button>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 dark:bg-slate-800/95 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-10">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Date & time</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Type</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Items</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @php
                        $logs = [
                            ['date' => '04 Feb 2025, 10:32 AM', 'type' => 'Full sync', 'status' => 'Success', 'items' => '124 products, 18 orders'],
                            ['date' => '04 Feb 2025, 08:15 AM', 'type' => 'Products only', 'status' => 'Success', 'items' => '124 products'],
                            ['date' => '03 Feb 2025, 11:00 PM', 'type' => 'Full sync', 'status' => 'Success', 'items' => '122 products, 15 orders'],
                            ['date' => '03 Feb 2025, 02:20 PM', 'type' => 'Orders only', 'status' => 'Partial', 'items' => '12 orders (2 skipped)'],
                        ];
                    @endphp
                    @foreach ($logs as $i => $log)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">{{ $i + 1 }}</td>
                            <td class="px-4 py-3 text-sm text-slate-800 dark:text-slate-200">{{ $log['date'] }}</td>
                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">{{ $log['type'] }}</td>
                            <td class="px-4 py-3">
                                @if ($log['status'] === 'Success')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">Success</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-amber-50 dark:bg-amber-500/10 text-amber-700 dark:text-amber-400 border border-amber-200 dark:border-amber-500/20">{{ $log['status'] }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">{{ $log['items'] }}</td>
                            <td class="px-4 py-3 text-center">
                                <label for="log-detail-modal-toggle" class="inline-flex p-2 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50 transition-colors cursor-pointer" title="View details">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t border-slate-200 dark:border-slate-700 text-sm text-slate-600 dark:text-slate-400">Showing 1 to 4 of 4 results</div>
    </div>
</div>
@endsection
