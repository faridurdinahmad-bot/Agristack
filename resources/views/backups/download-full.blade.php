@extends('layouts.app')

@section('title', 'Download Full Backup')
@section('page-title', 'Download Full Backup')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Download Full Backup</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Download a complete backup of all your data (UI only)</p>
    </div>

    <form class="space-y-6">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Backup Options</h3>
            <div class="space-y-4">
                <div>
                    <label for="backup_format" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Format <span class="text-red-500">*</span></label>
                    <select id="backup_format" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="zip">ZIP Archive</option>
                        <option value="tar.gz">TAR.GZ Archive</option>
                    </select>
                </div>
                <div>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="compress" checked class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                        <span class="text-sm text-slate-700 dark:text-slate-300">Compress backup</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">What's Included</h3>
            <ul class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                <li class="flex items-center gap-2">✅ Complete database</li>
                <li class="flex items-center gap-2">✅ All uploaded files and documents</li>
                <li class="flex items-center gap-2">✅ System configurations</li>
                <li class="flex items-center gap-2">✅ User data and settings</li>
            </ul>
        </div>

        <div class="flex flex-wrap gap-3">
            <button type="submit" class="px-6 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Download Backup</button>
            <a href="{{ route('app.backups.dashboard') }}" class="px-6 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
