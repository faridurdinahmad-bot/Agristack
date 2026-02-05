@extends('layouts.app')

@section('title', 'Add Purchase')
@section('page-title', 'Add Purchase')

@section('content')
<div class="max-w-6xl mx-auto p-6 space-y-6">
    {{-- Page Header: Back (left), Title --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:gap-4">
            <a href="#" class="inline-flex items-center gap-2 text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Purchase List
            </a>
            <h1 class="text-2xl font-semibold text-slate-900 dark:text-white">Add Purchase</h1>
        </div>
    </div>

    <form id="add-purchase-form" class="space-y-6">
        {{-- Supplier Section --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">Supplier</h2>
            <div class="space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-end gap-3">
                    <div class="flex-1">
                        <label for="supplier_select" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Select Supplier</label>
                        <input type="text" id="supplier_select" name="supplier" placeholder="Search supplier by name or phone…"
                            class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none" autocomplete="off">
                    </div>
                    <a href="#" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 border border-emerald-200 dark:border-emerald-500/30 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 transition-colors whitespace-nowrap">
                        <span aria-hidden="true">+</span>
                        Add New Supplier
                    </a>
                </div>
                <div id="supplier-preview" class="flex flex-wrap items-center gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-600">
                    <span class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">Selected:</span>
                    <span class="text-sm text-slate-900 dark:text-slate-100">Ahmed Khan</span>
                    <span class="text-sm text-slate-600 dark:text-slate-400">+92 300 1234567</span>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-amber-50 dark:bg-amber-500/10 text-amber-700 dark:text-amber-400 border border-amber-200 dark:border-amber-500/20">Balance / Due: Rs 25,000</span>
                </div>
            </div>
        </div>

        {{-- Purchase Information Row --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">Purchase Information</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label for="supplier_invoice_no" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Supplier Invoice No</label>
                    <input type="text" id="supplier_invoice_no" name="supplier_invoice_no" placeholder="e.g. INV-2024-001"
                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div>
                    <label for="purchase_date" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Purchase Date</label>
                    <input type="date" id="purchase_date" name="purchase_date"
                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div>
                    <label for="payment_type" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Payment Type</label>
                    <select id="payment_type" name="payment_type" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="cash">Cash</option>
                        <option value="credit">Credit</option>
                    </select>
                </div>
                <div>
                    <label for="invoice_status" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Invoice Status</label>
                    <div class="space-y-2">
                        <select id="invoice_status" name="invoice_status" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            <option value="received" selected>Received</option>
                            <option value="pending">Pending</option>
                            <option value="advance_order">Advance Order</option>
                        </select>
                        {{-- Invoice Status Visual Indicator --}}
                        <div id="invoice-status-badge" class="flex items-center gap-2">
                            <span id="status-badge-text" class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-medium bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">Stock Added</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Purchase Items Table --}}
        <div id="purchase-items-section" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white p-6 pb-3 border-b border-slate-200 dark:border-slate-700">Purchase Items</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-10">#</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider min-w-[200px]">Item / Product</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-24">Quantity</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-28">Purchase Price</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-28">Cost / Landing Price</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-28">Line Total</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-24">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="purchase-items-body">
                        <tr class="purchase-item-row hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors" data-item-index="0">
                            <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">1</td>
                            <td class="px-4 py-3">
                                <input type="text" name="items[0][product]" placeholder="Search product…"
                                    class="w-full min-w-[180px] rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </td>
                            <td class="px-4 py-3">
                                <input type="number" name="items[0][qty]" min="1" placeholder="0" value="10"
                                    class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </td>
                            <td class="px-4 py-3 text-right">
                                <input type="text" name="items[0][purchase_price]" placeholder="0" value="500"
                                    class="w-full text-right rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </td>
                            <td class="px-4 py-3 text-right">
                                <input type="text" name="items[0][cost_landing_price]" placeholder="0" value="550"
                                    class="w-full text-right rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </td>
                            <td class="px-4 py-3 text-right text-sm font-medium text-slate-900 dark:text-slate-100">Rs 5,000</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <button type="button" class="item-settings-btn p-2 rounded-lg text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors" data-item-index="0" title="Price Settings">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="remove-item-btn p-2 rounded-lg text-slate-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors" title="Remove row">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="purchase-item-row hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors" data-item-index="1">
                            <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">2</td>
                            <td class="px-4 py-3">
                                <input type="text" name="items[1][product]" placeholder="Search product…"
                                    class="w-full min-w-[180px] rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </td>
                            <td class="px-4 py-3">
                                <input type="number" name="items[1][qty]" min="1" placeholder="0" value="5"
                                    class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </td>
                            <td class="px-4 py-3 text-right">
                                <input type="text" name="items[1][purchase_price]" placeholder="0" value="1200"
                                    class="w-full text-right rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </td>
                            <td class="px-4 py-3 text-right">
                                <input type="text" name="items[1][cost_landing_price]" placeholder="0" value="1300"
                                    class="w-full text-right rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </td>
                            <td class="px-4 py-3 text-right text-sm font-medium text-slate-900 dark:text-slate-100">Rs 6,000</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <button type="button" class="item-settings-btn p-2 rounded-lg text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors" data-item-index="1" title="Price Settings">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="remove-item-btn p-2 rounded-lg text-slate-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors" title="Remove row">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-slate-200 dark:border-slate-700">
                <button type="button" id="add-item-btn" class="px-4 py-2.5 rounded-xl text-sm font-medium text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 border border-emerald-200 dark:border-emerald-500/30 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 transition-colors">
                    + Add Item
                </button>
            </div>
        </div>

        {{-- Price Settings Modal --}}
        <div id="price-settings-modal" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                {{-- Background overlay --}}
                <div class="fixed inset-0 bg-slate-500 bg-opacity-75 transition-opacity" aria-hidden="true" id="modal-backdrop"></div>
                
                {{-- Modal panel --}}
                <div class="inline-block align-bottom bg-white dark:bg-slate-800 rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white dark:bg-slate-800 px-6 py-5">
                        <div class="flex items-center justify-between mb-5">
                            <h3 class="text-lg font-semibold text-slate-900 dark:text-white" id="modal-title">Sale Price Settings</h3>
                            <button type="button" id="close-modal-btn" class="text-slate-400 hover:text-slate-500 dark:hover:text-slate-300 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                        
                        <div class="space-y-5">
                            {{-- Sale Price --}}
                            <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50/50 dark:bg-slate-800/50">
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Sale Price</label>
                                <div class="space-y-2">
                                    <input type="text" id="modal-sale-price" name="sale_price" placeholder="0" value="650"
                                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                                    <input type="text" id="modal-sale-percentage" name="sale_percentage" placeholder="%" value=""
                                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                                </div>
                            </div>
                            
                            {{-- Wholesale Price --}}
                            <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50/50 dark:bg-slate-800/50">
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Wholesale Price</label>
                                <div class="space-y-2">
                                    <input type="text" id="modal-wholesale-price" name="wholesale_price" placeholder="0" value="600"
                                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                                    <input type="text" id="modal-wholesale-percentage" name="wholesale_percentage" placeholder="%" value=""
                                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                                </div>
                            </div>
                            
                            {{-- Super Wholesale Price --}}
                            <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50/50 dark:bg-slate-800/50">
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Super Wholesale Price</label>
                                <div class="space-y-2">
                                    <input type="text" id="modal-super-wholesale-price" name="super_wholesale_price" placeholder="0" value="580"
                                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                                    <input type="text" id="modal-super-wholesale-percentage" name="super_wholesale_percentage" placeholder="%" value=""
                                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 flex justify-end gap-3">
                            <button type="button" id="save-price-settings-btn" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors">Save</button>
                            <button type="button" id="cancel-modal-btn" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                {{-- Purchase Summary --}}
                <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
                    <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">Purchase Summary</h2>
                    <dl class="space-y-3">
                        <div class="flex justify-between items-center">
                            <dt class="text-sm text-slate-600 dark:text-slate-400">Sub Total</dt>
                            <dd class="text-sm font-medium text-slate-900 dark:text-slate-100">Rs 11,000</dd>
                        </div>
                        <div class="flex justify-between items-center">
                            <dt class="text-sm text-slate-600 dark:text-slate-400">Discount</dt>
                            <dd class="text-sm font-medium text-slate-900 dark:text-slate-100">Rs 500</dd>
                        </div>
                        <div class="flex justify-between items-center">
                            <dt class="text-sm text-slate-600 dark:text-slate-400">Tax</dt>
                            <dd class="text-sm font-medium text-slate-900 dark:text-slate-100">Rs 525</dd>
                        </div>
                        <div class="flex justify-between items-center pt-3 border-t border-slate-200 dark:border-slate-700">
                            <dt class="text-base font-semibold text-slate-900 dark:text-white">Grand Total</dt>
                            <dd class="text-lg font-bold text-slate-900 dark:text-white">Rs 11,025</dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="lg:col-span-1">
                <div class="lg:sticky lg:top-6">
                    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50/50 dark:bg-slate-800/50 p-4 flex flex-col gap-3">
                        <button type="submit" class="w-full px-4 py-3 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors">Save Purchase</button>
                        <button type="button" id="save-and-new-btn" class="w-full px-4 py-3 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">Save & New</button>
                        <a href="#" class="w-full px-4 py-3 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors text-center">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
(function() {
    // Prevent form submission (UI only)
    var form = document.getElementById('add-purchase-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
        });
    }
    
    // Add item row (UI only)
    var itemIndex = 2;
    var tbody = document.getElementById('purchase-items-body');
    var addBtn = document.getElementById('add-item-btn');
    
    if (addBtn && tbody) {
        addBtn.addEventListener('click', function() {
            var n = tbody.querySelectorAll('tr').length + 1;
            var row = document.createElement('tr');
            row.className = 'purchase-item-row hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors';
            row.setAttribute('data-item-index', itemIndex);
            row.className = 'purchase-item-row hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors';
            row.innerHTML = '<td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">' + n + '</td><td class="px-4 py-3"><input type="text" name="items[' + itemIndex + '][product]" placeholder="Search product…" class="w-full min-w-[180px] rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></td><td class="px-4 py-3"><input type="number" name="items[' + itemIndex + '][qty]" min="1" placeholder="0" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></td><td class="px-4 py-3 text-right"><input type="text" name="items[' + itemIndex + '][purchase_price]" placeholder="0" class="w-full text-right rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></td><td class="px-4 py-3 text-right"><input type="text" name="items[' + itemIndex + '][cost_landing_price]" placeholder="0" class="w-full text-right rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></td><td class="px-4 py-3 text-right text-sm font-medium text-slate-900 dark:text-slate-100">—</td><td class="px-4 py-3 text-center"><div class="flex items-center justify-center gap-1"><button type="button" class="item-settings-btn p-2 rounded-lg text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors" data-item-index="' + itemIndex + '" title="Price Settings"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg></button><button type="button" class="remove-item-btn p-2 rounded-lg text-slate-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors" title="Remove row"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button></div></td>';
            tbody.appendChild(row);
            itemIndex++;
            
            // Remove row handler
            var removeBtn = row.querySelector('.remove-item-btn');
            if (removeBtn) {
                removeBtn.addEventListener('click', function() {
                    row.remove();
                });
            }
            
            // Settings button handler
            var settingsBtn = row.querySelector('.item-settings-btn');
            if (settingsBtn) {
                settingsBtn.addEventListener('click', function() {
                    openPriceSettingsModal(parseInt(this.getAttribute('data-item-index')));
                });
            }
        });
    }
    
    // Remove item row (UI only)
    if (tbody) {
        tbody.addEventListener('click', function(e) {
            if (e.target.closest('.remove-item-btn')) {
                e.target.closest('tr').remove();
            }
        });
    }
    
    // Price Settings Modal functionality (UI only)
    var modal = document.getElementById('price-settings-modal');
    var currentItemIndex = null;
    
    function openPriceSettingsModal(itemIndex) {
        currentItemIndex = itemIndex;
        if (modal) {
            modal.classList.remove('hidden');
            // Load existing values if any (UI only - placeholder)
            // In real implementation, this would load from the row data
        }
    }
    
    function closePriceSettingsModal() {
        if (modal) {
            modal.classList.add('hidden');
            currentItemIndex = null;
        }
    }
    
    // Modal event handlers
    var settingsButtons = document.querySelectorAll('.item-settings-btn');
    settingsButtons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            openPriceSettingsModal(parseInt(this.getAttribute('data-item-index')));
        });
    });
    
    var closeModalBtn = document.getElementById('close-modal-btn');
    var cancelModalBtn = document.getElementById('cancel-modal-btn');
    var savePriceSettingsBtn = document.getElementById('save-price-settings-btn');
    var modalBackdrop = document.getElementById('modal-backdrop');
    
    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', closePriceSettingsModal);
    }
    
    if (cancelModalBtn) {
        cancelModalBtn.addEventListener('click', closePriceSettingsModal);
    }
    
    if (savePriceSettingsBtn) {
        savePriceSettingsBtn.addEventListener('click', function() {
            // UI only - no actual saving
            closePriceSettingsModal();
        });
    }
    
    if (modalBackdrop) {
        modalBackdrop.addEventListener('click', closePriceSettingsModal);
    }
    
    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
            closePriceSettingsModal();
        }
    });
    
    // Invoice Status Visual Indicator (UI only - static display)
    var invoiceStatus = document.getElementById('invoice_status');
    var statusBadge = document.getElementById('status-badge-text');
    
    function updateInvoiceStatusBadge() {
        if (!invoiceStatus || !statusBadge) return;
        
        var status = invoiceStatus.value;
        var badgeText = '';
        var badgeClass = '';
        
        if (status === 'received') {
            badgeText = 'Stock Added';
            badgeClass = 'bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border-emerald-200 dark:border-emerald-500/20';
        } else {
            badgeText = 'Stock Not Added';
            badgeClass = 'bg-amber-50 dark:bg-amber-500/10 text-amber-700 dark:text-amber-400 border-amber-200 dark:border-amber-500/20';
        }
        
        statusBadge.textContent = badgeText;
        statusBadge.className = 'inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-medium border ' + badgeClass;
    }
    
    if (invoiceStatus) {
        invoiceStatus.addEventListener('change', updateInvoiceStatusBadge);
        updateInvoiceStatusBadge(); // Initial state
    }
    
    // Save & New button (UI only)
    var saveAndNewBtn = document.getElementById('save-and-new-btn');
    if (saveAndNewBtn) {
        saveAndNewBtn.addEventListener('click', function(e) {
            e.preventDefault();
            // UI only - no functionality
        });
    }
})();
</script>
@endsection
