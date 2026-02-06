@extends('layouts.app')

@section('title', 'Tax & Invoice Settings')
@section('page-title', 'Tax & Invoice Settings')

@section('content')
<style>
    #add-tax-modal-toggle { display: none; }
    #add-tax-modal { display: none; }
    #add-tax-modal-toggle:checked ~ #add-tax-modal { display: flex; }
    .tab-input { display: none; }
    .tab-input:checked + .tab-label { color: rgb(5 150 105); font-weight: 600; border-bottom-color: rgb(5 150 105); }
    .dark .tab-input:checked + .tab-label { color: rgb(52 211 153); border-bottom-color: rgb(52 211 153); }
    .tab-panel { display: none; }
    .tab-input#tab-invoice:checked ~ .tab-panel-invoice { display: block; }
    .tab-input#tab-tax:checked ~ .tab-panel-tax { display: block; }
</style>
<input type="checkbox" id="add-tax-modal-toggle" class="sr-only" aria-hidden="true" />
<div id="add-tax-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <label for="add-tax-modal-toggle" class="absolute inset-0 bg-black/50 backdrop-blur-sm cursor-pointer" aria-label="Close modal"></label>
    <div class="relative z-10 bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-600 shadow-xl w-full max-w-md">
        <div class="p-6 border-b border-slate-200 dark:border-slate-700">
            <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Add tax rate</h3>
            <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">(UI only)</p>
        </div>
        <form class="p-6 space-y-4" onsubmit="return false;">
            <div>
                <label for="tax_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Name</label>
                <input type="text" id="tax_name" placeholder="e.g. GST 18%"
                    class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div>
                <label for="tax_rate" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Rate (%)</label>
                <input type="number" id="tax_rate" placeholder="18" step="0.01"
                    class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex flex-wrap gap-3 pt-2">
                <label for="add-tax-modal-toggle" class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 cursor-pointer">Cancel</label>
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 shadow-md">Add</button>
            </div>
        </form>
    </div>
</div>

<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Tax & Invoice Settings</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Invoice format and tax rates</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="flex border-b border-slate-200 dark:border-slate-700">
            <input type="radio" name="tax_invoice_tab" id="tab-invoice" class="tab-input" checked>
            <label for="tab-invoice" class="tab-label flex-1 px-4 py-3 text-center text-sm font-medium text-slate-600 dark:text-slate-400 border-b-2 border-transparent cursor-pointer">Invoice</label>
            <input type="radio" name="tax_invoice_tab" id="tab-tax" class="tab-input">
            <label for="tab-tax" class="tab-label flex-1 px-4 py-3 text-center text-sm font-medium text-slate-600 dark:text-slate-400 border-b-2 border-transparent cursor-pointer">Tax rates</label>
        </div>

        <div class="tab-panel tab-panel-invoice p-5 space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="invoice_prefix" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Invoice prefix</label>
                    <input type="text" id="invoice_prefix" value="INV-" placeholder="INV-"
                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div>
                    <label for="invoice_next_no" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Next number</label>
                    <input type="number" id="invoice_next_no" value="1001" placeholder="1001"
                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div class="sm:col-span-2">
                    <label for="invoice_terms" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Default terms (footer)</label>
                    <textarea id="invoice_terms" rows="2" placeholder="Terms and conditions"
                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-none">Payment due in 15 days. (Dummy)</textarea>
                </div>
            </div>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 shadow-md">Save invoice settings</button>
        </div>

        <div class="tab-panel tab-panel-tax p-5">
            <div class="flex justify-between items-center mb-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">Manage tax rates (dummy)</p>
                <label for="add-tax-modal-toggle" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 shadow-md cursor-pointer">+ Add tax rate</label>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="border-b border-slate-200 dark:border-slate-700">
                        <tr>
                            <th class="text-left py-2 font-semibold text-slate-700 dark:text-slate-300">Name</th>
                            <th class="text-right py-2 font-semibold text-slate-700 dark:text-slate-300">Rate</th>
                            <th class="text-center py-2 font-semibold text-slate-700 dark:text-slate-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                        <tr><td class="py-2 text-slate-800 dark:text-slate-200">GST 18%</td><td class="py-2 text-right">18%</td><td class="py-2 text-center"><button type="button" class="text-emerald-600 hover:underline">Edit</button></td></tr>
                        <tr><td class="py-2 text-slate-800 dark:text-slate-200">Exempt</td><td class="py-2 text-right">0%</td><td class="py-2 text-center"><button type="button" class="text-emerald-600 hover:underline">Edit</button></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
