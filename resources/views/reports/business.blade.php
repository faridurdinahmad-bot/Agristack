@extends('layouts.app')

@section('title', 'Business Reports')
@section('page-title', 'Business Reports')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Business Reports</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Overview of sales, purchases and business activity</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            <div class="flex flex-col sm:flex-row sm:items-end gap-2 sm:gap-3">
                <div class="flex items-center gap-2">
                    <label for="biz_date_from" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">From</label>
                    <input type="date" id="biz_date_from" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div class="flex items-center gap-2">
                    <label for="biz_date_to" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">To</label>
                    <input type="date" id="biz_date_to" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
            </div>
            <div>
                <label for="biz_report_type" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Report Type</label>
                <select id="biz_report_type" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="sales">Sales Summary</option>
                    <option value="purchase">Purchase Summary</option>
                    <option value="expense">Expense Summary</option>
                    <option value="returns">Returns</option>
                    <option value="invoices">Invoices</option>
                </select>
            </div>
            <div>
                <label for="biz_summary" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Summary By (Optional)</label>
                <select id="biz_summary" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">None</option>
                    <option value="day">Day</option>
                    <option value="week">Week</option>
                    <option value="month">Month</option>
                    <option value="year">Year</option>
                </select>
            </div>
            <div>
                <label for="biz_search" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Search</label>
                <input type="text" id="biz_search" placeholder="Keyword…" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
        </div>
        <div class="flex flex-wrap gap-3 mt-4">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Apply</button>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Clear Filters</button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Sales</p>
            <p class="mt-1 text-2xl font-bold text-emerald-600 dark:text-emerald-400">Rs 8,42,500</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Purchases</p>
            <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">Rs 5,20,000</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Expenses</p>
            <p class="mt-1 text-2xl font-bold text-red-600 dark:text-red-400">Rs 1,05,200</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Invoices (Period)</p>
            <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">42</p>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="px-4 py-3 border-b border-slate-200 dark:border-slate-700">
            <h3 class="text-sm font-semibold text-slate-700 dark:text-slate-300">Activity Summary</h3>
        </div>
        <div class="overflow-x-auto max-h-[calc(100vh-24rem)] overflow-y-auto">
            <table class="w-full">
                <thead class="sticky top-0 z-10 bg-slate-50 dark:bg-slate-800/95 border-b border-slate-200 dark:border-slate-700 shadow-sm">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Report / Activity</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Period</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Count</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Amount (Rs)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @php
                        $bizRows = [
                            ['activity' => 'Sales', 'period' => 'Feb 2025', 'count' => 18, 'amount' => 385000],
                            ['activity' => 'Purchases', 'period' => 'Feb 2025', 'count' => 12, 'amount' => 245000],
                            ['activity' => 'Expenses', 'period' => 'Feb 2025', 'count' => 15, 'amount' => 52200],
                            ['activity' => 'Returns (Sales)', 'period' => 'Feb 2025', 'count' => 2, 'amount' => 8500],
                            ['activity' => 'Returns (Purchase)', 'period' => 'Feb 2025', 'count' => 0, 'amount' => 0],
                        ];
                    @endphp
                    @foreach ($bizRows as $r)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-4 py-3 text-sm font-medium text-slate-900 dark:text-slate-100">{{ $r['activity'] }}</td>
                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">{{ $r['period'] }}</td>
                            <td class="px-4 py-3 text-sm text-right text-slate-900 dark:text-slate-100">{{ $r['count'] }}</td>
                            <td class="px-4 py-3 text-sm text-right font-medium text-slate-900 dark:text-slate-100">Rs {{ number_format($r['amount']) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t border-slate-200 dark:border-slate-700 text-sm text-slate-600 dark:text-slate-400">Showing 1 to 5 of 5 results</div>
    </div>
</div>
@endsection
