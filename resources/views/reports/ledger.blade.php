@extends('layouts.app')

@section('title', 'Ledger Reports')
@section('page-title', 'Ledger Reports')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Ledger Reports</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Account-wise ledger and transaction history</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="flex flex-col sm:flex-row sm:items-end gap-3 sm:gap-4">
            <div class="flex items-center gap-2 flex-wrap">
                <label for="ledger_date_from" class="text-sm text-slate-600 dark:text-slate-400">From</label>
                <input type="date" id="ledger_date_from" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                <label for="ledger_date_to" class="text-sm text-slate-600 dark:text-slate-400">To</label>
                <input type="date" id="ledger_date_to" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex-1 min-w-0 max-w-xs">
                <label for="ledger_account" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Account</label>
                <select id="ledger_account" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All accounts</option>
                    <option value="cash">Cash</option>
                    <option value="hbl">HBL - ****4521</option>
                    <option value="ubl">UBL - ****7834</option>
                    <option value="receivables">Receivables</option>
                    <option value="payables">Payables</option>
                </select>
            </div>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Apply</button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Opening Balance</p>
            <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">Rs 2,45,000</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Debit</p>
            <p class="mt-1 text-2xl font-bold text-red-600 dark:text-red-400">Rs 1,82,500</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Credit</p>
            <p class="mt-1 text-2xl font-bold text-emerald-600 dark:text-emerald-400">Rs 2,15,000</p>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto max-h-[calc(100vh-22rem)] overflow-y-auto">
            <table class="w-full">
                <thead class="sticky top-0 z-10 bg-slate-50 dark:bg-slate-800/95 border-b border-slate-200 dark:border-slate-700 shadow-sm">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Particulars</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Debit</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Credit</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Balance</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @php
                        $ledgerRows = [
                            ['date' => '01 Feb 2025', 'particulars' => 'Opening balance', 'debit' => 0, 'credit' => 0, 'balance' => 245000],
                            ['date' => '02 Feb 2025', 'particulars' => 'Sale INV-098', 'debit' => 0, 'credit' => 45000, 'balance' => 290000],
                            ['date' => '03 Feb 2025', 'particulars' => 'Purchase payment', 'debit' => 85000, 'credit' => 0, 'balance' => 205000],
                            ['date' => '04 Feb 2025', 'particulars' => 'Sale INV-099', 'debit' => 0, 'credit' => 32000, 'balance' => 237000],
                            ['date' => '05 Feb 2025', 'particulars' => 'Expense - Utilities', 'debit' => 18500, 'credit' => 0, 'balance' => 218500],
                        ];
                    @endphp
                    @foreach ($ledgerRows as $r)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">{{ $r['date'] }}</td>
                            <td class="px-4 py-3 text-sm text-slate-900 dark:text-slate-100">{{ $r['particulars'] }}</td>
                            <td class="px-4 py-3 text-sm text-right {{ $r['debit'] > 0 ? 'text-red-600 dark:text-red-400 font-medium' : 'text-slate-400' }}">{{ $r['debit'] > 0 ? 'Rs ' . number_format($r['debit']) : '—' }}</td>
                            <td class="px-4 py-3 text-sm text-right {{ $r['credit'] > 0 ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-slate-400' }}">{{ $r['credit'] > 0 ? 'Rs ' . number_format($r['credit']) : '—' }}</td>
                            <td class="px-4 py-3 text-sm text-right font-medium text-slate-900 dark:text-slate-100">Rs {{ number_format($r['balance']) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t border-slate-200 dark:border-slate-700 text-sm text-slate-600 dark:text-slate-400">Showing 1 to 5 of 5 entries</div>
    </div>
</div>
@endsection
