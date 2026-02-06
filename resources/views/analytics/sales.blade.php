@extends('layouts.app')

@section('title', 'Sales Analytics')
@section('page-title', 'Sales Analytics')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Sales Analytics</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Sales performance and trends</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="sales_from" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">From</label>
                <input type="date" id="sales_from" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="sales_to" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">To</label>
                <input type="date" id="sales_to" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div>
                <label for="sales_channel" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Channel</label>
                <select id="sales_channel" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="retail">Retail</option>
                    <option value="wholesale">Wholesale</option>
                </select>
            </div>
            <div class="flex items-end gap-2 sm:col-span-2">
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Apply</button>
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Clear</button>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Sales</p>
            <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">Rs 12,45,000</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Invoices</p>
            <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">248</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Avg. Order</p>
            <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">Rs 5,020</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Returns</p>
            <p class="mt-1 text-2xl font-bold text-amber-600 dark:text-amber-400">12</p>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
        <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200 mb-4">Sales over time (placeholder)</h3>
        <div class="h-48 flex items-end gap-1">
            @foreach ([40, 55, 62, 48, 70, 65, 58, 72, 78, 85] as $h)
                <div class="flex-1 min-w-0 rounded-t bg-emerald-500/70 dark:bg-emerald-500/50" style="height: {{ $h }}%;"></div>
            @endforeach
        </div>
        <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">Dummy chart</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <h3 class="px-4 py-3 text-sm font-semibold text-slate-800 dark:text-slate-200 border-b border-slate-200 dark:border-slate-700">Top 5 products by sales</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 dark:bg-slate-800/95 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Product</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Qty Sold</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50"><td class="px-4 py-3 text-slate-500">1</td><td class="px-4 py-3 font-medium text-slate-900 dark:text-slate-100">Urea 50kg</td><td class="px-4 py-3 text-right">320</td><td class="px-4 py-3 text-right font-medium">Rs 4,80,000</td></tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50"><td class="px-4 py-3 text-slate-500">2</td><td class="px-4 py-3 font-medium text-slate-900 dark:text-slate-100">Wheat Seed</td><td class="px-4 py-3 text-right">180</td><td class="px-4 py-3 text-right font-medium">Rs 3,60,000</td></tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50"><td class="px-4 py-3 text-slate-500">3</td><td class="px-4 py-3 font-medium text-slate-900 dark:text-slate-100">DAP 50kg</td><td class="px-4 py-3 text-right">150</td><td class="px-4 py-3 text-right font-medium">Rs 2,10,000</td></tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50"><td class="px-4 py-3 text-slate-500">4</td><td class="px-4 py-3 font-medium text-slate-900 dark:text-slate-100">Pesticide 1L</td><td class="px-4 py-3 text-right">95</td><td class="px-4 py-3 text-right font-medium">Rs 1,42,500</td></tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50"><td class="px-4 py-3 text-slate-500">5</td><td class="px-4 py-3 font-medium text-slate-900 dark:text-slate-100">Maize Seed</td><td class="px-4 py-3 text-right">80</td><td class="px-4 py-3 text-right font-medium">Rs 52,000</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Export</button>
</div>
@endsection
