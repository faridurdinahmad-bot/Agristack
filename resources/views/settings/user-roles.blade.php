@extends('layouts.app')

@section('title', 'User & Roles')
@section('page-title', 'User & Roles')

@section('content')
<style>
    #add-role-modal-toggle { display: none; }
    #add-role-modal { display: none; }
    #add-role-modal-toggle:checked ~ #add-role-modal { display: flex; }
    .tab-input { display: none; }
    .tab-input:checked + .tab-label { color: rgb(5 150 105); font-weight: 600; border-bottom-color: rgb(5 150 105); }
    .dark .tab-input:checked + .tab-label { color: rgb(52 211 153); border-bottom-color: rgb(52 211 153); }
    .tab-panel { display: none; }
    .tab-input#tab-roles:checked ~ .tab-panel-roles { display: block; }
    .tab-input#tab-users:checked ~ .tab-panel-users { display: block; }
</style>
<input type="checkbox" id="add-role-modal-toggle" class="sr-only" aria-hidden="true" />
<div id="add-role-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <label for="add-role-modal-toggle" class="absolute inset-0 bg-black/50 backdrop-blur-sm cursor-pointer" aria-label="Close modal"></label>
    <div class="relative z-10 bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-600 shadow-xl w-full max-w-md">
        <div class="p-6 border-b border-slate-200 dark:border-slate-700">
            <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Add role</h3>
            <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Create a new role (UI only)</p>
        </div>
        <form class="p-6 space-y-4" onsubmit="return false;">
            <div>
                <label for="role_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Role name</label>
                <input type="text" id="role_name" placeholder="e.g. Store Manager"
                    class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex flex-wrap gap-3 pt-2">
                <label for="add-role-modal-toggle" class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors cursor-pointer">Cancel</label>
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Create role</button>
            </div>
        </form>
    </div>
</div>

<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">User & Roles</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Manage roles and user permissions (UI only)</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="flex border-b border-slate-200 dark:border-slate-700">
            <input type="radio" name="user_roles_tab" id="tab-roles" class="tab-input" checked>
            <label for="tab-roles" class="tab-label flex-1 px-4 py-3 text-center text-sm font-medium text-slate-600 dark:text-slate-400 border-b-2 border-transparent cursor-pointer hover:text-slate-900 dark:hover:text-slate-200">Roles</label>
            <input type="radio" name="user_roles_tab" id="tab-users" class="tab-input">
            <label for="tab-users" class="tab-label flex-1 px-4 py-3 text-center text-sm font-medium text-slate-600 dark:text-slate-400 border-b-2 border-transparent cursor-pointer hover:text-slate-900 dark:hover:text-slate-200">Users</label>
        </div>

        <div class="tab-panel tab-panel-roles p-5">
            <div class="flex justify-between items-center mb-4">
                <p class="text-sm text-slate-500 dark:text-slate-400">Define roles and assign permissions</p>
                <label for="add-role-modal-toggle" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md cursor-pointer">+ Add role</label>
            </div>
            <ul class="space-y-2">
                @foreach (['Admin', 'Manager', 'Sales', 'Store Incharge'] as $role)
                    <li class="flex items-center justify-between py-2 px-3 rounded-lg bg-slate-50 dark:bg-slate-800/50">
                        <span class="text-sm font-medium text-slate-800 dark:text-slate-200">{{ $role }}</span>
                        <div class="flex gap-1">
                            <button type="button" class="p-2 rounded-lg text-slate-500 hover:bg-slate-200 dark:hover:bg-slate-700" title="Edit">✎</button>
                            <button type="button" class="p-2 rounded-lg text-slate-500 hover:bg-slate-200 dark:hover:bg-slate-700" title="Permissions">🔐</button>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="tab-panel tab-panel-users p-5">
            <p class="text-sm text-slate-500 dark:text-slate-400 mb-4">Users and their assigned roles (dummy list)</p>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="border-b border-slate-200 dark:border-slate-700">
                        <tr>
                            <th class="text-left py-2 font-semibold text-slate-700 dark:text-slate-300">User</th>
                            <th class="text-left py-2 font-semibold text-slate-700 dark:text-slate-300">Role</th>
                            <th class="text-center py-2 font-semibold text-slate-700 dark:text-slate-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                        <tr><td class="py-2 text-slate-800 dark:text-slate-200">admin@agristack.com</td><td class="py-2 text-slate-600 dark:text-slate-400">Admin</td><td class="py-2 text-center"><button type="button" class="text-emerald-600 dark:text-emerald-400 hover:underline text-sm">Edit</button></td></tr>
                        <tr><td class="py-2 text-slate-800 dark:text-slate-200">manager@agristack.com</td><td class="py-2 text-slate-600 dark:text-slate-400">Manager</td><td class="py-2 text-center"><button type="button" class="text-emerald-600 dark:text-emerald-400 hover:underline text-sm">Edit</button></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
