@extends('layouts.app')

@section('title', 'Storage & Locations')
@section('page-title', 'Storage & Locations')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Storage & Locations</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Manage backup storage locations and settings (UI only)</p>
    </div>

    {{-- Storage Overview --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Total Storage</p>
            <p class="text-2xl font-semibold text-slate-900 dark:text-white">10 GB</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Used</p>
            <p class="text-2xl font-semibold text-slate-900 dark:text-white">2.4 GB</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Available</p>
            <p class="text-2xl font-semibold text-slate-900 dark:text-white">7.6 GB</p>
        </div>
    </div>

    {{-- Storage Usage --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Storage Usage</h3>
        <div class="space-y-3">
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-slate-600 dark:text-slate-400">Used: 2.4 GB</span>
                    <span class="text-slate-600 dark:text-slate-400">24%</span>
                </div>
                <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-3">
                    <div class="bg-emerald-600 dark:bg-emerald-500 h-3 rounded-full" style="width: 24%"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Storage Locations --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Storage Locations</h3>
        <div class="space-y-4">
            <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-600">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-900 dark:text-white">Local Storage</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">/storage/backups</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">2.4 GB used</p>
                    </div>
                    <span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">Active</span>
                </div>
            </div>
            <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-600 opacity-60">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-900 dark:text-white">Cloud Storage (S3)</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Not configured</p>
                    </div>
                    <span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300">Inactive</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Storage Settings --}}
    <form class="space-y-6">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Storage Settings</h3>
            <div class="space-y-4">
                <div>
                    <label for="storage_path" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Backup Storage Path</label>
                    <input type="text" id="storage_path" value="/storage/backups" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <p class="mt-1.5 text-xs text-slate-500 dark:text-slate-400">Default path where backups are stored</p>
                </div>
                <div>
                    <label for="max_storage" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Maximum Storage (GB)</label>
                    <input type="number" id="max_storage" value="10" min="1" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" checked class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                    <span class="text-sm text-slate-700 dark:text-slate-300">Auto-delete oldest backups when storage limit is reached</span>
                </label>
            </div>
        </div>

        <div class="flex flex-wrap gap-3">
            <button type="submit" class="px-6 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Save Settings</button>
            <a href="{{ route('app.backups.dashboard') }}" class="px-6 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
