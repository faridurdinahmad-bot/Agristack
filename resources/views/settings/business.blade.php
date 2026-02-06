@extends('layouts.app')

@section('title', 'Business Settings')
@section('page-title', 'Business Settings')

@section('content')
<style>
    .toggle-dot { transition: transform 0.2s; }
    .peer:checked ~ .toggle-track .toggle-dot { transform: translateX(1.25rem); }
</style>

<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Business / Company Settings</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Company name, logo, and contact details</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5 space-y-6">
        <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200">Company info</h3>
        <div class="flex flex-col sm:flex-row gap-6">
            <div class="flex flex-col items-center gap-2">
                <div class="w-20 h-20 rounded-xl border-2 border-dashed border-slate-200 dark:border-slate-600 flex items-center justify-center text-2xl text-slate-400 bg-slate-50 dark:bg-slate-800/50">🏢</div>
                <button type="button" class="text-sm font-medium text-emerald-600 dark:text-emerald-400 hover:underline">Upload logo</button>
            </div>
            <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2">
                    <label for="company_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Company name</label>
                    <input type="text" id="company_name" value="AgriStack Pvt Ltd" placeholder="Company name"
                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div>
                    <label for="company_phone" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Phone</label>
                    <input type="text" id="company_phone" value="+92 42 1234567" placeholder="Phone"
                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div>
                    <label for="company_email" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Email</label>
                    <input type="email" id="company_email" value="info@agristack.com" placeholder="Email"
                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div class="sm:col-span-2">
                    <label for="company_address" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Address</label>
                    <textarea id="company_address" rows="2" placeholder="Full address"
                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-none">Lahore, Pakistan</textarea>
                </div>
                <div>
                    <label for="company_tax_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Tax ID / NTN</label>
                    <input type="text" id="company_tax_id" placeholder="Optional"
                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
            </div>
        </div>
        <div class="flex flex-wrap gap-3 pt-2 border-t border-slate-200 dark:border-slate-700">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Save</button>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</button>
        </div>
    </div>
</div>
@endsection
