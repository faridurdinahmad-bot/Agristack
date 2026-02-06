@extends('layouts.app')

@section('title', 'Sync with Website')
@section('page-title', 'Sync with Website')

@section('content')
<style>
    #connect-website-modal-toggle { display: none; }
    #connect-website-modal { display: none; }
    #connect-website-modal-toggle:checked ~ #connect-website-modal { display: flex; }
    .toggle-dot { transition: transform 0.2s; }
    .peer:checked ~ .toggle-track .toggle-dot { transform: translateX(1.25rem); }
</style>
<input type="checkbox" id="connect-website-modal-toggle" class="sr-only" aria-hidden="true" />
<div id="connect-website-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <label for="connect-website-modal-toggle" class="absolute inset-0 bg-black/50 backdrop-blur-sm cursor-pointer" aria-label="Close modal"></label>
    <div class="relative z-10 bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-600 shadow-xl w-full max-w-lg">
        <div class="p-6 border-b border-slate-200 dark:border-slate-700">
            <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Connect Website</h3>
            <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Enter your website URL to link with AgriStack</p>
        </div>
        <form class="p-6 space-y-4" onsubmit="return false;">
            <div>
                <label for="website_url" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Website URL</label>
                <input type="url" id="website_url" placeholder="https://yourstore.com"
                    class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex flex-wrap gap-3 pt-2">
                <label for="connect-website-modal-toggle" class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors cursor-pointer">Cancel</label>
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Connect</button>
            </div>
        </form>
    </div>
</div>

<div class="space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Sync with Website</h2>
            <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Connect and sync data with your online store</p>
        </div>
        <label for="connect-website-modal-toggle" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors whitespace-nowrap cursor-pointer">
            <span aria-hidden="true">+</span>
            Connect Website
        </label>
    </div>

    {{-- Connection status card --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-100 dark:bg-emerald-500/20 flex items-center justify-center text-2xl">🌐</div>
                <div>
                    <p class="text-sm font-medium text-slate-700 dark:text-slate-300">Connected</p>
                    <p class="text-sm text-slate-500 dark:text-slate-400">https://agristack-demo.com</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Disconnect</button>
                <button type="button" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">
                    <span aria-hidden="true">🔄</span>
                    Sync Now
                </button>
            </div>
        </div>
    </div>

    {{-- What to sync (toggles) --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
        <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200 mb-4">Sync options</h3>
        <div class="space-y-4">
            @php
                $syncOptions = [
                    ['id' => 'sync_products', 'label' => 'Products & inventory', 'desc' => 'Sync product names, prices, stock levels'],
                    ['id' => 'sync_orders', 'label' => 'Orders', 'desc' => 'Pull new orders from website into ERP'],
                    ['id' => 'sync_customers', 'label' => 'Customers', 'desc' => 'Keep customer list in sync'],
                    ['id' => 'sync_categories', 'label' => 'Categories', 'desc' => 'Sync product categories'],
                ];
            @endphp
            @foreach ($syncOptions as $opt)
                <div class="flex items-center justify-between gap-4 py-2 border-b border-slate-100 dark:border-slate-700 last:border-0">
                    <div>
                        <p class="text-sm font-medium text-slate-800 dark:text-slate-200">{{ $opt['label'] }}</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400">{{ $opt['desc'] }}</p>
                    </div>
                    <label class="relative inline-flex cursor-pointer items-center">
                        <input type="checkbox" class="peer sr-only" id="{{ $opt['id'] }}" {{ $opt['id'] === 'sync_products' || $opt['id'] === 'sync_orders' ? 'checked' : '' }}>
                        <div class="toggle-track relative h-6 w-11 rounded-full bg-slate-200 dark:bg-slate-600 peer-focus:ring-2 peer-focus:ring-emerald-500/20 peer-checked:bg-emerald-500">
                            <span class="toggle-dot absolute left-0.5 top-1 h-4 w-4 rounded-full bg-white shadow border border-slate-200 dark:border-slate-600"></span>
                        </div>
                    </label>
                </div>
            @endforeach
        </div>
        <p class="mt-4 text-xs text-slate-500 dark:text-slate-400">Toggle options on/off to choose what data is synced. No backend logic — UI only.</p>
    </div>

    {{-- Last sync info --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Last sync</p>
            <p class="mt-1 text-lg font-semibold text-slate-900 dark:text-white">04 Feb 2025, 10:32 AM</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Status</p>
            <p class="mt-1 text-lg font-semibold text-emerald-600 dark:text-emerald-400">Success</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Items synced</p>
            <p class="mt-1 text-lg font-semibold text-slate-900 dark:text-white">124 products, 18 orders</p>
        </div>
    </div>
</div>
@endsection
