@extends('layouts.app')

@section('title', 'Hold Invoices List')
@section('page-title', 'Hold Invoices List')

@section('content')
<div class="space-y-6">
    {{-- Page Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Hold Invoices List</h2>
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:gap-4 flex-wrap">
            <label for="hold-search" class="sr-only">Search by invoice no or customer name</label>
            <input type="text" id="hold-search" name="search" placeholder="Invoice no / Customer name…"
                class="w-full sm:w-56 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
        </div>
    </div>

    {{-- Hold Invoices Table --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-10">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Invoice Number</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Customer Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Invoice Date</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Total Amount</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Hold Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="hold-invoices-body">
                    @php
                        $sampleHoldInvoices = [
                            ['id' => 1, 'invoice_no' => 'INV-2025-0015', 'customer' => 'Ali Hassan', 'invoice_date' => '05 Feb 2025', 'total' => 85000, 'hold_status' => 'held'],
                            ['id' => 2, 'invoice_no' => 'INV-2025-0014', 'customer' => 'Fatima Khan', 'invoice_date' => '04 Feb 2025', 'total' => 62000, 'hold_status' => 'held'],
                            ['id' => 3, 'invoice_no' => 'INV-2025-0013', 'customer' => 'Rashid Traders', 'invoice_date' => '04 Feb 2025', 'total' => 145000, 'hold_status' => 'held'],
                            ['id' => 4, 'invoice_no' => 'INV-2025-0007', 'customer' => 'Sana Ullah', 'invoice_date' => '27 Jan 2025', 'total' => 38000, 'hold_status' => 'held'],
                            ['id' => 5, 'invoice_no' => 'INV-2025-0006', 'customer' => 'Ahmed Enterprises', 'invoice_date' => '26 Jan 2025', 'total' => 95000, 'hold_status' => 'held'],
                        ];
                    @endphp
                    @foreach ($sampleHoldInvoices as $index => $invoice)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 text-sm font-medium text-slate-900 dark:text-slate-100">{{ $invoice['invoice_no'] }}</td>
                            <td class="px-4 py-3 text-sm text-slate-900 dark:text-slate-100">{{ $invoice['customer'] }}</td>
                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">{{ $invoice['invoice_date'] }}</td>
                            <td class="px-4 py-3 text-sm text-right text-slate-900 dark:text-slate-100">Rs {{ number_format($invoice['total']) }}</td>
                            <td class="px-4 py-3 text-center">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-amber-50 dark:bg-amber-500/10 text-amber-700 dark:text-amber-400 border border-amber-200 dark:border-amber-500/20">Held</span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="#" class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-500/10 hover:bg-emerald-100 dark:hover:bg-emerald-500/20 border border-emerald-200 dark:border-emerald-500/20 transition-colors">
                                        Resume
                                    </a>
                                    <a href="#" class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors">
                                        View
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Empty State (hidden by default) --}}
        <div id="empty-state" class="hidden p-12 text-center">
            <div class="max-w-md mx-auto">
                <svg class="w-16 h-16 mx-auto text-slate-400 dark:text-slate-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                </svg>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">No held invoices found</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">No invoices are currently on hold.</p>
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
