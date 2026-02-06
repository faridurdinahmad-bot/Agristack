@extends('layouts.app')

@section('title', 'User Guide')
@section('page-title', 'User Guide')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">User Guide</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Complete guide to using AgriStack</p>
    </div>

    {{-- Table of Contents --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Table of Contents</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <a href="#getting-started" class="flex items-center gap-2 p-3 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors text-sm text-slate-700 dark:text-slate-300">1. Getting Started</a>
            <a href="#inventory" class="flex items-center gap-2 p-3 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors text-sm text-slate-700 dark:text-slate-300">2. Managing Inventory</a>
            <a href="#sales" class="flex items-center gap-2 p-3 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors text-sm text-slate-700 dark:text-slate-300">3. Sales Management</a>
            <a href="#purchases" class="flex items-center gap-2 p-3 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors text-sm text-slate-700 dark:text-slate-300">4. Purchase Management</a>
            <a href="#reports" class="flex items-center gap-2 p-3 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors text-sm text-slate-700 dark:text-slate-300">5. Reports & Analytics</a>
            <a href="#settings" class="flex items-center gap-2 p-3 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors text-sm text-slate-700 dark:text-slate-300">6. Settings & Configuration</a>
        </div>
    </div>

    {{-- Getting Started --}}
    <div id="getting-started" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">1. Getting Started</h3>
        <div class="space-y-4 text-sm text-slate-600 dark:text-slate-400">
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-2">Welcome to AgriStack</h4>
                <p>AgriStack is a comprehensive ERP solution designed for agricultural businesses. This guide will help you navigate and utilize all features effectively.</p>
            </div>
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-2">First Steps</h4>
                <ul class="ml-4 list-disc space-y-1">
                    <li>Complete your business profile in Settings → Business Settings</li>
                    <li>Set up user roles and permissions</li>
                    <li>Add your first products to inventory</li>
                    <li>Configure tax and invoice settings</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Inventory Management --}}
    <div id="inventory" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">2. Managing Inventory</h3>
        <div class="space-y-4 text-sm text-slate-600 dark:text-slate-400">
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-2">Adding Products</h4>
                <p>Navigate to Inventory → Add Product. Fill in product details including name, category, price, stock quantity, and any additional information. Products can be organized by categories, brands, and product groups.</p>
            </div>
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-2">Stock Management</h4>
                <p>Monitor stock levels through the Products List. Low stock alerts can be configured in Settings. Stock adjustments can be made through the inventory management interface.</p>
            </div>
        </div>
    </div>

    {{-- Sales Management --}}
    <div id="sales" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">3. Sales Management</h3>
        <div class="space-y-4 text-sm text-slate-600 dark:text-slate-400">
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-2">Creating Sales</h4>
                <p>Go to Sales → Add Sale. Select customer, add products, and complete the transaction. Invoices are automatically generated and can be printed or emailed.</p>
            </div>
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-2">Managing Invoices</h4>
                <p>All sales invoices are stored in Documents → Invoices. You can view, print, or download invoices. Invoice templates can be customized in Settings.</p>
            </div>
        </div>
    </div>

    {{-- Purchase Management --}}
    <div id="purchases" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">4. Purchase Management</h3>
        <div class="space-y-4 text-sm text-slate-600 dark:text-slate-400">
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-2">Creating Purchases</h4>
                <p>Access Purchase → Add Purchase. Select supplier, add items, and complete the purchase order. Purchase orders can be tracked through the Purchase Orders section.</p>
            </div>
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-2">Supplier Management</h4>
                <p>Manage suppliers in People & Accounts → Suppliers. Add supplier details, payment terms, and contact information for easy access during purchase creation.</p>
            </div>
        </div>
    </div>

    {{-- Reports & Analytics --}}
    <div id="reports" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">5. Reports & Analytics</h3>
        <div class="space-y-4 text-sm text-slate-600 dark:text-slate-400">
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-2">Generating Reports</h4>
                <p>Access various reports from the Reports section including Stock Reports, Profit & Loss, Ledger Reports, and Business Reports. Apply filters and export in multiple formats.</p>
            </div>
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-2">Analytics Dashboard</h4>
                <p>The Analytics section provides insights into sales, purchases, inventory, and expenses. View trends, charts, and graphs to make informed business decisions.</p>
            </div>
        </div>
    </div>

    {{-- Settings & Configuration --}}
    <div id="settings" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">6. Settings & Configuration</h3>
        <div class="space-y-4 text-sm text-slate-600 dark:text-slate-400">
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-2">General Settings</h4>
                <p>Configure system-wide settings including business information, currency, date format, and other preferences in Settings → General Settings.</p>
            </div>
            <div>
                <h4 class="font-medium text-slate-900 dark:text-white mb-2">User Management</h4>
                <p>Create and manage users, assign roles, and configure permissions in Settings → User & Roles. Ensure proper access control for your team.</p>
            </div>
        </div>
    </div>

    {{-- Additional Resources --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Additional Resources</h3>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('app.support.faqs') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">View FAQs</a>
            <a href="{{ route('app.support.tutorials') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Watch Tutorials</a>
            <a href="{{ route('app.support.contact') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Contact Support</a>
        </div>
    </div>
</div>
@endsection
