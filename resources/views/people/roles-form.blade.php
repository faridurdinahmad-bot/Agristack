@extends('layouts.app')

@section('title', 'Add Role')
@section('page-title', 'Add Role')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    {{-- Page Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-900 dark:text-white mb-1">Add Role</h1>
        <p class="text-sm text-slate-600 dark:text-slate-400">Create a new role and assign permissions</p>
    </div>

    <form id="role-form" class="space-y-5">
        {{-- SECTION 1: Role Basic Info --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">1. Role Information</h2>
            
            <div class="space-y-5">
                {{-- Role Name --}}
                <div>
                    <label for="role_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Role Name <span class="text-red-500">*</span></label>
                    <input type="text" 
                           id="role_name" 
                           name="role_name" 
                           required
                           placeholder="e.g. Manager, Sales Staff, Inventory Clerk"
                           class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>

                {{-- Role Description --}}
                <div>
                    <label for="role_description" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Role Description</label>
                    <textarea id="role_description" 
                              name="role_description" 
                              rows="3"
                              placeholder="Describe the role and its purpose..."
                              class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-y"></textarea>
                </div>

                {{-- Role Status --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Status</label>
                    <div class="flex gap-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="role_status" value="active" checked class="rounded-full border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Active</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="role_status" value="inactive" class="rounded-full border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-sm text-slate-700 dark:text-slate-300">Inactive</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        {{-- SECTION 2: Permissions --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">2. Permissions</h2>
            
            <div class="space-y-6">
                @php
                    $modules = [
                        'Dashboard' => [
                            'view' => 'View Dashboard'
                        ],
                        'Products' => [
                            'view' => 'View Products',
                            'add' => 'Add Products',
                            'edit' => 'Edit Products',
                            'delete' => 'Delete Products'
                        ],
                        'Categories' => [
                            'view' => 'View Categories',
                            'add' => 'Add Categories',
                            'edit' => 'Edit Categories',
                            'delete' => 'Delete Categories'
                        ],
                        'Customers' => [
                            'view' => 'View Customers',
                            'add' => 'Add Customers',
                            'edit' => 'Edit Customers',
                            'delete' => 'Delete Customers'
                        ],
                        'Suppliers' => [
                            'view' => 'View Suppliers',
                            'add' => 'Add Suppliers',
                            'edit' => 'Edit Suppliers',
                            'delete' => 'Delete Suppliers'
                        ],
                        'Purchases' => [
                            'view' => 'View Purchases',
                            'add' => 'Add Purchases',
                            'edit' => 'Edit Purchases',
                            'delete' => 'Delete Purchases'
                        ],
                        'Sales' => [
                            'view' => 'View Sales',
                            'add' => 'Add Sales',
                            'edit' => 'Edit Sales',
                            'delete' => 'Delete Sales'
                        ],
                        'Reports' => [
                            'view' => 'View Reports',
                            'add' => 'Generate Reports',
                            'edit' => 'Export Reports',
                            'delete' => 'Delete Reports'
                        ],
                        'Settings' => [
                            'view' => 'View Settings',
                            'add' => 'Add Settings',
                            'edit' => 'Edit Settings',
                            'delete' => 'Delete Settings'
                        ],
                    ];
                @endphp

                @foreach ($modules as $moduleName => $permissions)
                    <div class="border border-slate-200 dark:border-slate-600 rounded-xl p-4 bg-slate-50 dark:bg-slate-800/50">
                        {{-- Module Header --}}
                        <h3 class="text-sm font-semibold text-slate-900 dark:text-white mb-4 pb-2 border-b border-slate-200 dark:border-slate-700">{{ $moduleName }}</h3>
                        
                        {{-- Permissions Grid --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                            @foreach ($permissions as $permissionKey => $permissionLabel)
                                <label class="inline-flex items-center gap-2 cursor-pointer p-2 rounded-lg hover:bg-white dark:hover:bg-slate-700/50 transition-colors">
                                    <input type="checkbox" 
                                           name="permissions[]" 
                                           value="{{ strtolower($moduleName) }}.{{ $permissionKey }}"
                                           class="rounded border-slate-300 dark:border-slate-600 text-emerald-600 focus:ring-emerald-500">
                                    <span class="text-sm text-slate-700 dark:text-slate-300">{{ $permissionLabel }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                {{-- Quick Actions --}}
                <div class="flex flex-wrap gap-3 pt-4 border-t border-slate-200 dark:border-slate-700">
                    <button type="button" id="select-all-permissions" class="px-4 py-2 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">
                        Select All
                    </button>
                    <button type="button" id="deselect-all-permissions" class="px-4 py-2 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">
                        Deselect All
                    </button>
                </div>
            </div>
        </div>

        {{-- Form Actions --}}
        <div class="flex flex-wrap gap-3 pt-4 border-t border-slate-200 dark:border-slate-700">
            <button type="submit" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors">Save Role</button>
            <a href="{{ route('app.people.roles') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors inline-flex items-center">
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
(function() {
    // Select All Permissions
    document.getElementById('select-all-permissions').addEventListener('click', function() {
        document.querySelectorAll('input[name="permissions[]"]').forEach(function(checkbox) {
            checkbox.checked = true;
        });
    });

    // Deselect All Permissions
    document.getElementById('deselect-all-permissions').addEventListener('click', function() {
        document.querySelectorAll('input[name="permissions[]"]').forEach(function(checkbox) {
            checkbox.checked = false;
        });
    });

    // Form submission (UI only)
    document.getElementById('role-form').addEventListener('submit', function(e) {
        e.preventDefault();
        var selectedPermissions = Array.from(document.querySelectorAll('input[name="permissions[]"]:checked')).map(function(cb) {
            return cb.value;
        });
        alert('Role form submitted (UI only - no backend logic)\n\nSelected permissions: ' + selectedPermissions.length);
    });
})();
</script>
@endsection
