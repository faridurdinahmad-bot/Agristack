@extends('layouts.app')

@section('title', 'Restore Backup')
@section('page-title', 'Restore Backup')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Restore Backup</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Restore data from a backup file (UI only)</p>
    </div>

    <form class="space-y-6">
        <div class="rounded-xl border border-amber-200 dark:border-amber-500/30 bg-amber-50 dark:bg-amber-500/10 p-4">
            <div class="flex items-start gap-3">
                <span class="text-xl">⚠️</span>
                <div>
                    <p class="text-sm font-medium text-amber-900 dark:text-amber-200">Warning</p>
                    <p class="text-sm text-amber-700 dark:text-amber-300 mt-1">Restoring a backup will replace all current data. Make sure to create a backup before proceeding.</p>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Select Backup</h3>
            <div class="space-y-4">
                <div>
                    <label for="restore_method" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-3">Restore Method <span class="text-red-500">*</span></label>
                    <div class="space-y-2">
                        <label class="flex items-start gap-3 p-4 rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700/50 cursor-pointer">
                            <input type="radio" name="restore_method" value="existing" checked class="mt-1 text-emerald-600 focus:ring-emerald-500">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-slate-900 dark:text-white">From Existing Backups</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Select from previously created backups</p>
                            </div>
                        </label>
                        <label class="flex items-start gap-3 p-4 rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700/50 cursor-pointer">
                            <input type="radio" name="restore_method" value="upload" class="mt-1 text-emerald-600 focus:ring-emerald-500">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-slate-900 dark:text-white">Upload Backup File</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Upload a backup file from your computer</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div id="existing_backup_section">
                    <label for="backup_select" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Select Backup <span class="text-red-500">*</span></label>
                    <select id="backup_select" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="">Choose a backup...</option>
                        <option value="1">Full Backup - 04 Feb 2025, 2:00 AM (125 MB)</option>
                        <option value="2">Full Backup - 03 Feb 2025, 2:00 AM (124 MB)</option>
                        <option value="3">Database Only - 02 Feb 2025, 2:00 AM (45 MB)</option>
                    </select>
                </div>
                <div id="upload_backup_section" class="hidden">
                    <label for="backup_file" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Upload Backup File <span class="text-red-500">*</span></label>
                    <input type="file" id="backup_file" accept=".zip,.sql,.tar.gz" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-emerald-50 file:text-emerald-700 dark:file:bg-emerald-500/20 dark:file:text-emerald-400 hover:file:bg-emerald-100 dark:hover:file:bg-emerald-500/30 cursor-pointer focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <p class="mt-1.5 text-xs text-slate-500 dark:text-slate-400">Supported formats: ZIP, SQL, TAR.GZ</p>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Restore Options</h3>
            <div class="space-y-3">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="create_backup_before" checked class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                    <span class="text-sm text-slate-700 dark:text-slate-300">Create backup before restoring (recommended)</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="restore_database" checked class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                    <span class="text-sm text-slate-700 dark:text-slate-300">Restore database</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="restore_files" checked class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                    <span class="text-sm text-slate-700 dark:text-slate-300">Restore files</span>
                </label>
            </div>
        </div>

        <div class="flex flex-wrap gap-3">
            <button type="submit" class="px-6 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Restore Backup</button>
            <a href="{{ route('app.backups.dashboard') }}" class="px-6 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</a>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const restoreMethod = document.querySelectorAll('input[name="restore_method"]');
    const existingSection = document.getElementById('existing_backup_section');
    const uploadSection = document.getElementById('upload_backup_section');
    
    restoreMethod.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'existing') {
                existingSection.classList.remove('hidden');
                uploadSection.classList.add('hidden');
            } else {
                existingSection.classList.add('hidden');
                uploadSection.classList.remove('hidden');
            }
        });
    });
});
</script>
@endsection
