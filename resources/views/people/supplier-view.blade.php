@extends('layouts.app')

@section('title', 'Supplier Details')
@section('page-title', 'Supplier Details')

@section('content')
<div class="max-w-5xl mx-auto p-6 space-y-6">
    {{-- Back + Edit --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <a href="{{ route('app.people.suppliers') }}" class="inline-flex items-center gap-2 text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Suppliers
        </a>
        <a href="{{ route('app.people.suppliers-form') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
            Edit Supplier
        </a>
    </div>

    {{-- Supplier header / basic info (read-only) --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h1 class="text-2xl font-semibold text-slate-900 dark:text-white mb-1">Ahmed Khan</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400 mb-5">Supplier details — read-only</p>
        <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <dt class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Contact Numbers</dt>
                <dd class="space-y-1.5">
                    <div class="text-sm text-slate-900 dark:text-slate-100">+92 300 1234567 <span class="text-slate-500 dark:text-slate-400">(Mobile)</span></div>
                    <div class="text-sm text-slate-900 dark:text-slate-100">+92 321 9876543 <span class="text-slate-500 dark:text-slate-400">(WhatsApp)</span></div>
                    <div class="text-sm text-slate-900 dark:text-slate-100">+92 42 1234567 <span class="text-slate-500 dark:text-slate-400">(Office)</span></div>
                </dd>
            </div>
            <div>
                <dt class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-0.5">Status</dt>
                <dd>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">Active</span>
                </dd>
            </div>
            <div class="md:col-span-2">
                <dt class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-0.5">Address</dt>
                <dd class="text-sm text-slate-900 dark:text-slate-100">123 Main Bazaar, Faisalabad</dd>
            </div>
        </dl>
        {{-- Bank accounts (read-only) --}}
        <div class="mt-5 pt-5 border-t border-slate-200 dark:border-slate-700">
            <h3 class="text-sm font-semibold text-slate-700 dark:text-slate-300 mb-3">Bank Accounts</h3>
            <ul class="space-y-2">
                <li class="text-sm text-slate-700 dark:text-slate-300">HBL — Khan Trading Company — ****1234</li>
                <li class="text-sm text-slate-700 dark:text-slate-300">UBL — Ahmed Khan — ****5678</li>
            </ul>
        </div>
    </div>

    {{-- Supplies (Auto-Detected) — read-only, visually separated --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6 shadow-sm">
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-1">Supplies (Auto-Detected)</h2>
        <p class="text-xs text-slate-500 dark:text-slate-400 mb-4">Supplies are detected automatically based on purchase invoices where this supplier was used.</p>
        <div class="rounded-lg border border-slate-200 dark:border-slate-600 bg-slate-50/50 dark:bg-slate-800/50 p-4">
            <ul class="space-y-3 text-sm text-slate-800 dark:text-slate-200">
                <li>
                    <span class="font-medium text-slate-900 dark:text-slate-100">• Bearings</span>
                    <ul class="ml-4 mt-1.5 space-y-1 text-slate-600 dark:text-slate-400">
                        <li>└ Deep Groove</li>
                        <li class="ml-4 text-slate-500 dark:text-slate-500">└ 6204, 6205, 6301</li>
                    </ul>
                </li>
                <li>
                    <span class="font-medium text-slate-900 dark:text-slate-100">• Agriculture</span>
                    <ul class="ml-4 mt-1.5 space-y-1 text-slate-600 dark:text-slate-400">
                        <li>└ Spray Pumps</li>
                    </ul>
                </li>
                <li>
                    <span class="font-medium text-slate-900 dark:text-slate-100">• Hardware</span>
                    <ul class="ml-4 mt-1.5 space-y-1 text-slate-600 dark:text-slate-400">
                        <li>└ Fasteners</li>
                    </ul>
                </li>
            </ul>
        </div>
        <p class="mt-3 text-xs text-slate-500 dark:text-slate-400 italic">This section is read-only and for review. When creating a Purchase Invoice, the system can suggest this supplier when you select products or categories they have supplied before.</p>
    </div>
</div>
@endsection
