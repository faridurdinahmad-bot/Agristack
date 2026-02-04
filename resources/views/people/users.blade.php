@extends('layouts.app')

@section('title', 'Users')
@section('page-title', 'Users')

@section('content')
<div class="space-y-6">
    {{-- Top section: title + Add User --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Users</h2>
        <a href="#" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors">
            <span aria-hidden="true">+</span>
            Add User
        </a>
    </div>

    {{-- Filters & Search Section --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
        <div class="space-y-4">
            {{-- Search Row --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="user-search-name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Search by Name</label>
                    <input type="text"
                           id="user-search-name"
                           name="user_search_name"
                           placeholder="Search by name..."
                           class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
                </div>
                <div>
                    <label for="user-search-phone" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Search by Phone / Username</label>
                    <input type="text"
                           id="user-search-phone"
                           name="user_search_phone"
                           placeholder="Search by phone or username..."
                           class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
                </div>
            </div>

            {{-- Filter Row --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="filter-role" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Role</label>
                    <select id="filter-role" name="role" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">All Roles</option>
                        <option value="1">Administrator</option>
                        <option value="2">Manager</option>
                        <option value="3">Sales Staff</option>
                        <option value="4">Inventory Clerk</option>
                        <option value="5">Viewer</option>
                    </select>
                </div>
                <div>
                    <label for="filter-status" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Status</label>
                    <select id="filter-status" name="status" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="pending">Pending</option>
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

    {{-- Users Table --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Role</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Phone / Username</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Email</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Last Login</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="users-table-body">
                    @php
                        $sampleUsers = [
                            [
                                'name' => 'Admin User',
                                'role' => 'Administrator',
                                'phone' => 'admin',
                                'email' => 'admin@example.com',
                                'status' => 'active',
                                'lastLogin' => '2026-02-04 09:15'
                            ],
                            [
                                'name' => 'John Doe',
                                'role' => 'Manager',
                                'phone' => '+92 300 1234567',
                                'email' => 'john.doe@example.com',
                                'status' => 'active',
                                'lastLogin' => '2026-02-04 08:30'
                            ],
                            [
                                'name' => 'Jane Smith',
                                'role' => 'Sales Staff',
                                'phone' => 'jane.smith',
                                'email' => 'jane@example.com',
                                'status' => 'active',
                                'lastLogin' => '2026-02-03 16:45'
                            ],
                            [
                                'name' => 'Mike Johnson',
                                'role' => 'Inventory Clerk',
                                'phone' => '+92 321 9876543',
                                'email' => '',
                                'status' => 'inactive',
                                'lastLogin' => '2026-01-28 11:00'
                            ],
                            [
                                'name' => 'Sarah Williams',
                                'role' => 'Viewer',
                                'phone' => 'sarah.w',
                                'email' => 'sarah@example.com',
                                'status' => 'pending',
                                'lastLogin' => '—'
                            ],
                        ];
                    @endphp
                    @foreach ($sampleUsers as $user)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            {{-- Name --}}
                            <td class="px-4 py-3">
                                <span class="text-sm font-medium text-slate-900 dark:text-slate-100">{{ $user['name'] }}</span>
                            </td>
                            {{-- Role --}}
                            <td class="px-4 py-3">
                                <span class="text-sm text-slate-600 dark:text-slate-400">{{ $user['role'] }}</span>
                            </td>
                            {{-- Phone / Username --}}
                            <td class="px-4 py-3">
                                <span class="text-sm text-slate-900 dark:text-slate-100">{{ $user['phone'] }}</span>
                            </td>
                            {{-- Email --}}
                            <td class="px-4 py-3">
                                <span class="text-sm text-slate-600 dark:text-slate-400">{{ $user['email'] ?: '—' }}</span>
                            </td>
                            {{-- Status --}}
                            <td class="px-4 py-3 text-center">
                                @if($user['status'] == 'active')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">
                                        Active
                                    </span>
                                @elseif($user['status'] == 'inactive')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700/50 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-600">
                                        Inactive
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-yellow-50 dark:bg-yellow-500/10 text-yellow-700 dark:text-yellow-400 border border-yellow-200 dark:border-yellow-500/20">
                                        Pending
                                    </span>
                                @endif
                            </td>
                            {{-- Last Login --}}
                            <td class="px-4 py-3">
                                <span class="text-sm text-slate-600 dark:text-slate-400">{{ $user['lastLogin'] }}</span>
                            </td>
                            {{-- Actions --}}
                            <td class="px-4 py-3 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    @if($user['status'] == 'active')
                                        <button type="button" class="toggle-status-btn px-3 py-1.5 rounded-lg text-xs font-medium text-amber-600 dark:text-amber-400 bg-amber-50 dark:bg-amber-500/10 hover:bg-amber-100 dark:hover:bg-amber-500/20 transition-colors" title="Deactivate">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                            </svg>
                                        </button>
                                    @elseif($user['status'] == 'inactive')
                                        <button type="button" class="toggle-status-btn px-3 py-1.5 rounded-lg text-xs font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-500/10 hover:bg-emerald-100 dark:hover:bg-emerald-500/20 transition-colors" title="Activate">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </button>
                                    @else
                                        <button type="button" class="toggle-status-btn px-3 py-1.5 rounded-lg text-xs font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-500/10 hover:bg-emerald-100 dark:hover:bg-emerald-500/20 transition-colors" title="Approve / Activate">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </button>
                                    @endif
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">No users found</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Get started by adding your first user.</p>
                <a href="#" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors">
                    <span aria-hidden="true">+</span>
                    Add First User
                </a>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="px-4 py-4 border-t border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/50">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                {{-- Rows per page --}}
                <div class="flex items-center gap-2">
                    <label for="rows-per-page" class="text-sm text-slate-700 dark:text-slate-300">Rows per page:</label>
                    <select id="rows-per-page" name="rows_per_page" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-1.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="10">10</option>
                        <option value="25" selected>25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>

                {{-- Pagination Info & Controls --}}
                <div class="flex items-center gap-4">
                    <span class="text-sm text-slate-700 dark:text-slate-300">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">5</span> users
                    </span>
                    <div class="flex items-center gap-2">
                        <button type="button" class="px-3 py-1.5 rounded-lg text-sm font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button type="button" class="px-3 py-1.5 rounded-lg text-sm font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    // Clear filters functionality (UI only)
    document.getElementById('clear-filters').addEventListener('click', function() {
        document.getElementById('user-search-name').value = '';
        document.getElementById('user-search-phone').value = '';
        document.getElementById('filter-role').value = '';
        document.getElementById('filter-status').value = '';
    });

    // Filter/search functionality (UI only)
    function filterUsers() {
        var nameTerm = document.getElementById('user-search-name').value.toLowerCase();
        var phoneTerm = document.getElementById('user-search-phone').value.toLowerCase();
        var roleFilter = document.getElementById('filter-role').value;
        var statusFilter = document.getElementById('filter-status').value;

        var rows = document.querySelectorAll('#users-table-body tr');
        var hasVisibleRows = false;

        rows.forEach(function(row) {
            var name = row.querySelector('td:first-child').textContent.toLowerCase();
            var role = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            var phone = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            var statusBadge = row.querySelector('td:nth-child(5) span');
            var status = statusBadge ? statusBadge.textContent.trim().toLowerCase() : '';

            var matchName = !nameTerm || name.includes(nameTerm);
            var matchPhone = !phoneTerm || phone.includes(phoneTerm);
            var matchRole = !roleFilter || (roleFilter === '1' && role.includes('administrator')) || (roleFilter === '2' && role.includes('manager')) || (roleFilter === '3' && role.includes('sales')) || (roleFilter === '4' && role.includes('inventory')) || (roleFilter === '5' && role.includes('viewer'));
            var matchStatus = !statusFilter || status === statusFilter;

            if (matchName && matchPhone && matchRole && matchStatus) {
                row.style.display = '';
                hasVisibleRows = true;
            } else {
                row.style.display = 'none';
            }
        });

        var emptyState = document.getElementById('empty-state');
        var tableBody = document.getElementById('users-table-body');
        if (!hasVisibleRows) {
            emptyState.classList.remove('hidden');
            tableBody.style.display = 'none';
        } else {
            emptyState.classList.add('hidden');
            tableBody.style.display = '';
        }
    }

    document.getElementById('user-search-name').addEventListener('input', filterUsers);
    document.getElementById('user-search-phone').addEventListener('input', filterUsers);
    document.getElementById('filter-role').addEventListener('change', filterUsers);
    document.getElementById('filter-status').addEventListener('change', filterUsers);

    // Activate/Deactivate buttons (UI only)
    document.querySelectorAll('.toggle-status-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            alert('Activate / Deactivate action (UI only - no backend logic)');
        });
    });
})();
</script>
@endsection
