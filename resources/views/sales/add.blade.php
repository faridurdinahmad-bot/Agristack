@extends('layouts.app')

@section('title', 'Add Sale')
@section('page-title', 'Add Sale')

@section('content')
<div class="max-w-6xl mx-auto p-6 space-y-6">
    {{-- Page Header: Back (left), Title, Sale Date + More Actions (right) --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:gap-4">
            <a href="{{ route('app.sales.list') }}" class="inline-flex items-center gap-2 text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Sales List
            </a>
            <h1 class="text-2xl font-semibold text-slate-900 dark:text-white">Add Sale</h1>
        </div>
        <div class="flex items-center gap-3 flex-wrap">
            <label for="sale_date" class="text-sm font-medium text-slate-700 dark:text-slate-300 whitespace-nowrap">Sale Date</label>
            <input type="date" id="sale_date" name="sale_date"
                class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            {{-- More Actions dropdown (navigation only) --}}
            <div class="relative inline-block">
                <button type="button" id="more-actions-btn" data-more-actions-trigger
                    class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 border border-slate-200 dark:border-slate-600 transition-colors">
                    More Actions
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div id="more-actions-menu" data-more-actions-menu class="hidden absolute right-0 mt-1 w-56 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 shadow-lg z-10 py-1">
                    <a href="{{ route('app.sales.return') }}" class="block px-4 py-2.5 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700/50">Switch to Sales Return</a>
                    <a href="{{ route('app.sales.quotation-add') }}" class="block px-4 py-2.5 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700/50">Switch to Quotation</a>
                </div>
            </div>
        </div>
    </div>

    <form id="add-sale-form" class="space-y-6">
        {{-- Customer Section --}}
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
                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-amber-50 dark:bg-amber-500/10 text-amber-700 dark:text-amber-400 border border-amber-200 dark:border-amber-500/20">Balance / Due: Rs 15,000</span>
                </div>
            </div>
        </div>

        {{-- Sale Items Table --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white p-6 pb-3 border-b border-slate-200 dark:border-slate-700">Sale Items</h2>
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
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="sale-items-body">
                        <tr class="sale-item-row hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
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
                                <button type="button" class="remove-item-btn p-2 rounded-lg text-slate-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors" title="Remove row">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-slate-200 dark:border-slate-700">
                <button type="button" id="add-item-btn" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">
                    <span aria-hidden="true">+</span>
                    Add Item
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                {{-- Summary --}}
                <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">Summary</h2>
                    <dl class="space-y-3">
                        <div class="flex justify-between items-center"><dt class="text-sm text-slate-600 dark:text-slate-400">Subtotal</dt><dd class="text-sm font-medium text-slate-900 dark:text-slate-100">Rs 100,000</dd></div>
                        <div class="flex justify-between items-center"><dt class="text-sm text-slate-600 dark:text-slate-400">Discount Total</dt><dd class="text-sm font-medium text-slate-900 dark:text-slate-100">Rs 2,000</dd></div>
                        <div class="flex justify-between items-center"><dt class="text-sm text-slate-600 dark:text-slate-400">Tax Total</dt><dd class="text-sm font-medium text-slate-900 dark:text-slate-100">Rs 5,000</dd></div>
                        <div class="flex justify-between items-center pt-3 border-t border-slate-200 dark:border-slate-700">
                            <dt class="text-base font-semibold text-slate-900 dark:text-white">Grand Total</dt>
                            <dd class="text-lg font-bold text-slate-900 dark:text-white">Rs 103,000</dd>
                        </div>
                        <div class="flex justify-between items-center pt-2"><dt class="text-sm text-slate-600 dark:text-slate-400">Paid Amount</dt>
                            <dd><input type="text" name="paid_amount" placeholder="0" value="100000" class="w-32 text-right rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></dd>
                        </div>
                        <div class="flex justify-between items-center"><dt class="text-sm text-slate-600 dark:text-slate-400">Due Amount</dt><dd class="text-sm font-medium text-amber-600 dark:text-amber-400">Rs 3,000</dd></div>
                    </dl>
                </div>
                {{-- Payment --}}
                <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">Payment</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="payment_method" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Payment Method</label>
                            <select id="payment_method" name="payment_method" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                                <option value="cash">Cash</option><option value="bank">Bank</option><option value="other">Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="payment_note" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Payment Note (optional)</label>
                            <textarea id="payment_note" name="payment_note" rows="2" placeholder="Any note for this payment…" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-y"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-1">
                <div class="lg:sticky lg:top-6">
                    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50/50 dark:bg-slate-800/50 p-4 flex flex-col gap-3">
                        <button type="submit" class="w-full px-4 py-3 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors">Save Sale</button>
                        <a href="{{ route('app.sales.list') }}" class="w-full px-4 py-3 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors text-center">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
(function() {
    var form = document.getElementById('add-sale-form');
    if (form) form.addEventListener('submit', function(e) { e.preventDefault(); });
    var itemIndex = 1, tbody = document.getElementById('sale-items-body'), addBtn = document.getElementById('add-item-btn');
    if (addBtn && tbody) {
        addBtn.addEventListener('click', function() {
            var n = tbody.querySelectorAll('tr').length + 1;
            var row = document.createElement('tr');
            row.className = 'sale-item-row hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors';
            row.innerHTML = '<td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">' + n + '</td><td class="px-4 py-3"><input type="text" name="items[' + itemIndex + '][product]" placeholder="Search product…" class="w-full min-w-[180px] rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></td><td class="px-4 py-3 text-xs text-slate-500 dark:text-slate-400">—</td><td class="px-4 py-3"><input type="number" name="items[' + itemIndex + '][qty]" min="1" placeholder="0" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></td><td class="px-4 py-3 text-right"><input type="text" name="items[' + itemIndex + '][unit_price]" placeholder="0" class="w-full text-right rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></td><td class="px-4 py-3 text-right"><input type="text" name="items[' + itemIndex + '][discount]" placeholder="0" class="w-full text-right rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></td><td class="px-4 py-3 text-right"><input type="text" name="items[' + itemIndex + '][tax]" placeholder="0" class="w-full text-right rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></td><td class="px-4 py-3 text-right text-sm font-medium text-slate-900 dark:text-slate-100">—</td><td class="px-4 py-3 text-center"><button type="button" class="remove-item-btn p-2 rounded-lg text-slate-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors" title="Remove row"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button></td>';
            tbody.appendChild(row); itemIndex++;
            row.querySelector('.remove-item-btn').addEventListener('click', function() { row.remove(); });
        });
    }
    tbody && tbody.addEventListener('click', function(e) { if (e.target.closest('.remove-item-btn')) e.target.closest('tr').remove(); });
})();
</script>
<script>
(function() {
    var btn = document.getElementById('more-actions-btn');
    var menu = document.getElementById('more-actions-menu');
    if (btn && menu) {
        btn.addEventListener('click', function(e) { e.stopPropagation(); menu.classList.toggle('hidden'); });
        document.addEventListener('click', function() { menu.classList.add('hidden'); });
    }
})();
</script>
@endsection
