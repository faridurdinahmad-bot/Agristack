@extends('layouts.app')

@section('title', 'Stock Report')
@section('page-title', 'Stock Report')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Stock Report</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Current inventory and stock levels</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-4">
            <div class="sm:col-span-2 flex flex-col sm:flex-row sm:items-end gap-2 sm:gap-3">
                <div class="flex items-center gap-2">
                    <label for="stock_date_from" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">From</label>
                    <input type="date" id="stock_date_from" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div class="flex items-center gap-2">
                    <label for="stock_date_to" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">To</label>
                    <input type="date" id="stock_date_to" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
            </div>
            <div>
                <label for="stock_search" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Search</label>
                <input type="text" id="stock_search" placeholder="Product name, SKU…" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div>
                <label for="stock_product" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Product / Item</label>
                <select id="stock_product" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="fert">Fertilizers</option>
                    <option value="seed">Seeds</option>
                    <option value="pest">Pesticides</option>
                </select>
            </div>
            <div>
                <label for="stock_category" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Category</label>
                <select id="stock_category" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="fertilizers">Fertilizers</option>
                    <option value="seeds">Seeds</option>
                    <option value="pesticides">Pesticides</option>
                    <option value="tools">Tools</option>
                </select>
            </div>
            <div>
                <label for="stock_warehouse" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Warehouse / Location</label>
                <select id="stock_warehouse" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="main">Main Store</option>
                    <option value="warehouse-a">Warehouse A</option>
                    <option value="warehouse-b">Warehouse B</option>
                </select>
            </div>
            <div>
                <label for="stock_status" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Stock Status</label>
                <select id="stock_status" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="in_stock">In Stock</option>
                    <option value="low">Low Stock</option>
                    <option value="out">Out of Stock</option>
                </select>
            </div>
        </div>
        <div class="flex flex-wrap gap-3 mt-4">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Apply</button>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Clear Filters</button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Products</p>
            <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">124</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">In Stock</p>
            <p class="mt-1 text-2xl font-bold text-emerald-600 dark:text-emerald-400">118</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Low Stock</p>
            <p class="mt-1 text-2xl font-bold text-amber-600 dark:text-amber-400">6</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Out of Stock</p>
            <p class="mt-1 text-2xl font-bold text-red-600 dark:text-red-400">0</p>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto max-h-[calc(100vh-22rem)] overflow-y-auto">
            <table class="w-full">
                <thead class="sticky top-0 z-10 bg-slate-50 dark:bg-slate-800/95 border-b border-slate-200 dark:border-slate-700 shadow-sm">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-10">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Product</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">SKU</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Qty</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Value (Rs)</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @php
                        $stockRows = [
                            ['product' => 'Urea Fertilizer 50kg', 'sku' => 'FERT-001', 'qty' => 450, 'value' => 225000],
                            ['product' => 'Wheat Seed Premium', 'sku' => 'SEED-012', 'qty' => 120, 'value' => 96000],
                            ['product' => 'Pesticide 1L', 'sku' => 'PEST-005', 'qty' => 8, 'value' => 12000],
                            ['product' => 'DAP Fertilizer 50kg', 'sku' => 'FERT-002', 'qty' => 200, 'value' => 140000],
                            ['product' => 'Maize Seed', 'sku' => 'SEED-008', 'qty' => 85, 'value' => 42500],
                        ];
                    @endphp
                    @foreach ($stockRows as $i => $r)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">{{ $i + 1 }}</td>
                            <td class="px-4 py-3 text-sm font-medium text-slate-900 dark:text-slate-100">{{ $r['product'] }}</td>
                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">{{ $r['sku'] }}</td>
                            <td class="px-4 py-3 text-sm text-right text-slate-900 dark:text-slate-100">{{ number_format($r['qty']) }}</td>
                            <td class="px-4 py-3 text-sm text-right text-slate-900 dark:text-slate-100 font-medium">Rs {{ number_format($r['value']) }}</td>
                            <td class="px-4 py-3 text-center">
                                @if($r['qty'] < 10)
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-amber-50 dark:bg-amber-500/10 text-amber-700 dark:text-amber-400 border border-amber-200 dark:border-amber-500/20">Low</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">In Stock</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t border-slate-200 dark:border-slate-700 text-sm text-slate-600 dark:text-slate-400">Showing 1 to 5 of 124 results</div>
    </div>
</div>
@endsection
