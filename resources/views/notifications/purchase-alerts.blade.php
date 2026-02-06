@extends('layouts.app')

@section('title', 'Purchase Alerts')
@section('page-title', 'Purchase Alerts')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Purchase Alerts</h2>
            <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Purchase and supplier notifications (UI only)</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Mark as read</button>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Clear</button>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="n_po_from" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">From</label>
                <input type="date" id="n_po_from" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="n_po_to" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">To</label>
                <input type="date" id="n_po_to" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div>
                <label for="n_po_status" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Status</label>
                <select id="n_po_status" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="unread">Unread</option>
                    <option value="read">Read</option>
                </select>
            </div>
            <div class="flex items-end gap-2">
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Apply</button>
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Clear</button>
            </div>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 divide-y divide-slate-200 dark:divide-slate-700">
        <label class="flex gap-3 px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-800/50 cursor-pointer">
            <input type="checkbox" class="rounded border-slate-300 text-emerald-600 mt-1">
            <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0 mt-2"></span>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-slate-900 dark:text-white">PO delivered</p>
                <p class="text-sm text-slate-600 dark:text-slate-400 truncate">PO-4521 from Agri Supply Co has been delivered.</p>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">04 Feb 2025, 11:00 AM</p>
            </div>
            <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 shrink-0">View</button>
        </label>
        <label class="flex gap-3 px-4 py-3 hover:bg-slate-50 dark:hover:bg-slate-800/50 cursor-pointer bg-slate-50/50 dark:bg-slate-800/30">
            <input type="checkbox" class="rounded border-slate-300 text-emerald-600 mt-1">
            <span class="w-2 h-2 rounded-full bg-slate-300 dark:bg-slate-600 shrink-0 mt-2"></span>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-slate-700 dark:text-slate-300">Supplier confirmation</p>
                <p class="text-sm text-slate-500 dark:text-slate-400 truncate">Seed Plus Ltd confirmed PO-4520.</p>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">30 Jan 2025, 4:20 PM</p>
            </div>
            <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700 shrink-0">View</button>
        </label>
    </div>
    <div class="px-4 py-2 text-sm text-slate-600 dark:text-slate-400">Showing 1 to 2 of 5 (dummy)</div>
</div>
@endsection
