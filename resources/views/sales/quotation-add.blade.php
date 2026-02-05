@extends('layouts.app')

@section('title', 'Add Quotation')
@section('page-title', 'Add Quotation')

@section('content')
<div class="max-w-6xl mx-auto p-6 space-y-6">
    {{-- Page Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:gap-4">
            <a href="{{ route('app.sales.quotations-list') }}" class="inline-flex items-center gap-2 text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Back to Quotations List
            </a>
            <h1 class="text-2xl font-semibold text-slate-900 dark:text-white">Add Quotation</h1>
        </div>
        <div class="flex items-center gap-3">
            <label for="quotation_date" class="text-sm font-medium text-slate-700 dark:text-slate-300 whitespace-nowrap">Quotation Date</label>
            <input type="date" id="quotation_date" name="quotation_date"
                class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
        </div>
    </div>

    <form id="add-quotation-form" class="space-y-6">
        {{-- Customer Section (same as Add Sale) --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">Customer</h2>
            <div class="space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-end gap-3">
                    <div class="flex-1">
                        <label for="customer_select" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Select Customer</label>
                        <input type="text" id="customer_select" name="customer" placeholder="Search customer by name or phone…"
                            class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none" autocomplete="off">
                    </div>
                    <a href="#" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 border border-emerald-200 dark:border-emerald-500/30 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 transition-colors whitespace-nowrap">
                        <span aria-hidden="true">+</span>
                        Add New Customer
                    </a>
                </div>
                <div id="customer-preview" class="flex flex-wrap items-center gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-600">
                    <span class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">Selected:</span>
                    <span class="text-sm text-slate-900 dark:text-slate-100">Ali Hassan</span>
                    <span class="text-sm text-slate-600 dark:text-slate-400">+92 300 1112233</span>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-amber-50 dark:bg-amber-500/10 text-amber-700 dark:text-amber-400 border border-amber-200 dark:border-amber-500/20">Due: Rs 15,000</span>
                </div>
            </div>
        </div>

        {{-- Items Table (same as Add Sale) --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white p-6 pb-3 border-b border-slate-200 dark:border-slate-700">Items</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-10">#</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider min-w-[200px]">Product</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-20">Stock</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-24">Quantity</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-28">Unit Price</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-24">Discount</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-20">Tax</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-28">Subtotal</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-16">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="quotation-items-body">
                        <tr class="quotation-item-row hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">1</td>
                            <td class="px-4 py-3">
                                <input type="text" name="items[0][product]" placeholder="Search product…"
                                    class="w-full min-w-[180px] rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </td>
                            <td class="px-4 py-3 text-xs text-slate-500 dark:text-slate-400">—</td>
                            <td class="px-4 py-3">
                                <input type="number" name="items[0][qty]" min="1" placeholder="0"
                                    class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </td>
                            <td class="px-4 py-3 text-right">
                                <input type="text" name="items[0][unit_price]" placeholder="0"
                                    class="w-full text-right rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </td>
                            <td class="px-4 py-3 text-right">
                                <input type="text" name="items[0][discount]" placeholder="0"
                                    class="w-full text-right rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </td>
                            <td class="px-4 py-3 text-right">
                                <input type="text" name="items[0][tax]" placeholder="0"
                                    class="w-full text-right rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </td>
                            <td class="px-4 py-3 text-right text-sm font-medium text-slate-900 dark:text-slate-100">—</td>
                            <td class="px-4 py-3 text-center">
                                <button type="button" class="remove-quotation-item p-2 rounded-lg text-slate-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors" title="Remove row">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-slate-200 dark:border-slate-700">
                <button type="button" id="add-quotation-item-btn" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">
                    <span aria-hidden="true">+</span>
                    Add Item
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                {{-- Summary: Quotation Total only (no payment, no paid) --}}
                <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">Summary</h2>
                    <dl class="space-y-3">
                        <div class="flex justify-between items-center pt-2">
                            <dt class="text-base font-semibold text-slate-900 dark:text-white">Quotation Total</dt>
                            <dd class="text-lg font-bold text-slate-900 dark:text-white">Rs 103,000</dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="lg:col-span-1">
                <div class="lg:sticky lg:top-6">
                    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50/50 dark:bg-slate-800/50 p-4 flex flex-col gap-3">
                        <button type="submit" class="w-full px-4 py-3 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors">Save Quotation</button>
                        <a href="{{ route('app.sales.quotations-list') }}" class="w-full px-4 py-3 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors text-center">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
(function() {
    var form = document.getElementById('add-quotation-form');
    if (form) form.addEventListener('submit', function(e) { e.preventDefault(); });
    var itemIndex = 1, tbody = document.getElementById('quotation-items-body'), addBtn = document.getElementById('add-quotation-item-btn');
    if (addBtn && tbody) {
        addBtn.addEventListener('click', function() {
            var n = tbody.querySelectorAll('tr').length + 1;
            var row = document.createElement('tr');
            row.className = 'quotation-item-row hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors';
            row.innerHTML = '<td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">' + n + '</td><td class="px-4 py-3"><input type="text" name="items[' + itemIndex + '][product]" placeholder="Search product…" class="w-full min-w-[180px] rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></td><td class="px-4 py-3 text-xs text-slate-500 dark:text-slate-400">—</td><td class="px-4 py-3"><input type="number" name="items[' + itemIndex + '][qty]" min="1" placeholder="0" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></td><td class="px-4 py-3 text-right"><input type="text" name="items[' + itemIndex + '][unit_price]" placeholder="0" class="w-full text-right rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></td><td class="px-4 py-3 text-right"><input type="text" name="items[' + itemIndex + '][discount]" placeholder="0" class="w-full text-right rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></td><td class="px-4 py-3 text-right"><input type="text" name="items[' + itemIndex + '][tax]" placeholder="0" class="w-full text-right rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></td><td class="px-4 py-3 text-right text-sm font-medium text-slate-900 dark:text-slate-100">—</td><td class="px-4 py-3 text-center"><button type="button" class="remove-quotation-item p-2 rounded-lg text-slate-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors" title="Remove row"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button></td>';
            tbody.appendChild(row); itemIndex++;
            row.querySelector('.remove-quotation-item').addEventListener('click', function() { row.remove(); });
        });
    }
    tbody && tbody.addEventListener('click', function(e) { if (e.target.closest('.remove-quotation-item')) e.target.closest('tr').remove(); });
})();
</script>
@endsection
