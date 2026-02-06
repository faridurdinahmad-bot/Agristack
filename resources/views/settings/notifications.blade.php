@extends('layouts.app')

@section('title', 'Notification Settings')
@section('page-title', 'Notification Settings')

@section('content')
<style>
    .toggle-dot { transition: transform 0.2s; }
    .peer:checked ~ .toggle-track .toggle-dot { transform: translateX(1.25rem); }
</style>

<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Notification Settings</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Choose what and how you get notified</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5 space-y-4">
        <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200">Channels</h3>
        @php
            $channels = [
                ['id' => 'notify_email', 'label' => 'Email notifications', 'desc' => 'Receive alerts and summaries by email', 'checked' => true],
                ['id' => 'notify_in_app', 'label' => 'In-app notifications', 'desc' => 'Show notifications inside the app', 'checked' => true],
                ['id' => 'notify_browser', 'label' => 'Browser push', 'desc' => 'Desktop browser push (when allowed)', 'checked' => false],
            ];
        @endphp
        @foreach ($channels as $ch)
            <div class="flex items-center justify-between gap-4 py-3 border-b border-slate-100 dark:border-slate-700 last:border-0">
                <div>
                    <p class="text-sm font-medium text-slate-800 dark:text-slate-200">{{ $ch['label'] }}</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400">{{ $ch['desc'] }}</p>
                </div>
                <label class="relative inline-flex cursor-pointer items-center">
                    <input type="checkbox" class="peer sr-only" id="{{ $ch['id'] }}" {{ $ch['checked'] ? 'checked' : '' }}>
                    <div class="toggle-track relative h-6 w-11 rounded-full bg-slate-200 dark:bg-slate-600 peer-focus:ring-2 peer-focus:ring-emerald-500/20 peer-checked:bg-emerald-500">
                        <span class="toggle-dot absolute left-0.5 top-1 h-4 w-4 rounded-full bg-white shadow border border-slate-200 dark:border-slate-600"></span>
                    </div>
                </label>
            </div>
        @endforeach
        <div class="flex flex-wrap gap-3 pt-2">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Save</button>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5 space-y-4">
        <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200">Alert types</h3>
        @php
            $alerts = [
                ['id' => 'alert_low_stock', 'label' => 'Low stock alerts', 'checked' => true],
                ['id' => 'alert_sales', 'label' => 'Sales / order alerts', 'checked' => true],
                ['id' => 'alert_payment', 'label' => 'Payment reminders', 'checked' => true],
                ['id' => 'alert_system', 'label' => 'System & backup', 'checked' => false],
            ];
        @endphp
        @foreach ($alerts as $a)
            <div class="flex items-center justify-between gap-4 py-2">
                <p class="text-sm text-slate-800 dark:text-slate-200">{{ $a['label'] }}</p>
                <label class="relative inline-flex cursor-pointer items-center">
                    <input type="checkbox" class="peer sr-only" id="{{ $a['id'] }}" {{ $a['checked'] ? 'checked' : '' }}>
                    <div class="toggle-track relative h-6 w-11 rounded-full bg-slate-200 dark:bg-slate-600 peer-focus:ring-2 peer-focus:ring-emerald-500/20 peer-checked:bg-emerald-500">
                        <span class="toggle-dot absolute left-0.5 top-1 h-4 w-4 rounded-full bg-white shadow border border-slate-200 dark:border-slate-600"></span>
                    </div>
                </label>
            </div>
        @endforeach
        <div class="flex flex-wrap gap-3 pt-2">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Save</button>
        </div>
    </div>
</div>
@endsection
