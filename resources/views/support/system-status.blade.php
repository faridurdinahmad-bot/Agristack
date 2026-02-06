@extends('layouts.app')

@section('title', 'System Status')
@section('page-title', 'System Status')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">System Status</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Current status of all system components</p>
    </div>

    {{-- Overall Status --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-3 h-3 rounded-full bg-green-500 animate-pulse"></div>
            <h3 class="text-base font-semibold text-slate-900 dark:text-white">All Systems Operational</h3>
        </div>
        <p class="text-sm text-slate-600 dark:text-slate-400">Last updated: 04 Feb 2025, 2:30 PM</p>
    </div>

    {{-- System Components --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        {{-- Component 1 --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <div class="flex items-center justify-between mb-3">
                <h4 class="text-sm font-semibold text-slate-900 dark:text-white">API Services</h4>
                <span class="inline-flex px-2 py-1 rounded-lg text-xs font-medium bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">Operational</span>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400">Uptime: 99.9%</p>
        </div>

        {{-- Component 2 --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <div class="flex items-center justify-between mb-3">
                <h4 class="text-sm font-semibold text-slate-900 dark:text-white">Database</h4>
                <span class="inline-flex px-2 py-1 rounded-lg text-xs font-medium bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">Operational</span>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400">Response time: 12ms</p>
        </div>

        {{-- Component 3 --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <div class="flex items-center justify-between mb-3">
                <h4 class="text-sm font-semibold text-slate-900 dark:text-white">File Storage</h4>
                <span class="inline-flex px-2 py-1 rounded-lg text-xs font-medium bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">Operational</span>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400">Storage: 45% used</p>
        </div>

        {{-- Component 4 --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <div class="flex items-center justify-between mb-3">
                <h4 class="text-sm font-semibold text-slate-900 dark:text-white">Email Service</h4>
                <span class="inline-flex px-2 py-1 rounded-lg text-xs font-medium bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">Operational</span>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400">Delivery rate: 99.8%</p>
        </div>

        {{-- Component 5 --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <div class="flex items-center justify-between mb-3">
                <h4 class="text-sm font-semibold text-slate-900 dark:text-white">Payment Gateway</h4>
                <span class="inline-flex px-2 py-1 rounded-lg text-xs font-medium bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">Operational</span>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400">Success rate: 99.9%</p>
        </div>

        {{-- Component 6 --}}
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <div class="flex items-center justify-between mb-3">
                <h4 class="text-sm font-semibold text-slate-900 dark:text-white">Backup Service</h4>
                <span class="inline-flex px-2 py-1 rounded-lg text-xs font-medium bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">Operational</span>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400">Last backup: 2 hours ago</p>
        </div>
    </div>

    {{-- Recent Incidents --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Recent Incidents</h3>
        <div class="space-y-3">
            <div class="flex items-start gap-3 p-3 rounded-lg bg-slate-50 dark:bg-slate-700/50">
                <span class="text-lg">✅</span>
                <div class="flex-1">
                    <p class="text-sm font-medium text-slate-900 dark:text-white">API Service Maintenance</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Resolved on 02 Feb 2025, 3:00 AM - Scheduled maintenance completed successfully.</p>
                </div>
            </div>
            <div class="flex items-start gap-3 p-3 rounded-lg bg-slate-50 dark:bg-slate-700/50">
                <span class="text-lg">✅</span>
                <div class="flex-1">
                    <p class="text-sm font-medium text-slate-900 dark:text-white">Database Optimization</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Resolved on 01 Feb 2025, 11:00 PM - Performance improvements applied.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Status History --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Status History</h3>
        <div class="space-y-2 text-sm">
            <div class="flex items-center gap-3">
                <div class="w-2 h-2 rounded-full bg-green-500"></div>
                <span class="text-slate-600 dark:text-slate-400">04 Feb 2025 - All systems operational</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-2 h-2 rounded-full bg-green-500"></div>
                <span class="text-slate-600 dark:text-slate-400">03 Feb 2025 - All systems operational</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-2 h-2 rounded-full bg-amber-500"></div>
                <span class="text-slate-600 dark:text-slate-400">02 Feb 2025 - Scheduled maintenance (3:00 AM - 4:00 AM)</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-2 h-2 rounded-full bg-green-500"></div>
                <span class="text-slate-600 dark:text-slate-400">01 Feb 2025 - All systems operational</span>
            </div>
        </div>
    </div>
</div>
@endsection
