@extends('layouts.app')

@section('title', 'Customer Group Details')
@section('page-title', 'Customer Group Details')

@section('content')
<div class="max-w-5xl mx-auto p-6 space-y-6">
    {{-- Back --}}
    <div>
        <a href="{{ route('app.people.customer-groups') }}" class="inline-flex items-center gap-2 text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Customer Groups
        </a>
    </div>

    {{-- Group Info Card --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h1 class="text-2xl font-semibold text-slate-900 dark:text-white mb-1">Retail / Walk-in</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400 mb-4">Group details — read-only</p>
        <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <dt class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-0.5">Description</dt>
                <dd class="text-sm text-slate-900 dark:text-slate-100">Individual customers and small retail buyers</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-0.5">Total Customers</dt>
                <dd class="text-sm text-slate-900 dark:text-slate-100">45</dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-0.5">Status</dt>
                <dd>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">Active</span>
                </dd>
            </div>
        </dl>
    </div>

    {{-- Customers in this group (dummy UI layout) --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Customers in this group</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-0.5">Dummy layout — no data</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-14">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Customer Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Phone</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">1</td>
                        <td class="px-4 py-3 text-sm font-medium text-slate-900 dark:text-slate-100">—</td>
                        <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">—</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-500 dark:text-slate-400">—</span></td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">2</td>
                        <td class="px-4 py-3 text-sm font-medium text-slate-900 dark:text-slate-100">—</td>
                        <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">—</td>
                        <td class="px-4 py-3 text-center"><span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-500 dark:text-slate-400">—</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50 text-center">
            <p class="text-sm text-slate-500 dark:text-slate-400">Placeholder for customers assigned to this group. No data connected.</p>
        </div>
    </div>
</div>
@endsection
