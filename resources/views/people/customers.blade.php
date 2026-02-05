@extends('layouts.app')

@section('title', 'Customers')
@section('page-title', 'Customers')

@section('content')
<div class="space-y-6">
    {{-- Page Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Customers</h2>
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:gap-4">
            <label for="customer-search" class="sr-only">Search by customer name or phone</label>
            <input type="text"
                   id="customer-search"
                   placeholder="Search by name or phone…"
                   class="w-full sm:w-64 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
            <button type="button" id="open-add-modal" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors whitespace-nowrap">
                <span aria-hidden="true">+</span>
                Add Customer
            </button>
        </div>
    </div>

    {{-- Customers Table --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-14">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Customer Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Phone Number</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider max-w-[180px]">Address</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Balance / Due</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="customers-table-body">
                    @php
                        $sampleCustomers = [
                            ['id' => 1, 'name' => 'Ali Hassan', 'phone' => '+92 300 1112233', 'email' => 'ali@example.com', 'address' => '123 Main St, Faisalabad', 'balance' => 15000, 'status' => 'active'],
                            ['id' => 2, 'name' => 'Fatima Khan', 'phone' => '+92 321 4445566', 'email' => '', 'address' => 'Block B, DHA Phase 2, Lahore', 'balance' => 0, 'status' => 'active'],
                            ['id' => 3, 'name' => 'Rashid Traders', 'phone' => '+92 42 3789012', 'email' => 'rashid@traders.pk', 'address' => 'Wholesale Market, Karachi', 'balance' => 45000, 'status' => 'active'],
                            ['id' => 4, 'name' => 'Sana Ullah', 'phone' => '+92 333 7890123', 'email' => '', 'address' => 'Village Kot, Sargodha', 'balance' => 5200, 'status' => 'active'],
                            ['id' => 5, 'name' => 'Old Account', 'phone' => '+92 300 0000000', 'email' => 'old@example.com', 'address' => 'N/A', 'balance' => 0, 'status' => 'inactive'],
                        ];
                    @endphp
                    @foreach ($sampleCustomers as $index => $c)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">{{ $index + 1 }}</td>
                            <td class="px-4 py-3">
                                <span class="text-sm font-medium text-slate-900 dark:text-slate-100">{{ $c['name'] }}</span>
                            </td>
                            <td class="px-4 py-3 text-sm text-slate-900 dark:text-slate-100">{{ $c['phone'] }}</td>
                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">{{ $c['email'] ?: '—' }}</td>
                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400 truncate max-w-[180px]" title="{{ $c['address'] }}">{{ $c['address'] }}</td>
                            <td class="px-4 py-3 text-right">
                                @if($c['balance'] > 0)
                                    <span class="text-sm font-medium text-amber-600 dark:text-amber-400">Rs {{ number_format($c['balance']) }}</span>
                                @else
                                    <span class="text-sm text-slate-500 dark:text-slate-400">—</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                @if($c['status'] == 'active')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">Active</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-600">Inactive</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('app.people.customer-view', ['id' => $c['id']]) }}" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors inline-flex items-center justify-center" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    <button type="button" class="customer-edit px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors inline-flex items-center justify-center" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="customer-delete px-3 py-1.5 rounded-lg text-xs font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-500/10 hover:bg-red-100 dark:hover:bg-red-500/20 transition-colors" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="empty-state" class="hidden p-12 text-center">
            <div class="max-w-md mx-auto">
                <svg class="w-16 h-16 mx-auto text-slate-400 dark:text-slate-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">No customers found</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Get started by adding your first customer.</p>
                <button type="button" class="open-add-modal inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors">
                    <span aria-hidden="true">+</span>
                    Add First Customer
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Add / Edit Customer Modal (UI only) --}}
<div id="customer-modal" class="fixed inset-0 z-50 hidden" aria-hidden="true">
    <div class="fixed inset-0 bg-slate-900/60 dark:bg-slate-950/70 backdrop-blur-sm" id="customer-modal-backdrop"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4 overflow-y-auto">
        <div class="w-full max-w-lg rounded-2xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 shadow-xl my-8" role="dialog" aria-labelledby="customer-modal-title" aria-modal="true">
            <div class="p-6">
                <h3 id="customer-modal-title" class="text-lg font-semibold text-slate-900 dark:text-white mb-5">Add Customer</h3>
                <form id="customer-form" class="space-y-5">
                    <div>
                        <label for="customer_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Customer Name <span class="text-red-500">*</span></label>
                        <input type="text" id="customer_name" name="customer_name" required placeholder="e.g. Ali Hassan"
                            class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                    {{-- Phone Numbers (repeatable) --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Phone Number <span class="text-red-500">*</span></label>
                        <div id="customer-phones-container" class="space-y-4">
                            <div class="customer-phone-row p-4 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 flex flex-wrap items-end gap-4">
                                <div class="flex-1 min-w-[160px]">
                                    <label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Phone / Mobile</label>
                                    <input type="text" name="customer_phones[0][number]" placeholder="e.g. +92 300 1234567"
                                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                                </div>
                                <div class="w-28">
                                    <label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Label (optional)</label>
                                    <input type="text" name="customer_phones[0][label]" placeholder="Mobile, WhatsApp"
                                        class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                                </div>
                                <button type="button" class="remove-customer-phone hidden px-4 py-2.5 rounded-xl text-sm font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-500/10 hover:bg-red-100 dark:hover:bg-red-500/20 transition-colors" title="Remove">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                        </div>
                        <button type="button" id="add-customer-phone-btn" class="mt-2 px-4 py-2 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">+ Add Another Number</button>
                    </div>
                    <div>
                        <label for="customer_email" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Email (optional)</label>
                        <input type="email" id="customer_email" name="customer_email" placeholder="e.g. customer@example.com"
                            class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                    <div>
                        <label for="customer_address" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Address</label>
                        <textarea id="customer_address" name="customer_address" rows="3" placeholder="Full address…"
                            class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-y"></textarea>
                    </div>
                    <div>
                        <label for="opening_balance" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Opening Balance (optional)</label>
                        <input type="text" id="opening_balance" name="opening_balance" placeholder="e.g. 0 or 5000"
                            class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Status</label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="customer_status" value="active" checked class="rounded-full border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Active</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="customer_status" value="inactive" class="rounded-full border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Inactive</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-3 pt-2">
                        <button type="submit" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors">Save</button>
                        <button type="button" id="customer-modal-cancel" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    var modal = document.getElementById('customer-modal');
    var openBtn = document.getElementById('open-add-modal');
    var cancelBtn = document.getElementById('customer-modal-cancel');
    var backdrop = document.getElementById('customer-modal-backdrop');
    var form = document.getElementById('customer-form');
    function openModal() { modal.classList.remove('hidden'); }
    function closeModal() { modal.classList.add('hidden'); }
    if (openBtn) openBtn.addEventListener('click', openModal);
    document.querySelectorAll('.open-add-modal, .customer-edit').forEach(function(b) { b.addEventListener('click', openModal); });
    if (cancelBtn) cancelBtn.addEventListener('click', closeModal);
    if (backdrop) backdrop.addEventListener('click', closeModal);
    if (form) form.addEventListener('submit', function(e) { e.preventDefault(); closeModal(); });

    var phoneIndex = 1;
    document.getElementById('add-customer-phone-btn').addEventListener('click', function() {
        var container = document.getElementById('customer-phones-container');
        var first = container.querySelector('.customer-phone-row');
        if (first) first.querySelector('.remove-customer-phone').classList.remove('hidden');
        var row = document.createElement('div');
        row.className = 'customer-phone-row p-4 rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 flex flex-wrap items-end gap-4';
        row.innerHTML = '<div class="flex-1 min-w-[160px]"><label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Phone / Mobile</label><input type="text" name="customer_phones[' + phoneIndex + '][number]" placeholder="e.g. +92 300 1234567" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></div><div class="w-28"><label class="block text-xs font-medium text-slate-500 dark:text-slate-400 mb-1">Label (optional)</label><input type="text" name="customer_phones[' + phoneIndex + '][label]" placeholder="Mobile, WhatsApp" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none"></div><button type="button" class="remove-customer-phone px-4 py-2.5 rounded-xl text-sm font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-500/10 hover:bg-red-100 dark:hover:bg-red-500/20 transition-colors" title="Remove"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>';
        container.appendChild(row);
        phoneIndex++;
        row.querySelector('.remove-customer-phone').addEventListener('click', function() { row.remove(); var r = container.querySelectorAll('.customer-phone-row'); if (r.length === 1) r[0].querySelector('.remove-customer-phone').classList.add('hidden'); });
    });
    document.getElementById('customer-phones-container').addEventListener('click', function(e) {
        if (e.target.closest('.remove-customer-phone')) {
            var r = e.target.closest('.customer-phone-row');
            r.remove();
            var remaining = document.getElementById('customer-phones-container').querySelectorAll('.customer-phone-row');
            if (remaining.length === 1) remaining[0].querySelector('.remove-customer-phone').classList.add('hidden');
        }
    });

    var searchInput = document.getElementById('customer-search');
    var tableBody = document.getElementById('customers-table-body');
    var emptyState = document.getElementById('empty-state');
    if (searchInput && tableBody) {
        searchInput.addEventListener('input', function() {
            var term = this.value.toLowerCase().trim();
            var rows = tableBody.querySelectorAll('tr');
            var visible = 0;
            rows.forEach(function(row) {
                var name = (row.querySelector('td:nth-child(2)') || {}).textContent || '';
                var phone = (row.querySelector('td:nth-child(3)') || {}).textContent || '';
                var show = !term || name.toLowerCase().includes(term) || phone.toLowerCase().includes(term);
                row.style.display = show ? '' : 'none';
                if (show) visible++;
            });
            if (emptyState) {
                if (visible === 0 && term) { emptyState.classList.remove('hidden'); tableBody.style.display = 'none'; }
                else { emptyState.classList.add('hidden'); tableBody.style.display = ''; }
            }
        });
    }
})();
</script>
@endsection
