@extends('layouts.app')

@section('title', 'Add Expense')
@section('page-title', 'Add Expense')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    {{-- Page Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:gap-4">
            <a href="#" class="inline-flex items-center gap-2 text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Back to Expense List
            </a>
            <h1 class="text-2xl font-semibold text-slate-900 dark:text-white">Add Expense</h1>
            <p class="text-sm text-slate-500 dark:text-slate-400">Yahan se expense add hota hai</p>
        </div>
    </div>

    <form class="space-y-6">
        {{-- Expense Details --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">Expense Details</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="expense_date" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Expense Date</label>
                    <input type="date" id="expense_date" name="expense_date"
                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div>
                    <label for="expense_category" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Category</label>
                    <select id="expense_category" name="category" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">Select category</option>
                        <option value="utilities">Utilities</option>
                        <option value="rent">Rent</option>
                        <option value="salaries">Salaries</option>
                        <option value="transport">Transport</option>
                        <option value="office">Office Supplies</option>
                        <option value="marketing">Marketing</option>
                    </select>
                </div>
                <div>
                    <label for="expense_amount" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Amount (Rs)</label>
                    <input type="text" id="expense_amount" name="amount" placeholder="0.00"
                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div>
                    <label for="payee" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Payee</label>
                    <input type="text" id="payee" name="payee" placeholder="Payee name"
                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div>
                    <label for="payment_method" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Payment Method</label>
                    <select id="payment_method" name="payment_method" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="cash">Cash</option>
                        <option value="bank">Bank Transfer</option>
                        <option value="cheque">Cheque</option>
                        <option value="card">Card</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="reference" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Reference / Invoice No</label>
                    <input type="text" id="reference" name="reference" placeholder="Optional reference"
                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div class="sm:col-span-2">
                    <label for="notes" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Notes</label>
                    <textarea id="notes" name="notes" rows="3" placeholder="Optional notes"
                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-none"></textarea>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap gap-3">
            <button type="button" class="px-5 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors">
                Save Expense
            </button>
            <a href="#" class="px-5 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
