@extends('layouts.app')

@section('title', 'Charts & Graphs')
@section('page-title', 'Charts & Graphs')

@section('content')
<style>
    .chart-tab { display: none; }
    .chart-tab-input:checked + .chart-tab-label { color: rgb(5 150 105); font-weight: 600; border-bottom-color: rgb(5 150 105); }
    .dark .chart-tab-input:checked + .chart-tab-label { color: rgb(52 211 153); border-bottom-color: rgb(52 211 153); }
    .chart-panel { display: none; }
    #chart-bar:checked ~ .chart-panel-bar { display: block; }
    #chart-line:checked ~ .chart-panel-line { display: block; }
    #chart-pie:checked ~ .chart-panel-pie { display: block; }
</style>

<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Charts & Graphs</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Visual analytics (UI placeholders)</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="charts_from" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">From</label>
                <input type="date" id="charts_from" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="charts_to" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">To</label>
                <input type="date" id="charts_to" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex items-end gap-2 sm:col-span-2">
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Apply</button>
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Clear</button>
            </div>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="flex border-b border-slate-200 dark:border-slate-700">
            <input type="radio" name="chart_type" id="chart-bar" class="chart-tab-input sr-only" checked>
            <label for="chart-bar" class="chart-tab-label flex-1 px-4 py-3 text-center text-sm font-medium text-slate-600 dark:text-slate-400 border-b-2 border-transparent cursor-pointer">Bar</label>
            <input type="radio" name="chart_type" id="chart-line" class="chart-tab-input sr-only">
            <label for="chart-line" class="chart-tab-label flex-1 px-4 py-3 text-center text-sm font-medium text-slate-600 dark:text-slate-400 border-b-2 border-transparent cursor-pointer">Line</label>
            <input type="radio" name="chart_type" id="chart-pie" class="chart-tab-input sr-only">
            <label for="chart-pie" class="chart-tab-label flex-1 px-4 py-3 text-center text-sm font-medium text-slate-600 dark:text-slate-400 border-b-2 border-transparent cursor-pointer">Pie</label>
        </div>

        <div class="chart-panel chart-panel-bar p-5">
            <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200 mb-4">Bar chart (placeholder)</h3>
            <div class="h-56 flex items-end gap-2">
                @foreach ([45, 70, 55, 80, 65, 90, 75, 85, 72, 88] as $h)
                    <div class="flex-1 min-w-0 rounded-t bg-emerald-500/70 dark:bg-emerald-500/50" style="height: {{ $h }}%;"></div>
                @endforeach
            </div>
        </div>
        <div class="chart-panel chart-panel-line p-5">
            <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200 mb-4">Line chart (placeholder)</h3>
            <div class="h-56 flex items-end gap-1">
                @foreach ([30, 45, 40, 60, 55, 70, 65, 80, 75, 85] as $h)
                    <div class="flex-1 min-w-0 rounded-t bg-sky-500/70 dark:bg-sky-500/50" style="height: {{ $h }}%;"></div>
                @endforeach
            </div>
        </div>
        <div class="chart-panel chart-panel-pie p-5">
            <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200 mb-4">Pie / Donut (placeholder)</h3>
            <div class="h-56 flex items-center justify-center">
                <div class="w-40 h-40 rounded-full border-8 border-emerald-500/80 border-t-slate-300 border-r-amber-500/80 border-b-sky-500/80 border-l-slate-200"></div>
            </div>
            <p class="mt-2 text-xs text-slate-500 dark:text-slate-400 text-center">Sales · Purchase · Expense · Other (dummy)</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200 mb-3">Sales vs Purchase (placeholder)</h3>
            <div class="h-36 flex items-end gap-2">
                @foreach ([60, 45, 70, 50, 65] as $h)
                    <div class="flex-1 flex flex-col gap-1">
                        <div class="rounded-t bg-emerald-500/70 w-full" style="height: {{ $h }}%;"></div>
                        <div class="rounded-t bg-slate-400/70 w-full" style="height: {{ $h - 15 }}%;"></div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200 mb-3">Category mix (placeholder)</h3>
            <div class="h-36 flex items-end gap-3 justify-center">
                @foreach ([50, 75, 40, 90, 60] as $h)
                    <div class="w-12 rounded-t bg-amber-500/70 dark:bg-amber-500/50" style="height: {{ $h }}%;"></div>
                @endforeach
            </div>
        </div>
    </div>
    <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Export</button>
</div>
@endsection
