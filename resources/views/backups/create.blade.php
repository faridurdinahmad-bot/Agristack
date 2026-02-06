@extends('layouts.app')

@section('title', 'Create Backup')
@section('page-title', 'Create Backup')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Create Backup</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Create a new backup of your data (UI only)</p>
    </div>

    <form class="space-y-6">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Backup Configuration</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-3">Backup Type <span class="text-red-500">*</span></label>
                    <div class="space-y-2">
                        <label class="flex items-start gap-3 p-4 rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700/50 cursor-pointer">
                            <input type="radio" name="backup_type" value="full" checked class="mt-1 text-emerald-600 focus:ring-emerald-500">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-slate-900 dark:text-white">Full Backup</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Backup all data including database, files, and configurations</p>
                            </div>
                        </label>
                        <label class="flex items-start gap-3 p-4 rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700/50 cursor-pointer">
                            <input type="radio" name="backup_type" value="database" class="mt-1 text-emerald-600 focus:ring-emerald-500">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-slate-900 dark:text-white">Database Only</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Backup only the database</p>
                            </div>
                        </label>
                        <label class="flex items-start gap-3 p-4 rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700/50 cursor-pointer">
                            <input type="radio" name="backup_type" value="files" class="mt-1 text-emerald-600 focus:ring-emerald-500">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-slate-900 dark:text-white">Files Only</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Backup only uploaded files and documents</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div>
                    <label for="backup_name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Backup Name (Optional)</label>
                    <input type="text" id="backup_name" placeholder="e.g., Manual Backup - Feb 2025" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <p class="mt-1.5 text-xs text-slate-500 dark:text-slate-400">If left empty, a default name will be generated</p>
                </div>
                <div>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="compress" checked class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700 dark:text-slate-300">Compress backup (recommended)</span>
                    </label>
                </div>
                <div>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="email_notification" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700 dark:text-slate-300">Send email notification when backup completes</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap gap-3">
            <button type="submit" class="px-6 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Create Backup</button>
            <a href="{{ route('app.backups.dashboard') }}" class="px-6 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
