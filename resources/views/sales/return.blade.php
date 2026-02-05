@extends('layouts.app')

@section('title', 'Sales Return')
@section('page-title', 'Sales Return')

@section('content')
<div class="max-w-6xl mx-auto p-6 space-y-6">
    {{-- Page Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:gap-4">
            <a href="{{ route('app.sales.list') }}" class="inline-flex items-center gap-2 text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Back to Sales List
            </a>
            <h1 class="text-2xl font-semibold text-slate-900 dark:text-white">Sales Return</h1>
        </div>
        <div class="flex-1 sm:max-w-xs">
            <label for="sale_reference" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Sale Reference</label>
            <input type="text" id="sale_reference" name="sale_reference" placeholder="Search sale by reference…"
                class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none" autocomplete="off">
        </div>
    </div>

    <form id="sales-return-form" class="space-y-6">
        {{-- Customer Section (auto-filled, read-only UI) --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">Customer</h2>
            <div class="rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-600 p-4">
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                    <div><dt class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">Name</dt><dd class="text-slate-900 dark:text-slate-100 font-medium">Ali Hassan</dd></div>
                    <div><dt class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">Phone</dt><dd class="text-slate-900 dark:text-slate-100">+92 300 1112233</dd></div>
                    <div><dt class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">Address</dt><dd class="text-slate-600 dark:text-slate-400">123 Main St, Faisalabad</dd></div>
                </dl>
            </div>
        </div>

        {{-- Returned Items Table --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white p-6 pb-3 border-b border-slate-200 dark:border-slate-700">Returned Items</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-10">#</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider min-w-[200px]">Product</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-20">Stock</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-28">Return Qty</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-28">Unit Price</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-24">Discount</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-20">Tax</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-28">Subtotal</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-16">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="return-items-body">
                        <tr class="return-item-row hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">1</td>
                            <td class="px-4 py-3">
                                <input type="text" name="items[0][product]" placeholder="Search product…"
                                    class="w-full min-w-[180px] rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </td>
                            <td class="px-4 py-3 text-xs text-slate-500 dark:text-slate-400">—</td>
                            <td class="px-4 py-3">
                                <input type="number" name="items[0][return_qty]" min="1" placeholder="0"
                                    class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </td>
                            <td class="px-4 py-3 text-right text-sm text-slate-900 dark:text-slate-100">Rs 5,000</td>
                            <td class="px-4 py-3 text-right text-sm text-slate-600 dark:text-slate-400">Rs 0</td>
                            <td class="px-4 py-3 text-right text-sm text-slate-600 dark:text-slate-400">Rs 500</td>
                            <td class="px-4 py-3 text-right text-sm font-medium text-red-600 dark:text-red-400">- Rs 11,000</td>
                            <td class="px-4 py-3 text-center">
                                <button type="button" class="remove-return-item p-2 rounded-lg text-slate-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors" title="Remove row">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-slate-200 dark:border-slate-700">
                <button type="button" id="add-return-item-btn" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">
                    <span aria-hidden="true">+</span>
                    Add Item
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                {{-- Summary --}}
                <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">Summary</h2>
                    <dl class="space-y-3">
                        <div class="flex justify-between items-center"><dt class="text-sm text-slate-600 dark:text-slate-400">Return Subtotal</dt><dd class="text-sm font-medium text-red-600 dark:text-red-400">- Rs 10,000</dd></div>
                        <div class="flex justify-between items-center"><dt class="text-sm text-slate-600 dark:text-slate-400">Adjusted Tax</dt><dd class="text-sm font-medium text-red-600 dark:text-red-400">- Rs 500</dd></div>
                        <div class="flex justify-between items-center pt-3 border-t border-slate-200 dark:border-slate-700">
                            <dt class="text-base font-semibold text-slate-900 dark:text-white">Net Return Amount</dt>
                            <dd class="text-lg font-bold text-red-600 dark:text-red-400">- Rs 10,500</dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="lg:col-span-1">
                <div class="lg:sticky lg:top-6">
                    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50/50 dark:bg-slate-800/50 p-4 flex flex-col gap-3">
                        <button type="submit" class="w-full px-4 py-3 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors">Save Return</button>
                        <a href="{{ route('app.sales.list') }}" class="w-full px-4 py-3 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors text-center">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
(function() {
    var form = document.getElementById('sales-return-form');
    if (form) form.addEventListener('submit', function(e) { e.preventDefault(); });
    var tbody = document.getElementById('return-items-body'), addBtn = document.getElementById('add-return-item-btn');
    if (addBtn && tbody) addBtn.addEventListener('click', function() {
        var n = tbody.querySelectorAll('tr').length + 1;
        var row = document.createElement('tr');
        row.className = 'return-item-row hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors';
        row.innerHTML = '<td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">' + n + '</td><td class="px-4 py-3"><input type="text" name="items[' + n + '][product]" placeholder="Search product…" class="w-full min-w-[180px] rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></td><td class="px-4 py-3 text-xs text-slate-500 dark:text-slate-400">—</td><td class="px-4 py-3"><input type="number" name="items[' + n + '][return_qty]" min="1" placeholder="0" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></td><td class="px-4 py-3 text-right text-sm text-slate-900 dark:text-slate-100">—</td><td class="px-4 py-3 text-right text-sm text-slate-600 dark:text-slate-400">—</td><td class="px-4 py-3 text-right text-sm text-slate-600 dark:text-slate-400">—</td><td class="px-4 py-3 text-right text-sm font-medium text-red-600 dark:text-red-400">—</td><td class="px-4 py-3 text-center"><button type="button" class="remove-return-item p-2 rounded-lg text-slate-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors" title="Remove row"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button></td>';
        tbody.appendChild(row);
        row.querySelector('.remove-return-item').addEventListener('click', function() { row.remove(); });
    });
    tbody && tbody.addEventListener('click', function(e) { if (e.target.closest('.remove-return-item')) e.target.closest('tr').remove(); });
})();
</script>
@endsection
