@extends('layouts.app')

@section('title', 'Profit & Loss')
@section('page-title', 'Profit & Loss')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Profit & Loss</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Revenue, costs and net profit overview</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="flex flex-col sm:flex-row sm:items-end gap-3 sm:gap-4">
            <div class="flex items-center gap-2 flex-wrap">
                <label for="pl_date_from" class="text-sm text-slate-600 dark:text-slate-400">From</label>
                <input type="date" id="pl_date_from" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                <label for="pl_date_to" class="text-sm text-slate-600 dark:text-slate-400">To</label>
                <input type="date" id="pl_date_to" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Apply</button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Revenue</p>
            <p class="mt-1 text-2xl font-bold text-emerald-600 dark:text-emerald-400">Rs 8,42,500</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Cost</p>
            <p class="mt-1 text-2xl font-bold text-red-600 dark:text-red-400">Rs 5,20,000</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Net Profit</p>
            <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">Rs 3,22,500</p>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="px-4 py-3 border-b border-slate-200 dark:border-slate-700">
            <h3 class="text-sm font-semibold text-slate-700 dark:text-slate-300">Summary (Jan – Feb 2025)</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 dark:bg-slate-800/95 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Item</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Amount (Rs)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50"><td class="px-4 py-3 text-sm font-medium text-slate-900 dark:text-slate-100">Sales</td><td class="px-4 py-3 text-sm text-right text-emerald-600 dark:text-emerald-400 font-medium">8,42,500</td></tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50"><td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">Cost of goods</td><td class="px-4 py-3 text-sm text-right text-slate-900 dark:text-slate-100">4,85,000</td></tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50"><td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">Expenses</td><td class="px-4 py-3 text-sm text-right text-slate-900 dark:text-slate-100">35,000</td></tr>
                    <tr class="bg-slate-50 dark:bg-slate-800/50"><td class="px-4 py-3 text-sm font-semibold text-slate-900 dark:text-white">Net Profit</td><td class="px-4 py-3 text-sm text-right font-bold text-slate-900 dark:text-white">3,22,500</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
