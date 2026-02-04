@extends('layouts.app')

@section('title', 'Add Supplier')
@section('page-title', 'Add Supplier')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    {{-- Page Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-900 dark:text-white mb-1">Add Supplier</h1>
        <p class="text-sm text-slate-600 dark:text-slate-400">Add a new local supplier</p>
    </div>

    <form id="add-supplier-form" class="space-y-5">
        {{-- SECTION 1: Basic Information --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">1. Basic Information</h2>
            
            <div class="space-y-5">
                <div>
                    <label for="shop_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Business / Shop Name</label>
                    <input type="text" 
                           id="shop_name" 
                           name="shop_name" 
                           placeholder="e.g. Khan Trading Company"
                           class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>

                <div>
                    <label for="supplier_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Supplier Name (person/contact) <span class="text-red-500">*</span></label>
                    <input type="text" 
                           id="supplier_name" 
                           name="supplier_name" 
                           required
                           placeholder="e.g. Ahmed Khan"
                           class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>

                {{-- Contact Numbers (repeatable) --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Contact Numbers</label>
                    <div id="contact-numbers-container" class="space-y-4">
                        <div class="contact-number-row p-4 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 flex flex-wrap items-end gap-4">
                            <div class="flex-1 min-w-[180px]">
                                <label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Phone / Mobile Number</label>
                                <input type="text" 
                                       name="contact_numbers[0][number]" 
                                       placeholder="e.g. +92 300 1234567"
                                       class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </div>
                            <div class="w-32">
                                <label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Label (optional)</label>
                                <input type="text" 
                                       name="contact_numbers[0][label]" 
                                       placeholder="e.g. Mobile, WhatsApp"
                                       class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            </div>
                            <button type="button" class="remove-contact-number-btn hidden px-4 py-2.5 rounded-xl text-sm font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-500/10 hover:bg-red-100 dark:hover:bg-red-500/20 transition-colors" title="Remove">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <button type="button" id="add-contact-number-btn" class="mt-3 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">
                        + Add Another Number
                    </button>
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Address</label>
                    <textarea id="address" 
                              name="address" 
                              rows="3"
                              placeholder="Enter supplier address..."
                              class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-y"></textarea>
                </div>
            </div>
        </div>

        {{-- SECTION 2: Bank Accounts --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">2. Bank Accounts</h2>
            
            <div id="bank-accounts-container" class="space-y-4">
                {{-- First Bank Account Row --}}
                <div class="bank-account-row p-4 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Bank Name</label>
                            <input type="text" 
                                   name="bank_accounts[0][bank_name]"
                                   placeholder="e.g. HBL, UBL, Meezan"
                                   class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Account Title</label>
                            <input type="text" 
                                   name="bank_accounts[0][account_title]"
                                   placeholder="e.g. Khan Trading Company"
                                   class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Account Number</label>
                            <div class="flex gap-2">
                                <input type="text" 
                                       name="bank_accounts[0][account_number]"
                                       placeholder="e.g. 1234567890123"
                                       class="flex-1 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                                <button type="button" class="remove-bank-account-btn hidden px-4 py-2.5 rounded-xl text-sm font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-500/10 hover:bg-red-100 dark:hover:bg-red-500/20 transition-colors" title="Remove">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" id="add-bank-account-btn" class="mt-4 px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">
                + Add Another Bank Account
            </button>
        </div>

        {{-- SECTION 3: Status --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">3. Status</h2>
            
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Status</label>
                <div class="flex gap-4">
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="status" value="active" checked class="rounded-full border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700 dark:text-slate-300">Active</span>
                    </label>
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="status" value="inactive" class="rounded-full border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700 dark:text-slate-300">Inactive</span>
                    </label>
                </div>
            </div>
        </div>

        {{-- Form Actions --}}
        <div class="flex flex-wrap gap-3 pt-4 border-t border-slate-200 dark:border-slate-700">
            <button type="submit" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors">Save Supplier</button>
            <a href="{{ route('app.people.suppliers') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors inline-flex items-center">
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
(function() {
    var bankAccountIndex = 1;
    var contactNumberIndex = 1;

    // Contact Numbers: Add row
    document.getElementById('add-contact-number-btn').addEventListener('click', function() {
        var container = document.getElementById('contact-numbers-container');
        var firstRow = container.querySelector('.contact-number-row');
        if (firstRow) {
            firstRow.querySelector('.remove-contact-number-btn').classList.remove('hidden');
        }
        var newRow = document.createElement('div');
        newRow.className = 'contact-number-row p-4 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 flex flex-wrap items-end gap-4';
        newRow.innerHTML = `
            <div class="flex-1 min-w-[180px]">
                <label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Phone / Mobile Number</label>
                <input type="text" name="contact_numbers[${contactNumberIndex}][number]" placeholder="e.g. +92 300 1234567"
                    class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="w-32">
                <label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Label (optional)</label>
                <input type="text" name="contact_numbers[${contactNumberIndex}][label]" placeholder="e.g. Mobile, WhatsApp"
                    class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <button type="button" class="remove-contact-number-btn px-4 py-2.5 rounded-xl text-sm font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-500/10 hover:bg-red-100 dark:hover:bg-red-500/20 transition-colors" title="Remove">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        `;
        container.appendChild(newRow);
        contactNumberIndex++;
        newRow.querySelector('.remove-contact-number-btn').addEventListener('click', function() {
            newRow.remove();
            var remaining = container.querySelectorAll('.contact-number-row');
            if (remaining.length === 1) {
                remaining[0].querySelector('.remove-contact-number-btn').classList.add('hidden');
            }
        });
    });
    document.getElementById('contact-numbers-container').addEventListener('click', function(e) {
        if (e.target.closest('.remove-contact-number-btn')) {
            var row = e.target.closest('.contact-number-row');
            row.remove();
            var remaining = document.getElementById('contact-numbers-container').querySelectorAll('.contact-number-row');
            if (remaining.length === 1) {
                remaining[0].querySelector('.remove-contact-number-btn').classList.add('hidden');
            }
        }
    });

    // Add Bank Account
    document.getElementById('add-bank-account-btn').addEventListener('click', function() {
        var container = document.getElementById('bank-accounts-container');
        var firstRow = container.querySelector('.bank-account-row');
        if (firstRow) {
            firstRow.querySelector('.remove-bank-account-btn').classList.remove('hidden');
        }

        var newRow = document.createElement('div');
        newRow.className = 'bank-account-row p-4 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50';
        newRow.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Bank Name</label>
                    <input type="text" 
                           name="bank_accounts[${bankAccountIndex}][bank_name]"
                           placeholder="e.g. HBL, UBL, Meezan"
                           class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Account Title</label>
                    <input type="text" 
                           name="bank_accounts[${bankAccountIndex}][account_title]"
                           placeholder="e.g. Khan Trading Company"
                           class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Account Number</label>
                    <div class="flex gap-2">
                        <input type="text" 
                               name="bank_accounts[${bankAccountIndex}][account_number]"
                               placeholder="e.g. 1234567890123"
                               class="flex-1 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <button type="button" class="remove-bank-account-btn px-4 py-2.5 rounded-xl text-sm font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-500/10 hover:bg-red-100 dark:hover:bg-red-500/20 transition-colors" title="Remove">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        `;
        container.appendChild(newRow);
        bankAccountIndex++;

        // Add remove handler
        newRow.querySelector('.remove-bank-account-btn').addEventListener('click', function() {
            newRow.remove();
            var remaining = container.querySelectorAll('.bank-account-row');
            if (remaining.length === 1) {
                remaining[0].querySelector('.remove-bank-account-btn').classList.add('hidden');
            }
        });
    });

    // Remove Bank Account
    document.getElementById('bank-accounts-container').addEventListener('click', function(e) {
        if (e.target.closest('.remove-bank-account-btn')) {
            var row = e.target.closest('.bank-account-row');
            row.remove();
            var remaining = document.getElementById('bank-accounts-container').querySelectorAll('.bank-account-row');
            if (remaining.length === 1) {
                remaining[0].querySelector('.remove-bank-account-btn').classList.add('hidden');
            }
        }
    });

    // Form submission (UI only)
    document.getElementById('add-supplier-form').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Supplier form submitted (UI only - no backend logic)');
    });
})();
</script>
@endsection
