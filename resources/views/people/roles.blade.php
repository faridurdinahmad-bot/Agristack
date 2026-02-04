@extends('layouts.app')

@section('title', 'Roles')
@section('page-title', 'Roles')

@section('content')
<div class="space-y-6">
    {{-- Top section: title + Add Role --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Roles</h2>
        <a href="{{ route('app.people.roles-form') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors">
            <span aria-hidden="true">+</span>
            Add Role
        </a>
    </div>

    {{-- Search --}}
    <div class="max-w-md">
        <label for="role-search" class="sr-only">Search roles</label>
        <input type="text"
               id="role-search"
               placeholder="Search roles…"
               class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
    </div>

    {{-- Roles Table --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Role Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Description</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Users Count</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="roles-table-body">
                    @php
                        $sampleRoles = [
                            [
                                'name' => 'Administrator',
                                'description' => 'Full system access with all permissions',
                                'usersCount' => 2,
                                'status' => 'active'
                            ],
                            [
                                'name' => 'Manager',
                                'description' => 'Can manage products, sales, and reports',
                                'usersCount' => 5,
                                'status' => 'active'
                            ],
                            [
                                'name' => 'Sales Staff',
                                'description' => 'Can view and create sales transactions',
                                'usersCount' => 8,
                                'status' => 'active'
                            ],
                            [
                                'name' => 'Inventory Clerk',
                                'description' => 'Can manage inventory and products',
                                'usersCount' => 3,
                                'status' => 'active'
                            ],
                            [
                                'name' => 'Viewer',
                                'description' => 'Read-only access to dashboard and reports',
                                'usersCount' => 0,
                                'status' => 'inactive'
                            ],
                        ];
                    @endphp
                    @foreach ($sampleRoles as $role)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            {{-- Role Name --}}
                            <td class="px-4 py-3">
                                <span class="text-sm font-medium text-slate-900 dark:text-slate-100">{{ $role['name'] }}</span>
                            </td>
                            {{-- Description --}}
                            <td class="px-4 py-3">
                                <span class="text-sm text-slate-600 dark:text-slate-400">{{ $role['description'] }}</span>
                            </td>
                            {{-- Users Count --}}
                            <td class="px-4 py-3 text-center">
                                <span class="text-sm text-slate-900 dark:text-slate-100">{{ $role['usersCount'] }}</span>
                            </td>
                            {{-- Status --}}
                            <td class="px-4 py-3 text-center">
                                @if($role['status'] == 'active')
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
                                    <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    <a href="{{ route('app.people.roles-form') }}" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors inline-flex items-center justify-center" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-500/10 hover:bg-red-100 dark:hover:bg-red-500/20 transition-colors" title="Delete">
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">No roles found</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Get started by creating your first role.</p>
                <a href="{{ route('app.people.roles-form') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors">
                    <span aria-hidden="true">+</span>
                    Add First Role
                </a>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    // Search functionality (UI only)
    document.getElementById('role-search').addEventListener('input', function(e) {
        var searchTerm = e.target.value.toLowerCase();
        var rows = document.querySelectorAll('#roles-table-body tr');
        var hasVisibleRows = false;

        rows.forEach(function(row) {
            var roleName = row.querySelector('td:first-child').textContent.toLowerCase();
            var description = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            
            if (roleName.includes(searchTerm) || description.includes(searchTerm)) {
                row.style.display = '';
                hasVisibleRows = true;
            } else {
                row.style.display = 'none';
            }
        });

        // Show/hide empty state
        var emptyState = document.getElementById('empty-state');
        var tableBody = document.getElementById('roles-table-body');
        if (!hasVisibleRows && searchTerm) {
            emptyState.classList.remove('hidden');
            tableBody.style.display = 'none';
        } else {
            emptyState.classList.add('hidden');
            tableBody.style.display = '';
        }
    });
})();
</script>
@endsection
