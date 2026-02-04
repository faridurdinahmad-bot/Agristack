@extends('layouts.app')

@section('title', 'Suppliers')
@section('page-title', 'Suppliers')

@section('content')
<div class="space-y-6">
    {{-- Top section: title + Add Supplier --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Suppliers</h2>
        <a href="{{ route('app.people.suppliers-form') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors">
            <span aria-hidden="true">+</span>
            Add Supplier
        </a>
    </div>

    {{-- Filters & Search Section --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
        <div class="space-y-4">
            {{-- Search Row --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="supplier-search-name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Search by Supplier Name</label>
                    <input type="text"
                           id="supplier-search-name"
                           name="supplier_search_name"
                           placeholder="Search by supplier name..."
                           class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
                </div>
                <div>
                    <label for="supplier-search-phone" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Search by Contact Number</label>
                    <input type="text"
                           id="supplier-search-phone"
                           name="supplier_search_phone"
                           placeholder="Search by phone number..."
                           class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
                </div>
            </div>

            {{-- Filter Row --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="filter-supplier-type" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Supplier Type</label>
                    <select id="filter-supplier-type" name="supplier_type" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">All Types</option>
                        <option value="local">Local</option>
                        <option value="external">External</option>
                    </select>
                </div>
                <div>
                    <label for="filter-supplies" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Supplies (Auto-Detected)</label>
                    <select id="filter-supplies" name="supplies" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">All</option>
                        <option value="seeds">Seeds</option>
                        <option value="fertilizers">Fertilizers</option>
                        <option value="pesticides">Pesticides</option>
                        <option value="tools">Tools</option>
                        <option value="livestock-feed">Livestock Feed</option>
                        <option value="vegetables">Vegetables</option>
                    </select>
                </div>
            </div>

            {{-- Clear Filters Button --}}
            <div class="flex justify-end">
                <button type="button" id="clear-filters" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">
                    Clear Filters
                </button>
            </div>
        </div>
    </div>

    {{-- Suppliers Table --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Supplier Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Shop / Company Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Primary Contact</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Supplies (Auto-Detected)</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Supplier Type</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="suppliers-table-body">
                    @php
                        $sampleSuppliers = [
                            [
                                'id' => 1,
                                'name' => 'Ahmed Khan',
                                'shopName' => 'Khan Trading Company',
                                'phone' => '+92 300 1234567',
                                'supplies' => ['Seeds', 'Fertilizers'],
                                'type' => 'local',
                                'status' => 'active'
                            ],
                            [
                                'id' => 2,
                                'name' => 'Ali Enterprises',
                                'shopName' => 'Ali Enterprises',
                                'phone' => '+92 321 9876543',
                                'supplies' => ['Pesticides', 'Tools'],
                                'type' => 'local',
                                'status' => 'active'
                            ],
                            [
                                'id' => 3,
                                'name' => 'GreenFields International',
                                'shopName' => 'GreenFields International',
                                'phone' => '+1 555 1234567',
                                'supplies' => ['Seeds', 'Fertilizers', 'Pesticides'],
                                'type' => 'external',
                                'status' => 'active'
                            ],
                            [
                                'id' => 4,
                                'name' => 'Hassan Suppliers',
                                'shopName' => 'Hassan Suppliers & Co.',
                                'phone' => '+92 333 4567890',
                                'supplies' => ['Livestock Feed'],
                                'type' => 'local',
                                'status' => 'inactive'
                            ],
                            [
                                'id' => 5,
                                'name' => 'FarmPro Global',
                                'shopName' => 'FarmPro Global',
                                'phone' => '+44 20 12345678',
                                'supplies' => ['Tools', 'Equipment'],
                                'type' => 'external',
                                'status' => 'active'
                            ],
                        ];
                    @endphp
                    @foreach ($sampleSuppliers as $supplier)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            {{-- Supplier Name --}}
                            <td class="px-4 py-3">
                                <span class="text-sm font-medium text-slate-900 dark:text-slate-100">{{ $supplier['name'] }}</span>
                            </td>
                            {{-- Shop / Company Name --}}
                            <td class="px-4 py-3">
                                <span class="text-sm text-slate-600 dark:text-slate-400">{{ $supplier['shopName'] }}</span>
                            </td>
                            {{-- Phone Number --}}
                            <td class="px-4 py-3">
                                <span class="text-sm text-slate-900 dark:text-slate-100">{{ $supplier['phone'] }}</span>
                            </td>
                            {{-- Supplies / Categories --}}
                            <td class="px-4 py-3">
                                <div class="flex flex-wrap gap-1">
                                    @foreach ($supplier['supplies'] as $supply)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-600">
                                            {{ $supply }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            {{-- Supplier Type --}}
                            <td class="px-4 py-3 text-center">
                                @if($supplier['type'] == 'local')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-blue-50 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400 border border-blue-200 dark:border-blue-500/20">
                                        Local
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-purple-50 dark:bg-purple-500/10 text-purple-700 dark:text-purple-400 border border-purple-200 dark:border-purple-500/20">
                                        External
                                    </span>
                                @endif
                            </td>
                            {{-- Status --}}
                            <td class="px-4 py-3 text-center">
                                @if($supplier['status'] == 'active')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-600">
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            {{-- Actions --}}
                            <td class="px-4 py-3 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('app.people.supplier-view', ['id' => $supplier['id']]) }}" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors inline-flex items-center justify-center" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('app.people.suppliers-form') }}" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors inline-flex items-center justify-center" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">No suppliers found</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Get started by adding your first supplier.</p>
                <a href="{{ route('app.people.suppliers-form') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors">
                    <span aria-hidden="true">+</span>
                    Add First Supplier
                </a>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    // Clear filters functionality (UI only)
    document.getElementById('clear-filters').addEventListener('click', function() {
        document.getElementById('supplier-search-name').value = '';
        document.getElementById('supplier-search-phone').value = '';
        document.getElementById('filter-supplier-type').value = '';
        document.getElementById('filter-supplies').value = '';
    });

    // Filter/search functionality (UI only)
    function filterSuppliers() {
        var nameTerm = document.getElementById('supplier-search-name').value.toLowerCase();
        var phoneTerm = document.getElementById('supplier-search-phone').value.toLowerCase();
        var typeFilter = document.getElementById('filter-supplier-type').value;
        var suppliesFilter = document.getElementById('filter-supplies').value;

        var rows = document.querySelectorAll('#suppliers-table-body tr');
        var hasVisibleRows = false;

        rows.forEach(function(row) {
            var name = row.querySelector('td:first-child').textContent.toLowerCase();
            var phone = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            var typeBadge = row.querySelector('td:nth-child(5) span');
            var type = typeBadge ? typeBadge.textContent.trim().toLowerCase() : '';
            var supplies = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

            var matchName = !nameTerm || name.includes(nameTerm);
            var matchPhone = !phoneTerm || phone.includes(phoneTerm);
            var matchType = !typeFilter || type === typeFilter;
            var matchSupplies = !suppliesFilter || supplies.includes(suppliesFilter);

            if (matchName && matchPhone && matchType && matchSupplies) {
                row.style.display = '';
                hasVisibleRows = true;
            } else {
                row.style.display = 'none';
            }
        });

        var emptyState = document.getElementById('empty-state');
        var tableBody = document.getElementById('suppliers-table-body');
        if (!hasVisibleRows) {
            emptyState.classList.remove('hidden');
            tableBody.style.display = 'none';
        } else {
            emptyState.classList.add('hidden');
            tableBody.style.display = '';
        }
    }

    document.getElementById('supplier-search-name').addEventListener('input', filterSuppliers);
    document.getElementById('supplier-search-phone').addEventListener('input', filterSuppliers);
    document.getElementById('filter-supplier-type').addEventListener('change', filterSuppliers);
    document.getElementById('filter-supplies').addEventListener('change', filterSuppliers);
})();
</script>
@endsection
