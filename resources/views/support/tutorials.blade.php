@extends('layouts.app')

@section('title', 'Tutorials')
@section('page-title', 'Tutorials')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Tutorials</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Step-by-step video tutorials and guides</p>
    </div>

    {{-- Search --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <input type="text" placeholder="Search tutorials..." class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
    </div>

    {{-- Categories --}}
    <div class="flex flex-wrap gap-2">
        <button class="px-4 py-2 rounded-xl text-sm font-medium text-white bg-emerald-600 dark:bg-emerald-500">All</button>
        <button class="px-4 py-2 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600">Getting Started</button>
        <button class="px-4 py-2 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600">Inventory</button>
        <button class="px-4 py-2 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600">Sales</button>
        <button class="px-4 py-2 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600">Reports</button>
    </div>

    {{-- Tutorial Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        {{-- Tutorial 1 --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden hover:shadow-lg transition-shadow">
            <div class="aspect-video bg-slate-200 dark:bg-slate-700 flex items-center justify-center">
                <span class="text-4xl">▶️</span>
            </div>
            <div class="p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-2 py-1 rounded text-xs font-medium bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400">Getting Started</span>
                    <span class="text-xs text-slate-500 dark:text-slate-400">5 min</span>
                </div>
                <h3 class="text-sm font-semibold text-slate-900 dark:text-white mb-1">Introduction to AgriStack</h3>
                <p class="text-xs text-slate-600 dark:text-slate-400">Learn the basics of navigating and using AgriStack ERP system.</p>
            </div>
        </div>

        {{-- Tutorial 2 --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden hover:shadow-lg transition-shadow">
            <div class="aspect-video bg-slate-200 dark:bg-slate-700 flex items-center justify-center">
                <span class="text-4xl">▶️</span>
            </div>
            <div class="p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-2 py-1 rounded text-xs font-medium bg-blue-100 dark:bg-blue-500/20 text-blue-700 dark:text-blue-400">Inventory</span>
                    <span class="text-xs text-slate-500 dark:text-slate-400">8 min</span>
                </div>
                <h3 class="text-sm font-semibold text-slate-900 dark:text-white mb-1">Adding and Managing Products</h3>
                <p class="text-xs text-slate-600 dark:text-slate-400">Complete guide to adding products, categories, and managing inventory.</p>
            </div>
        </div>

        {{-- Tutorial 3 --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden hover:shadow-lg transition-shadow">
            <div class="aspect-video bg-slate-200 dark:bg-slate-700 flex items-center justify-center">
                <span class="text-4xl">▶️</span>
            </div>
            <div class="p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-2 py-1 rounded text-xs font-medium bg-purple-100 dark:bg-purple-500/20 text-purple-700 dark:text-purple-400">Sales</span>
                    <span class="text-xs text-slate-500 dark:text-slate-400">10 min</span>
                </div>
                <h3 class="text-sm font-semibold text-slate-900 dark:text-white mb-1">Creating Sales and Invoices</h3>
                <p class="text-xs text-slate-600 dark:text-slate-400">Step-by-step process for creating sales transactions and generating invoices.</p>
            </div>
        </div>

        {{-- Tutorial 4 --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden hover:shadow-lg transition-shadow">
            <div class="aspect-video bg-slate-200 dark:bg-slate-700 flex items-center justify-center">
                <span class="text-4xl">▶️</span>
            </div>
            <div class="p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-2 py-1 rounded text-xs font-medium bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-400">Purchase</span>
                    <span class="text-xs text-slate-500 dark:text-slate-400">7 min</span>
                </div>
                <h3 class="text-sm font-semibold text-slate-900 dark:text-white mb-1">Managing Purchases and Suppliers</h3>
                <p class="text-xs text-slate-600 dark:text-slate-400">Learn how to create purchase orders and manage supplier relationships.</p>
            </div>
        </div>

        {{-- Tutorial 5 --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden hover:shadow-lg transition-shadow">
            <div class="aspect-video bg-slate-200 dark:bg-slate-700 flex items-center justify-center">
                <span class="text-4xl">▶️</span>
            </div>
            <div class="p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-2 py-1 rounded text-xs font-medium bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">Reports</span>
                    <span class="text-xs text-slate-500 dark:text-slate-400">6 min</span>
                </div>
                <h3 class="text-sm font-semibold text-slate-900 dark:text-white mb-1">Generating and Exporting Reports</h3>
                <p class="text-xs text-slate-600 dark:text-slate-400">How to generate various reports and export them in different formats.</p>
            </div>
        </div>

        {{-- Tutorial 6 --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden hover:shadow-lg transition-shadow">
            <div class="aspect-video bg-slate-200 dark:bg-slate-700 flex items-center justify-center">
                <span class="text-4xl">▶️</span>
            </div>
            <div class="p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-2 py-1 rounded text-xs font-medium bg-red-100 dark:bg-red-500/20 text-red-700 dark:text-red-400">Settings</span>
                    <span class="text-xs text-slate-500 dark:text-slate-400">9 min</span>
                </div>
                <h3 class="text-sm font-semibold text-slate-900 dark:text-white mb-1">Configuring User Roles and Permissions</h3>
                <p class="text-xs text-slate-600 dark:text-slate-400">Set up user roles, permissions, and access controls for your team.</p>
            </div>
        </div>
    </div>

    {{-- Need more help --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6 text-center">
        <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">Looking for something specific? Contact our support team.</p>
        <div class="flex flex-wrap gap-3 justify-center">
            <a href="{{ route('app.support.raise-ticket') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Create Ticket</a>
            <a href="{{ route('app.support.contact') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Contact Support</a>
        </div>
    </div>
</div>
@endsection
