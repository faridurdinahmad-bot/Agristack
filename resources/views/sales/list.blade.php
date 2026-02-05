@extends('layouts.app')

@section('title', 'Sales List')
@section('page-title', 'Sales List')

@section('content')
<div class="space-y-6">
    {{-- Page Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Sales List</h2>
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:gap-4 flex-wrap">
            <div class="flex items-center gap-2 flex-wrap">
                <label for="date_from" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">From</label>
                <input type="date" id="date_from" name="date_from"
                    class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                <label for="date_to" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">To</label>
                <input type="date" id="date_to" name="date_to"
                    class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <label for="sales-search" class="sr-only">Search by invoice no or customer name</label>
            <input type="text" id="sales-search" name="search" placeholder="Invoice no / Customer name…"
                class="w-full sm:w-56 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            <a href="{{ route('app.sales.add') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors whitespace-nowrap">
                <span aria-hidden="true">+</span>
                Add Sale
            </a>
        </div>
    </div>

    {{-- Filter Bar --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="flex flex-col sm:flex-row sm:items-end gap-3 sm:gap-4">
            <div class="flex-1 min-w-0">
                <label for="filter-customer" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Customer</label>
                <input type="text" id="filter-customer" name="filter_customer" placeholder="Search customer…"
                    class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none" autocomplete="off">
            </div>
            <div class="w-full sm:w-40">
                <label for="filter-payment-status" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Payment Status</label>
                <select id="filter-payment-status" name="payment_status" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="paid">Paid</option>
                    <option value="partial">Partial</option>
                    <option value="due">Due</option>
                </select>
            </div>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors whitespace-nowrap">
                Clear Filters
            </button>
        </div>
    </div>

    {{-- Sales Table (sticky header on scroll) --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto max-h-[calc(100vh-20rem)] overflow-y-auto">
            <table class="w-full">
                <thead class="sticky top-0 z-10 bg-slate-50 dark:bg-slate-800/95 border-b border-slate-200 dark:border-slate-700 shadow-sm">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-10">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Invoice No</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Sale Date</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Customer Name</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Total Amount</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Paid Amount</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Due Amount</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Payment Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="sales-table-body">
                    @php
                        $sampleSales = [
                            ['id' => 1, 'invoice_no' => 'INV-2025-0012', 'sale_date' => '04 Feb 2025', 'customer' => 'Ali Hassan', 'total' => 103000, 'paid' => 103000, 'due' => 0, 'status' => 'paid'],
                            ['id' => 2, 'invoice_no' => 'INV-2025-0011', 'sale_date' => '03 Feb 2025', 'customer' => 'Fatima Khan', 'total' => 45000, 'paid' => 25000, 'due' => 20000, 'status' => 'partial'],
                            ['id' => 3, 'invoice_no' => 'INV-2025-0010', 'sale_date' => '02 Feb 2025', 'customer' => 'Rashid Traders', 'total' => 125000, 'paid' => 0, 'due' => 125000, 'status' => 'due'],
                            ['id' => 4, 'invoice_no' => 'INV-2025-0009', 'sale_date' => '01 Feb 2025', 'customer' => 'Sana Ullah', 'total' => 28500, 'paid' => 28500, 'due' => 0, 'status' => 'paid'],
                            ['id' => 5, 'invoice_no' => 'INV-2025-0008', 'sale_date' => '28 Jan 2025', 'customer' => 'Ali Hassan', 'total' => 52000, 'paid' => 30000, 'due' => 22000, 'status' => 'partial'],
                        ];
                    @endphp
                    @foreach ($sampleSales as $index => $sale)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 text-sm font-medium text-slate-900 dark:text-slate-100">{{ $sale['invoice_no'] }}</td>
                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">{{ $sale['sale_date'] }}</td>
                            <td class="px-4 py-3 text-sm text-slate-900 dark:text-slate-100">{{ $sale['customer'] }}</td>
                            <td class="px-4 py-3 text-sm text-right text-slate-900 dark:text-slate-100">Rs {{ number_format($sale['total']) }}</td>
                            <td class="px-4 py-3 text-sm text-right text-slate-900 dark:text-slate-100">Rs {{ number_format($sale['paid']) }}</td>
                            <td class="px-4 py-3 text-sm text-right">
                                @if($sale['due'] > 0)
                                    <span class="font-medium text-amber-600 dark:text-amber-400">Rs {{ number_format($sale['due']) }}</span>
                                @else
                                    <span class="text-slate-500 dark:text-slate-400">—</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                @if($sale['status'] == 'paid')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">Paid</span>
                                @elseif($sale['status'] == 'partial')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-amber-50 dark:bg-amber-500/10 text-amber-700 dark:text-amber-400 border border-amber-200 dark:border-amber-500/20">Partial</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-red-50 dark:bg-red-500/10 text-red-700 dark:text-red-400 border border-red-200 dark:border-red-500/20">Due</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-1.5">
                                    <a href="#" class="p-2 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50 transition-colors" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <a href="#" class="p-2 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50 transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <a href="{{ route('app.sales.return') }}?ref={{ urlencode($sale['invoice_no']) }}" class="p-2 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50 transition-colors" title="Return">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Empty State (hidden when table has rows) --}}
        <div id="sales-empty-state" class="hidden p-12 text-center">
            <div class="max-w-md mx-auto">
                <svg class="w-16 h-16 mx-auto text-slate-400 dark:text-slate-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                </svg>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">No sales found</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Sales will appear here. Create your first sale to get started.</p>
                <a href="{{ route('app.sales.add') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors">
                    <span aria-hidden="true">+</span>
                    Add Sale
                </a>
            </div>
        </div>

        {{-- Pagination UI --}}
        <div class="px-4 py-3 border-t border-slate-200 dark:border-slate-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <p class="text-sm text-slate-600 dark:text-slate-400">
                Showing <span class="font-medium text-slate-900 dark:text-slate-100">1</span> to <span class="font-medium text-slate-900 dark:text-slate-100">5</span> of <span class="font-medium text-slate-900 dark:text-slate-100">5</span> results
            </p>
            <div class="flex items-center gap-2">
                <button type="button" class="px-3 py-1.5 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-700 cursor-not-allowed" disabled>Previous</button>
                <span class="px-3 py-1.5 rounded-lg text-sm font-medium text-white bg-emerald-600 dark:bg-emerald-500">1</span>
                <button type="button" class="px-3 py-1.5 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-700 cursor-not-allowed" disabled>Next</button>
            </div>
        </div>
    </div>
</div>
@endsection
