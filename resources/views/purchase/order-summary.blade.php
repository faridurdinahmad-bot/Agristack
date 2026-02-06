@extends('layouts.app')

@section('title', 'Purchase Order Summary')
@section('page-title', 'Purchase Order Summary')

@section('content')
<div class="space-y-8">
    {{-- Page Header --}}
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Purchase Order Summary</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Overview of all purchase orders</p>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @php
            $cards = [
                ['label' => 'Total Purchase Orders', 'value' => '24', 'icon' => 'clipboard', 'bg' => 'bg-slate-100 dark:bg-slate-700/50', 'iconColor' => 'text-slate-600 dark:text-slate-400'],
                ['label' => 'Pending Orders', 'value' => '8', 'icon' => 'clock', 'bg' => 'bg-amber-100 dark:bg-amber-500/20', 'iconColor' => 'text-amber-600 dark:text-amber-400'],
                ['label' => 'Completed Orders', 'value' => '14', 'icon' => 'check', 'bg' => 'bg-emerald-100 dark:bg-emerald-500/20', 'iconColor' => 'text-emerald-600 dark:text-emerald-400'],
                ['label' => 'Total Order Amount', 'value' => 'Rs 18,42,500', 'icon' => 'currency', 'bg' => 'bg-blue-100 dark:bg-blue-500/20', 'iconColor' => 'text-blue-600 dark:text-blue-400'],
            ];
        @endphp
        @foreach ($cards as $card)
            <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5 shadow-sm hover:shadow-md hover:border-slate-300 dark:hover:border-slate-500 transition-all duration-200">
                <div class="flex items-start justify-between gap-3">
                    <div class="min-w-0">
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">{{ $card['label'] }}</p>
                        <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white tracking-tight">{{ $card['value'] }}</p>
                    </div>
                    <div class="flex-shrink-0 w-10 h-10 rounded-xl {{ $card['bg'] }} flex items-center justify-center {{ $card['iconColor'] }}">
                        @if($card['icon'] === 'clipboard')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                        @elseif($card['icon'] === 'clock')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        @elseif($card['icon'] === 'check')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        @else
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Filter Bar --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="flex flex-col sm:flex-row sm:items-end gap-3 sm:gap-4">
            <div class="flex items-end gap-2 flex-wrap">
                <label for="summary_date_from" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">From</label>
                <input type="date" id="summary_date_from" name="date_from"
                    class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                <label for="summary_date_to" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">To</label>
                <input type="date" id="summary_date_to" name="date_to"
                    class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="w-full sm:w-44">
                <label for="filter-supplier-summary" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Supplier</label>
                <select id="filter-supplier-summary" name="supplier" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="1">Ahmed Khan</option>
                    <option value="2">Khan Trading Co</option>
                    <option value="3">Agri Supplies Ltd</option>
                    <option value="4">Green Valley Ag</option>
                </select>
            </div>
            <div class="w-full sm:w-40">
                <label for="filter-status-summary" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Status</label>
                <select id="filter-status-summary" name="status" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors whitespace-nowrap">
                Clear Filters
            </button>
        </div>
    </div>

    {{-- Optional: Simple charts (dummy) --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Orders by Status --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <h3 class="text-sm font-semibold text-slate-700 dark:text-slate-300 mb-4">Orders by Status</h3>
            <div class="space-y-3">
                @php
                    $byStatus = [['label' => 'Completed', 'count' => 14, 'pct' => 58, 'color' => 'bg-emerald-500'], ['label' => 'Pending', 'count' => 8, 'pct' => 33, 'color' => 'bg-amber-500'], ['label' => 'Cancelled', 'count' => 2, 'pct' => 9, 'color' => 'bg-red-500']];
                @endphp
                @foreach ($byStatus as $row)
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-slate-600 dark:text-slate-400">{{ $row['label'] }}</span>
                            <span class="font-medium text-slate-900 dark:text-slate-100">{{ $row['count'] }} orders</span>
                        </div>
                        <div class="h-2 rounded-full bg-slate-100 dark:bg-slate-700 overflow-hidden">
                            <div class="h-full rounded-full {{ $row['color'] }}" style="width: {{ $row['pct'] }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Orders by Supplier --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <h3 class="text-sm font-semibold text-slate-700 dark:text-slate-300 mb-4">Orders by Supplier</h3>
            <div class="space-y-3">
                @php
                    $bySupplier = [['name' => 'Khan Trading Co', 'count' => 9], ['name' => 'Ahmed Khan', 'count' => 6], ['name' => 'Agri Supplies Ltd', 'count' => 5], ['name' => 'Green Valley Ag', 'count' => 4]];
                    $maxSupplier = 9;
                @endphp
                @foreach ($bySupplier as $row)
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-slate-600 dark:text-slate-400 truncate pr-2">{{ $row['name'] }}</span>
                            <span class="font-medium text-slate-900 dark:text-slate-100 shrink-0">{{ $row['count'] }}</span>
                        </div>
                        <div class="h-2 rounded-full bg-slate-100 dark:bg-slate-700 overflow-hidden">
                            <div class="h-full rounded-full bg-blue-500" style="width: {{ $maxSupplier ? round($row['count'] / $maxSupplier * 100) : 0 }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Summary Table --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="px-4 py-3 border-b border-slate-200 dark:border-slate-700">
            <h3 class="text-sm font-semibold text-slate-700 dark:text-slate-300">Detail View</h3>
        </div>
        <div class="overflow-x-auto max-h-[calc(100vh-28rem)] overflow-y-auto">
            <table class="w-full">
                <thead class="sticky top-0 z-10 bg-slate-50 dark:bg-slate-800/95 border-b border-slate-200 dark:border-slate-700 shadow-sm">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Order No</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Supplier</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Order Date</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Order Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @php
                        $summaryRows = [
                            ['order_no' => 'PO-2025-0042', 'supplier' => 'Ahmed Khan', 'order_date' => '05 Feb 2025', 'status' => 'pending', 'amount' => 95000],
                            ['order_no' => 'PO-2025-0041', 'supplier' => 'Khan Trading Co', 'order_date' => '04 Feb 2025', 'status' => 'pending', 'amount' => 145000],
                            ['order_no' => 'PO-2025-0040', 'supplier' => 'Agri Supplies Ltd', 'order_date' => '03 Feb 2025', 'status' => 'completed', 'amount' => 52000],
                            ['order_no' => 'PO-2025-0039', 'supplier' => 'Green Valley Ag', 'order_date' => '02 Feb 2025', 'status' => 'pending', 'amount' => 78000],
                            ['order_no' => 'PO-2025-0038', 'supplier' => 'Ahmed Khan', 'order_date' => '01 Feb 2025', 'status' => 'cancelled', 'amount' => 32000],
                            ['order_no' => 'PO-2025-0037', 'supplier' => 'Khan Trading Co', 'order_date' => '28 Jan 2025', 'status' => 'completed', 'amount' => 110000],
                        ];
                    @endphp
                    @foreach ($summaryRows as $row)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-4 py-3 text-sm font-medium text-slate-900 dark:text-slate-100">{{ $row['order_no'] }}</td>
                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">{{ $row['supplier'] }}</td>
                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">{{ $row['order_date'] }}</td>
                            <td class="px-4 py-3 text-center">
                                @if($row['status'] === 'pending')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-amber-50 dark:bg-amber-500/10 text-amber-700 dark:text-amber-400 border border-amber-200 dark:border-amber-500/20">Pending</span>
                                @elseif($row['status'] === 'completed')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">Completed</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-red-50 dark:bg-red-500/10 text-red-700 dark:text-red-400 border border-red-200 dark:border-red-500/20">Cancelled</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm text-right text-slate-900 dark:text-slate-100 font-medium">Rs {{ number_format($row['amount']) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t border-slate-200 dark:border-slate-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <p class="text-sm text-slate-600 dark:text-slate-400">
                Showing <span class="font-medium text-slate-900 dark:text-slate-100">1</span> to <span class="font-medium text-slate-900 dark:text-slate-100">6</span> of <span class="font-medium text-slate-900 dark:text-slate-100">24</span> results
            </p>
            <div class="flex items-center gap-2">
                <button type="button" class="px-3 py-1.5 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-700 cursor-not-allowed" disabled>Previous</button>
                <span class="px-3 py-1.5 rounded-lg text-sm font-medium text-white bg-emerald-600 dark:bg-emerald-500">1</span>
                <button type="button" class="px-3 py-1.5 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Next</button>
            </div>
        </div>
    </div>
</div>
@endsection
