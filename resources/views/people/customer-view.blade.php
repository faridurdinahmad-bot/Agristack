@extends('layouts.app')

@section('title', 'Customer Details')
@section('page-title', 'Customer Details')

@section('content')
<div class="max-w-5xl mx-auto p-6 space-y-6">
    {{-- Back + Edit --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <a href="{{ route('app.people.customers') }}" class="inline-flex items-center gap-2 text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Customers
        </a>
        <button type="button" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
            Edit Customer
        </button>
    </div>

    {{-- Basic Info Card --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h1 class="text-2xl font-semibold text-slate-900 dark:text-white mb-1">Ali Hassan</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400 mb-5">Customer details — read-only</p>
        <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <dt class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-0.5">Phone</dt>
                <dd class="text-sm text-slate-900 dark:text-slate-100">+92 300 1112233</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-0.5">Email</dt>
                <dd class="text-sm text-slate-900 dark:text-slate-100">ali@example.com</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-0.5">Status</dt>
                <dd>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">Active</span>
                </dd>
            </div>
            <div class="md:col-span-2">
                <dt class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-0.5">Address</dt>
                <dd class="text-sm text-slate-900 dark:text-slate-100">123 Main St, Faisalabad</dd>
            </div>
        </dl>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1">Total Purchases</p>
            <p class="text-xl font-semibold text-slate-900 dark:text-white">Rs 125,000</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1">Total Paid</p>
            <p class="text-xl font-semibold text-slate-900 dark:text-white">Rs 110,000</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1">Due Balance</p>
            <p class="text-xl font-semibold text-amber-600 dark:text-amber-400">Rs 15,000</p>
        </div>
    </div>

    {{-- Recent Transactions (dummy layout) --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Recent Transactions</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-0.5">Last 10 transactions — UI only</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Type</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Reference</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Amount</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Balance</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-4 py-3 text-sm text-slate-900 dark:text-slate-100">04 Feb 2025</td>
                        <td class="px-4 py-3"><span class="inline-flex px-2 py-0.5 rounded text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-600 dark:text-slate-400">Sale</span></td>
                        <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">INV-2025-0012</td>
                        <td class="px-4 py-3 text-sm text-right text-slate-900 dark:text-slate-100">Rs 25,000</td>
                        <td class="px-4 py-3 text-sm text-right text-amber-600 dark:text-amber-400">Rs 15,000</td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-4 py-3 text-sm text-slate-900 dark:text-slate-100">02 Feb 2025</td>
                        <td class="px-4 py-3"><span class="inline-flex px-2 py-0.5 rounded text-xs font-medium bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400">Payment</span></td>
                        <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">PAY-2025-0089</td>
                        <td class="px-4 py-3 text-sm text-right text-slate-900 dark:text-slate-100">Rs 40,000</td>
                        <td class="px-4 py-3 text-sm text-right text-slate-500 dark:text-slate-400">Rs 40,000</td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-4 py-3 text-sm text-slate-900 dark:text-slate-100">28 Jan 2025</td>
                        <td class="px-4 py-3"><span class="inline-flex px-2 py-0.5 rounded text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-600 dark:text-slate-400">Sale</span></td>
                        <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">INV-2025-0008</td>
                        <td class="px-4 py-3 text-sm text-right text-slate-900 dark:text-slate-100">Rs 35,000</td>
                        <td class="px-4 py-3 text-sm text-right text-slate-500 dark:text-slate-400">Rs 80,000</td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-4 py-3 text-sm text-slate-900 dark:text-slate-100">20 Jan 2025</td>
                        <td class="px-4 py-3"><span class="inline-flex px-2 py-0.5 rounded text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-600 dark:text-slate-400">Sale</span></td>
                        <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">INV-2025-0003</td>
                        <td class="px-4 py-3 text-sm text-right text-slate-900 dark:text-slate-100">Rs 50,000</td>
                        <td class="px-4 py-3 text-sm text-right text-slate-500 dark:text-slate-400">Rs 115,000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
