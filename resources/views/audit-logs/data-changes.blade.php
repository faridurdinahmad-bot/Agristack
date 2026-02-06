@extends('layouts.app')

@section('title', 'Data Changes Log')
@section('page-title', 'Data Changes Log')

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
            <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Data change detail</h3>
            <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Dummy modal</p>
        </div>
        <div class="p-6 space-y-3 text-sm">
            <div class="flex justify-between"><span class="text-slate-500 dark:text-slate-400">User</span><span class="text-slate-800 dark:text-slate-200">admin@agristack.com</span></div>
            <div class="flex justify-between"><span class="text-slate-500 dark:text-slate-400">Action</span><span class="text-slate-800 dark:text-slate-200">Updated</span></div>
            <div class="flex justify-between"><span class="text-slate-500 dark:text-slate-400">Module</span><span class="text-slate-800 dark:text-slate-200">Inventory</span></div>
            <div class="flex justify-between"><span class="text-slate-500 dark:text-slate-400">Record</span><span class="text-slate-800 dark:text-slate-200">Product PEST-005</span></div>
            <div class="pt-2 border-t border-slate-200 dark:border-slate-700"><p class="text-slate-500 dark:text-slate-400 mb-1">Description</p><p class="text-slate-700 dark:text-slate-300">Quantity updated from 10 to 8. (Dummy)</p></div>
        </div>
        <div class="p-6 border-t border-slate-200 dark:border-slate-700">
            <label for="audit-detail-modal-toggle" class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 cursor-pointer">Close</label>
        </div>
    </div>
</div>

<div class="space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Data Changes Log</h2>
            <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Record create/update/delete history (UI only)</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Export</button>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Clear</button>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-4">
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="dc_from" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">From</label>
                <input type="date" id="dc_from" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="dc_to" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">To</label>
                <input type="date" id="dc_to" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div>
                <label for="dc_user" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">User</label>
                <select id="dc_user" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="1">admin@agristack.com</option>
                    <option value="2">manager@agristack.com</option>
                </select>
            </div>
            <div>
                <label for="dc_module" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Module</label>
                <select id="dc_module" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="sales">Sales</option>
                    <option value="purchase">Purchase</option>
                    <option value="inventory">Inventory</option>
                </select>
            </div>
            <div>
                <label for="dc_action" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Action</label>
                <select id="dc_action" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="create">Create</option>
                    <option value="update">Update</option>
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div>
                <label for="dc_search" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Search</label>
                <input type="text" id="dc_search" placeholder="Keyword" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
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
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">User</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Action</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Module</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Record</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Description</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50"><td class="px-4 py-3 text-slate-500">1</td><td class="px-4 py-3 text-slate-600 dark:text-slate-400">04 Feb 2025, 10:32</td><td class="px-4 py-3 font-medium text-slate-900 dark:text-slate-100">admin@agristack.com</td><td class="px-4 py-3 text-slate-600 dark:text-slate-400">Updated</td><td class="px-4 py-3 text-slate-600 dark:text-slate-400">Inventory</td><td class="px-4 py-3 text-slate-600 dark:text-slate-400">PEST-005</td><td class="px-4 py-3 text-slate-600 dark:text-slate-400">Quantity 10 to 8</td><td class="px-4 py-3 text-center"><label for="audit-detail-modal-toggle" class="inline-flex px-3 py-1.5 rounded-lg text-xs font-medium text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 cursor-pointer">View</label></td></tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50"><td class="px-4 py-3 text-slate-500">2</td><td class="px-4 py-3 text-slate-600 dark:text-slate-400">04 Feb 2025, 09:00</td><td class="px-4 py-3 font-medium text-slate-900 dark:text-slate-100">manager@agristack.com</td><td class="px-4 py-3 text-slate-600 dark:text-slate-400">Created</td><td class="px-4 py-3 text-slate-600 dark:text-slate-400">Sales</td><td class="px-4 py-3 text-slate-600 dark:text-slate-400">INV-1001</td><td class="px-4 py-3 text-slate-600 dark:text-slate-400">Invoice created</td><td class="px-4 py-3 text-center"><label for="audit-detail-modal-toggle" class="inline-flex px-3 py-1.5 rounded-lg text-xs font-medium text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 cursor-pointer">View</label></td></tr>
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t border-slate-200 dark:border-slate-700 text-sm text-slate-600 dark:text-slate-400">Showing 1 to 2 of 78 (dummy)</div>
    </div>
</div>
@endsection
