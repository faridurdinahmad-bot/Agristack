@extends('layouts.app')

@section('title', 'FAQs')
@section('page-title', 'FAQs')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Frequently Asked Questions</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Find answers to common questions</p>
    </div>

    {{-- Search --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <input type="text" placeholder="Search FAQs..." class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
    </div>

    {{-- FAQ Accordion --}}
    <div class="space-y-3">
        {{-- FAQ 1 --}}
        <details class="group rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
            <summary class="flex items-center justify-between p-4 cursor-pointer list-none hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-sm font-medium text-slate-900 dark:text-white">How do I add a new product to inventory?</span>
                <span class="text-slate-500 dark:text-slate-400 group-open:rotate-180 transition-transform">▼</span>
            </summary>
            <div class="px-4 pb-4 pt-0 border-t border-slate-200 dark:border-slate-700">
                <p class="text-sm text-slate-600 dark:text-slate-400">Navigate to Inventory → Add Product. Fill in the product details including name, category, price, and stock quantity. Click "Save" to add the product to your inventory.</p>
            </div>
        </details>

        {{-- FAQ 2 --}}
        <details class="group rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
            <summary class="flex items-center justify-between p-4 cursor-pointer list-none hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-sm font-medium text-slate-900 dark:text-white">How can I generate sales reports?</span>
                <span class="text-slate-500 dark:text-slate-400 group-open:rotate-180 transition-transform">▼</span>
            </summary>
            <div class="px-4 pb-4 pt-0 border-t border-slate-200 dark:border-slate-700">
                <p class="text-sm text-slate-600 dark:text-slate-400">Go to Reports → Sales Report. Select your date range and apply filters as needed. You can export the report in PDF or Excel format using the Export button.</p>
            </div>
        </details>

        {{-- FAQ 3 --}}
        <details class="group rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
            <summary class="flex items-center justify-between p-4 cursor-pointer list-none hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-sm font-medium text-slate-900 dark:text-white">How do I manage user permissions?</span>
                <span class="text-slate-500 dark:text-slate-400 group-open:rotate-180 transition-transform">▼</span>
            </summary>
            <div class="px-4 pb-4 pt-0 border-t border-slate-200 dark:border-slate-700">
                <p class="text-sm text-slate-600 dark:text-slate-400">Access Settings → User & Roles. Create or edit roles and assign specific permissions for each module. Users can then be assigned to these roles.</p>
            </div>
        </details>

        {{-- FAQ 4 --}}
        <details class="group rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
            <summary class="flex items-center justify-between p-4 cursor-pointer list-none hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-sm font-medium text-slate-900 dark:text-white">Can I export my data?</span>
                <span class="text-slate-500 dark:text-slate-400 group-open:rotate-180 transition-transform">▼</span>
            </summary>
            <div class="px-4 pb-4 pt-0 border-t border-slate-200 dark:border-slate-700">
                <p class="text-sm text-slate-600 dark:text-slate-400">Yes, you can export data in multiple formats. Go to Backups → Download and choose the data type (Products, Sales, Purchase, etc.) and format (CSV, Excel, JSON).</p>
            </div>
        </details>

        {{-- FAQ 5 --}}
        <details class="group rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
            <summary class="flex items-center justify-between p-4 cursor-pointer list-none hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-sm font-medium text-slate-900 dark:text-white">How do I create a backup?</span>
                <span class="text-slate-500 dark:text-slate-400 group-open:rotate-180 transition-transform">▼</span>
            </summary>
            <div class="px-4 pb-4 pt-0 border-t border-slate-200 dark:border-slate-700">
                <p class="text-sm text-slate-600 dark:text-slate-400">Navigate to Backups → Create Backup. Choose what to backup (Full backup or specific data) and click "Create Backup". The backup will be available for download in the Backup History.</p>
            </div>
        </details>

        {{-- FAQ 6 --}}
        <details class="group rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
            <summary class="flex items-center justify-between p-4 cursor-pointer list-none hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-sm font-medium text-slate-900 dark:text-white">What should I do if I forget my password?</span>
                <span class="text-slate-500 dark:text-slate-400 group-open:rotate-180 transition-transform">▼</span>
            </summary>
            <div class="px-4 pb-4 pt-0 border-t border-slate-200 dark:border-slate-700">
                <p class="text-sm text-slate-600 dark:text-slate-400">Click "Forgot Password" on the login page. Enter your email address and you'll receive a password reset link. If you don't receive the email, contact your administrator or support team.</p>
            </div>
        </details>

        {{-- FAQ 7 --}}
        <details class="group rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
            <summary class="flex items-center justify-between p-4 cursor-pointer list-none hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-sm font-medium text-slate-900 dark:text-white">How do I print invoices?</span>
                <span class="text-slate-500 dark:text-slate-400 group-open:rotate-180 transition-transform">▼</span>
            </summary>
            <div class="px-4 pb-4 pt-0 border-t border-slate-200 dark:border-slate-700">
                <p class="text-sm text-slate-600 dark:text-slate-400">Open any invoice from Sales → Sales List or Documents → Invoices. Click the "Print" button to generate a PDF or print directly. You can customize invoice templates in Settings → Tax & Invoice.</p>
            </div>
        </details>

        {{-- FAQ 8 --}}
        <details class="group rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
            <summary class="flex items-center justify-between p-4 cursor-pointer list-none hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-sm font-medium text-slate-900 dark:text-white">Can I customize the dashboard?</span>
                <span class="text-slate-500 dark:text-slate-400 group-open:rotate-180 transition-transform">▼</span>
            </summary>
            <div class="px-4 pb-4 pt-0 border-t border-slate-200 dark:border-slate-700">
                <p class="text-sm text-slate-600 dark:text-slate-400">Currently, the dashboard shows key metrics and recent activities. Customization options are planned for future updates. You can filter and view different reports from the Reports section.</p>
            </div>
        </details>
    </div>

    {{-- Still need help --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6 text-center">
        <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">Still have questions? We're here to help!</p>
        <div class="flex flex-wrap gap-3 justify-center">
            <a href="{{ route('app.support.raise-ticket') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Create Ticket</a>
            <a href="{{ route('app.support.contact') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Contact Support</a>
        </div>
    </div>
</div>
@endsection
