@extends('layouts.app')

@section('title', 'Auto Backup Settings')
@section('page-title', 'Auto Backup Settings')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Auto Backup Settings</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Configure automatic backup schedules (UI only)</p>
    </div>

    <form class="space-y-6">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Enable Auto Backup</h3>
            <div class="flex items-center justify-between p-4 rounded-xl border border-slate-200 dark:border-slate-600">
                <div>
                    <p class="text-sm font-medium text-slate-900 dark:text-white">Automatic Backups</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Enable scheduled automatic backups</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" checked class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 dark:peer-focus:ring-emerald-800 rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-slate-600 peer-checked:bg-emerald-600"></div>
                </label>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Backup Schedule</h3>
            <div class="space-y-4">
                {{-- Daily --}}
                <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-600">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <p class="text-sm font-medium text-slate-900 dark:text-white">Daily Backup</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Backup every day at specified time</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" checked class="sr-only peer">
                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 dark:peer-focus:ring-emerald-800 rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-slate-600 peer-checked:bg-emerald-600"></div>
                        </label>
                    </div>
                    <div class="mt-3">
                        <label for="daily_time" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Time</label>
                        <input type="time" id="daily_time" value="02:00" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    </div>
                </div>

                {{-- Weekly --}}
                <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-600">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <p class="text-sm font-medium text-slate-900 dark:text-white">Weekly Backup</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Backup once per week</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 dark:peer-focus:ring-emerald-800 rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-slate-600 peer-checked:bg-emerald-600"></div>
                        </label>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mt-3">
                        <div>
                            <label for="weekly_day" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Day</label>
                            <select id="weekly_day" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                            </select>
                        </div>
                        <div>
                            <label for="weekly_time" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Time</label>
                            <input type="time" id="weekly_time" value="02:00" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        </div>
                    </div>
                </div>

                {{-- Monthly --}}
                <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-600">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <p class="text-sm font-medium text-slate-900 dark:text-white">Monthly Backup</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Backup once per month</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 dark:peer-focus:ring-emerald-800 rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-slate-600 peer-checked:bg-emerald-600"></div>
                        </label>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mt-3">
                        <div>
                            <label for="monthly_day" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Day of Month</label>
                            <input type="number" id="monthly_day" min="1" max="28" value="1" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        </div>
                        <div>
                            <label for="monthly_time" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Time</label>
                            <input type="time" id="monthly_time" value="02:00" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Backup Options</h3>
            <div class="space-y-3">
                <div>
                    <label for="backup_type_auto" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Backup Type</label>
                    <select id="backup_type_auto" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                        <option value="full">Full Backup</option>
                        <option value="database">Database Only</option>
                    </select>
                </div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" checked class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                    <span class="text-sm text-slate-700 dark:text-slate-300">Keep only last 30 backups (auto-delete older backups)</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                    <span class="text-sm text-slate-700 dark:text-slate-300">Send email notification on backup completion</span>
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
