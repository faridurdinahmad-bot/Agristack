@extends('layouts.app')

@section('title', 'Profit & Loss Analytics')
@section('page-title', 'Profit & Loss Analytics')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Profit & Loss Analytics</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Revenue, costs, and profit overview</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="pl_from" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">From</label>
                <input type="date" id="pl_from" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="pl_to" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">To</label>
                <input type="date" id="pl_to" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div>
                <label for="pl_type" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">View</label>
                <select id="pl_type" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="summary">Summary</option>
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                </select>
            </div>
            <div class="flex items-end gap-2 sm:col-span-2">
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Apply</button>
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Clear</button>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Revenue</p>
            <p class="mt-1 text-2xl font-bold text-emerald-600 dark:text-emerald-400">Rs 12,45,000</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Costs</p>
            <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">Rs 10,05,000</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Net Profit</p>
            <p class="mt-1 text-2xl font-bold text-emerald-600 dark:text-emerald-400">Rs 2,40,000</p>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
        <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200 mb-4">Profit trend (placeholder)</h3>
        <div class="h-48 flex items-end gap-1">
            @foreach ([35, 42, 38, 50, 45, 55, 52, 60, 58, 65] as $h)
                <div class="flex-1 min-w-0 rounded-t bg-emerald-500/70 dark:bg-emerald-500/50" style="height: {{ $h }}%;"></div>
            @endforeach
        </div>
        <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">Dummy chart</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <h3 class="px-4 py-3 text-sm font-semibold text-slate-800 dark:text-slate-200 border-b border-slate-200 dark:border-slate-700">P&amp;L summary (dummy)</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 dark:bg-slate-800/95 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Item</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Amount (Rs)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50"><td class="px-4 py-3 text-slate-800 dark:text-slate-200">Sales</td><td class="px-4 py-3 text-right font-medium text-emerald-600">12,45,000</td></tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50"><td class="px-4 py-3 text-slate-800 dark:text-slate-200">Purchase (COGS)</td><td class="px-4 py-3 text-right">8,20,000</td></tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50"><td class="px-4 py-3 text-slate-800 dark:text-slate-200">Expenses</td><td class="px-4 py-3 text-right">1,85,000</td></tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 border-t border-slate-200 dark:border-slate-700"><td class="px-4 py-3 font-medium text-slate-900 dark:text-white">Net Profit</td><td class="px-4 py-3 text-right font-bold text-emerald-600">2,40,000</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Export</button>
</div>
@endsection
