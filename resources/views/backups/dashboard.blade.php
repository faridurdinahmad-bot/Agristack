@extends('layouts.app')

@section('title', 'Backup Dashboard')
@section('page-title', 'Backup Dashboard')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Backup Dashboard</h2>
            <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Manage and monitor your backups (UI only)</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('app.backups.create') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Create Backup</a>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <div class="flex items-center gap-3">
                <div class="p-3 rounded-xl bg-emerald-100 dark:bg-emerald-500/20">
                    <span class="text-2xl">💾</span>
                </div>
                <div>
                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">48</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Total Backups</p>
                </div>
            </div>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <div class="flex items-center gap-3">
                <div class="p-3 rounded-xl bg-blue-100 dark:bg-blue-500/20">
                    <span class="text-2xl">🕐</span>
                </div>
                <div>
                    <p class="text-sm font-semibold text-slate-900 dark:text-white">04 Feb 2025, 2:00 AM</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Last Backup</p>
                </div>
            </div>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <div class="flex items-center gap-3">
                <div class="p-3 rounded-xl bg-amber-100 dark:bg-amber-500/20">
                    <span class="text-2xl">📦</span>
                </div>
                <div>
                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">2.4 GB</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Used Space</p>
                </div>
            </div>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <div class="flex items-center gap-3">
                <div class="p-3 rounded-xl bg-purple-100 dark:bg-purple-500/20">
                    <span class="text-2xl">✅</span>
                </div>
                <div>
                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">45</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Successful</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Quick Actions</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('app.backups.create') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-3xl">➕</span>
                <span class="text-sm font-medium text-slate-900 dark:text-white">Create Backup</span>
            </a>
            <a href="{{ route('app.backups.restore') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-3xl">🔄</span>
                <span class="text-sm font-medium text-slate-900 dark:text-white">Restore</span>
            </a>
            <a href="{{ route('app.backups.history') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-3xl">📑</span>
                <span class="text-sm font-medium text-slate-900 dark:text-white">View History</span>
            </a>
            <a href="{{ route('app.backups.auto-settings') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-3xl">⏰</span>
                <span class="text-sm font-medium text-slate-900 dark:text-white">Auto Settings</span>
            </a>
        </div>
    </div>

    {{-- Recent Backups --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="p-4 border-b border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/95 flex items-center justify-between">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white">Recent Backups</h3>
            <a href="{{ route('app.backups.history') }}" class="text-sm text-emerald-600 dark:text-emerald-400 hover:underline">View All</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 dark:bg-slate-800/95 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Type</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Size</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">04 Feb 2025, 2:00 AM</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Full Backup</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">125 MB</td>
                        <td class="px-4 py-3"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">Success</span></td>
                        <td class="px-4 py-3 text-center">
                            <button type="button" class="inline-flex px-3 py-1.5 rounded-lg text-xs font-medium text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10">Download</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">03 Feb 2025, 2:00 AM</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Full Backup</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">124 MB</td>
                        <td class="px-4 py-3"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">Success</span></td>
                        <td class="px-4 py-3 text-center">
                            <button type="button" class="inline-flex px-3 py-1.5 rounded-lg text-xs font-medium text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10">Download</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">02 Feb 2025, 2:00 AM</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Database Only</td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">45 MB</td>
                        <td class="px-4 py-3"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">Success</span></td>
                        <td class="px-4 py-3 text-center">
                            <button type="button" class="inline-flex px-3 py-1.5 rounded-lg text-xs font-medium text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10">Download</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Storage Info --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Storage Usage</h3>
            <div class="space-y-3">
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-slate-600 dark:text-slate-400">Used: 2.4 GB</span>
                        <span class="text-slate-600 dark:text-slate-400">Total: 10 GB</span>
                    </div>
                    <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-2">
                        <div class="bg-emerald-600 dark:bg-emerald-500 h-2 rounded-full" style="width: 24%"></div>
                    </div>
                </div>
                <div class="text-xs text-slate-500 dark:text-slate-400">24% of storage used</div>
            </div>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Auto Backup Status</h3>
            <div class="space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-slate-600 dark:text-slate-400">Daily Backup</span>
                    <span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">Enabled</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-slate-600 dark:text-slate-400">Next Backup</span>
                    <span class="text-sm font-medium text-slate-900 dark:text-white">05 Feb 2025, 2:00 AM</span>
                </div>
                <a href="{{ route('app.backups.auto-settings') }}" class="block mt-3 text-sm text-emerald-600 dark:text-emerald-400 hover:underline">Configure Settings →</a>
            </div>
        </div>
    </div>
</div>
@endsection
