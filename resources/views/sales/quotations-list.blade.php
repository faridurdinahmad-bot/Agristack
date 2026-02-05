@extends('layouts.app')

@section('title', 'Quotations List')
@section('page-title', 'Quotations List')

@section('content')
<div class="space-y-6">
    {{-- Page Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Quotations List</h2>
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:gap-4 flex-wrap">
            <label for="quotations-search" class="sr-only">Search by quotation no or customer name</label>
            <input type="text" id="quotations-search" name="search" placeholder="Quotation no / Customer name…"
                class="w-full sm:w-56 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
        </div>
    </div>

    {{-- Quotations Table --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-10">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Quotation Number</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Customer Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Quotation Date</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Total Amount</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="quotations-list-body">
                    @php
                        $sampleQuotations = [
                            ['id' => 1, 'quotation_no' => 'QUO-2025-0005', 'customer' => 'Ali Hassan', 'quotation_date' => '05 Feb 2025', 'total' => 103000, 'status' => 'open'],
                            ['id' => 2, 'quotation_no' => 'QUO-2025-0004', 'customer' => 'Fatima Khan', 'quotation_date' => '03 Feb 2025', 'total' => 45000, 'status' => 'accepted'],
                            ['id' => 3, 'quotation_no' => 'QUO-2025-0003', 'customer' => 'Rashid Traders', 'quotation_date' => '01 Feb 2025', 'total' => 125000, 'status' => 'open'],
                            ['id' => 4, 'quotation_no' => 'QUO-2025-0002', 'customer' => 'Sana Ullah', 'quotation_date' => '28 Jan 2025', 'total' => 28500, 'status' => 'expired'],
                            ['id' => 5, 'quotation_no' => 'QUO-2025-0001', 'customer' => 'Ahmed Enterprises', 'quotation_date' => '25 Jan 2025', 'total' => 95000, 'status' => 'open'],
                        ];
                    @endphp
                    @foreach ($sampleQuotations as $index => $quotation)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 text-sm font-medium text-slate-900 dark:text-slate-100">{{ $quotation['quotation_no'] }}</td>
                            <td class="px-4 py-3 text-sm text-slate-900 dark:text-slate-100">{{ $quotation['customer'] }}</td>
                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">{{ $quotation['quotation_date'] }}</td>
                            <td class="px-4 py-3 text-sm text-right text-slate-900 dark:text-slate-100">Rs {{ number_format($quotation['total']) }}</td>
                            <td class="px-4 py-3 text-center">
                                @if($quotation['status'] == 'open')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-blue-50 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400 border border-blue-200 dark:border-blue-500/20">Open</span>
                                @elseif($quotation['status'] == 'accepted')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">Accepted</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-600">Expired</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="#" class="p-2 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50 transition-colors" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <a href="#" class="p-2 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50 transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">No quotations found</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">No quotations have been created yet.</p>
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
