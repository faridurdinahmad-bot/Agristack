@extends('layouts.app')

@section('title', 'Customer Groups')
@section('page-title', 'Customer Groups')

@section('content')
<div class="space-y-6">
    {{-- Page Header: Title + Add button + Search --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Customer Groups</h2>
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:gap-4">
            <label for="customer-group-search" class="sr-only">Search by group name</label>
            <input type="text"
                   id="customer-group-search"
                   placeholder="Search by group name…"
                   class="w-full sm:w-64 rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
            <button type="button" id="open-add-modal" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors whitespace-nowrap">
                <span aria-hidden="true">+</span>
                Add Customer Group
            </button>
        </div>
    </div>

    {{-- Customer Groups Table --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider w-14">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Group Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Description</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Total Customers</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="customer-groups-table-body">
                    @php
                        $sampleGroups = [
                            ['id' => 1, 'name' => 'Retail / Walk-in', 'description' => 'Individual customers and small retail buyers', 'totalCustomers' => 45, 'status' => 'active'],
                            ['id' => 2, 'name' => 'Wholesale', 'description' => 'Bulk buyers and distributors', 'totalCustomers' => 18, 'status' => 'active'],
                            ['id' => 3, 'name' => 'Farmers & Agriculture', 'description' => 'Farm inputs and agriculture-focused customers', 'totalCustomers' => 32, 'status' => 'active'],
                            ['id' => 4, 'name' => 'Institutional', 'description' => 'Schools, hospitals, and government accounts', 'totalCustomers' => 8, 'status' => 'active'],
                            ['id' => 5, 'name' => 'Legacy / Inactive', 'description' => 'Old group no longer in use', 'totalCustomers' => 0, 'status' => 'inactive'],
                        ];
                    @endphp
                    @foreach ($sampleGroups as $index => $group)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-4 py-3 text-sm text-slate-500 dark:text-slate-400">{{ $index + 1 }}</td>
                            <td class="px-4 py-3">
                                <span class="text-sm font-medium text-slate-900 dark:text-slate-100">{{ $group['name'] }}</span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-sm text-slate-600 dark:text-slate-400">{{ $group['description'] }}</span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <span class="text-sm text-slate-900 dark:text-slate-100">{{ $group['totalCustomers'] }}</span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                @if($group['status'] == 'active')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">Active</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-600">Inactive</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('app.people.customer-group-view', ['id' => $group['id']]) }}" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors inline-flex items-center justify-center" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    <button type="button" class="customer-group-edit px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors inline-flex items-center justify-center" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="customer-group-delete px-3 py-1.5 rounded-lg text-xs font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-500/10 hover:bg-red-100 dark:hover:bg-red-500/20 transition-colors" title="Delete">
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

        {{-- Empty State (hidden by default) --}}
        <div id="empty-state" class="hidden p-12 text-center">
            <div class="max-w-md mx-auto">
                <svg class="w-16 h-16 mx-auto text-slate-400 dark:text-slate-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">No customer groups found</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Get started by creating your first customer group.</p>
                <button type="button" class="open-add-modal inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors">
                    <span aria-hidden="true">+</span>
                    Add First Customer Group
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Add / Edit Customer Group Modal (UI only) --}}
<div id="customer-group-modal" class="fixed inset-0 z-50 hidden" aria-hidden="true">
    <div class="fixed inset-0 bg-slate-900/60 dark:bg-slate-950/70 backdrop-blur-sm" id="modal-backdrop"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="w-full max-w-md rounded-2xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 shadow-xl" role="dialog" aria-labelledby="modal-title" aria-modal="true">
            <div class="p-6">
                <h3 id="modal-title" class="text-lg font-semibold text-slate-900 dark:text-white mb-5">Add Customer Group</h3>
                <form id="customer-group-form" class="space-y-5">
                    <div>
                        <label for="group_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Group Name <span class="text-red-500">*</span></label>
                        <input type="text"
                               id="group_name"
                               name="group_name"
                               required
                               placeholder="e.g. Retail / Walk-in"
                               class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                    <div>
                        <label for="group_description" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Description (optional)</label>
                        <textarea id="group_description"
                                  name="group_description"
                                  rows="3"
                                  placeholder="Brief description of this group…"
                                  class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-y"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Status</label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="group_status" value="active" checked class="rounded-full border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Active</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="group_status" value="inactive" class="rounded-full border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                                <span class="text-sm text-slate-700 dark:text-slate-300">Inactive</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-3 pt-2">
                        <button type="submit" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors">Save</button>
                        <button type="button" id="modal-cancel" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    var modal = document.getElementById('customer-group-modal');
    var openBtn = document.getElementById('open-add-modal');
    var cancelBtn = document.getElementById('modal-cancel');
    var backdrop = document.getElementById('modal-backdrop');
    var form = document.getElementById('customer-group-form');

    function openModal() { modal.classList.remove('hidden'); }
    function closeModal() { modal.classList.add('hidden'); }

    if (openBtn) openBtn.addEventListener('click', openModal);
    document.querySelectorAll('.open-add-modal, .customer-group-edit').forEach(function(btn) { btn.addEventListener('click', openModal); });
    if (cancelBtn) cancelBtn.addEventListener('click', closeModal);
    if (backdrop) backdrop.addEventListener('click', closeModal);

    if (form) form.addEventListener('submit', function(e) {
        e.preventDefault();
        closeModal();
    });

    // Search (UI only)
    var searchInput = document.getElementById('customer-group-search');
    var tableBody = document.getElementById('customer-groups-table-body');
    var emptyState = document.getElementById('empty-state');
    if (searchInput && tableBody) {
        searchInput.addEventListener('input', function() {
            var term = this.value.toLowerCase().trim();
            var rows = tableBody.querySelectorAll('tr');
            var visible = 0;
            rows.forEach(function(row) {
                var name = row.querySelector('td:nth-child(2)') ? row.querySelector('td:nth-child(2)').textContent.toLowerCase() : '';
                var desc = row.querySelector('td:nth-child(3)') ? row.querySelector('td:nth-child(3)').textContent.toLowerCase() : '';
                var show = !term || name.includes(term) || desc.includes(term);
                row.style.display = show ? '' : 'none';
                if (show) visible++;
            });
            if (emptyState) {
                if (visible === 0 && term) {
                    emptyState.classList.remove('hidden');
                    tableBody.style.display = 'none';
                } else {
                    emptyState.classList.add('hidden');
                    tableBody.style.display = '';
                }
            }
        });
    }
})();
</script>
@endsection
