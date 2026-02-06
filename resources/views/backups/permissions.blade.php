@extends('layouts.app')

@section('title', 'Backup Permissions')
@section('page-title', 'Backup Permissions')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Backup Permissions</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Configure who can access backup features (UI only)</p>
    </div>

    <form class="space-y-6">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Role Permissions</h3>
            <div class="space-y-4">
                {{-- Admin Role --}}
                <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-600">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-sm font-medium text-slate-900 dark:text-white">Administrator</p>
                        <span class="text-xs text-slate-500 dark:text-slate-400">Full Access</span>
                    </div>
                    <div class="space-y-2 text-sm">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" checked disabled class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-slate-700 dark:text-slate-300">Create Backups</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" checked disabled class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-slate-700 dark:text-slate-300">Restore Backups</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" checked disabled class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-slate-700 dark:text-slate-300">Download Backups</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" checked disabled class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-slate-700 dark:text-slate-300">Delete Backups</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" checked disabled class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-slate-700 dark:text-slate-300">Configure Settings</span>
                        </label>
                    </div>
                </div>

                {{-- Manager Role --}}
                <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-600">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-sm font-medium text-slate-900 dark:text-white">Manager</p>
                    </div>
                    <div class="space-y-2 text-sm">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" checked class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-slate-700 dark:text-slate-300">Create Backups</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-slate-700 dark:text-slate-300">Restore Backups</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" checked class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-slate-700 dark:text-slate-300">Download Backups</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-slate-700 dark:text-slate-300">Delete Backups</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-slate-700 dark:text-slate-300">Configure Settings</span>
                        </label>
                    </div>
                </div>

                {{-- Staff Role --}}
                <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-600">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-sm font-medium text-slate-900 dark:text-white">Staff</p>
                    </div>
                    <div class="space-y-2 text-sm">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-slate-700 dark:text-slate-300">Create Backups</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-slate-700 dark:text-slate-300">Restore Backups</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" checked class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-slate-700 dark:text-slate-300">Download Backups</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-slate-700 dark:text-slate-300">Delete Backups</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-slate-700 dark:text-slate-300">Configure Settings</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap gap-3">
            <button type="submit" class="px-6 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Save Permissions</button>
            <a href="{{ route('app.backups.dashboard') }}" class="px-6 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
