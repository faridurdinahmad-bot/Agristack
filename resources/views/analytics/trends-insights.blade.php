@extends('layouts.app')

@section('title', 'Trends / Insights')
@section('page-title', 'Trends / Insights')

@section('content')
<style>
    .insight-tab-input { display: none; }
    .insight-tab-input:checked + .insight-tab-label { color: rgb(5 150 105); font-weight: 600; border-bottom-color: rgb(5 150 105); }
    .dark .insight-tab-input:checked + .insight-tab-label { color: rgb(52 211 153); border-bottom-color: rgb(52 211 153); }
    .insight-panel { display: none; }
    #insight-trends:checked ~ .insight-panel-trends { display: block; }
    #insight-insights:checked ~ .insight-panel-insights { display: block; }
</style>

<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Trends / Insights</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Trends and AI-style insights (UI only)</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="ti_from" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">From</label>
                <input type="date" id="ti_from" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="ti_to" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">To</label>
                <input type="date" id="ti_to" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex items-end gap-2 sm:col-span-2">
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Apply</button>
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Clear</button>
            </div>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="flex border-b border-slate-200 dark:border-slate-700">
            <input type="radio" name="insight_section" id="insight-trends" class="insight-tab-input sr-only" checked>
            <label for="insight-trends" class="insight-tab-label flex-1 px-4 py-3 text-center text-sm font-medium text-slate-600 dark:text-slate-400 border-b-2 border-transparent cursor-pointer">Trends</label>
            <input type="radio" name="insight_section" id="insight-insights" class="insight-tab-input sr-only">
            <label for="insight-insights" class="insight-tab-label flex-1 px-4 py-3 text-center text-sm font-medium text-slate-600 dark:text-slate-400 border-b-2 border-transparent cursor-pointer">Insights</label>
        </div>

        <div class="insight-panel insight-panel-trends p-5 space-y-4">
            <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200">Key trends (dummy)</h3>
            <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 p-4">
                <p class="text-sm text-slate-700 dark:text-slate-300">Sales up 12% vs last month. Top category: Fertilizers.</p>
            </div>
            <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800/50 p-4">
                <p class="text-sm text-slate-700 dark:text-slate-300">Purchase orders 8% higher. Supplier Agri Supply Co leads.</p>
            </div>
            <div class="rounded-xl border border-slate-200 dark:border-slate-600 p-5">
                <h4 class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase mb-3">Trend chart (placeholder)</h4>
                <div class="h-32 flex items-end gap-1">
                    @foreach ([50, 55, 52, 65, 70, 68, 75, 78, 82, 85] as $h)
                        <div class="flex-1 min-w-0 rounded-t bg-emerald-500/60" style="height: {{ $h }}%;"></div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="insight-panel insight-panel-insights p-5 space-y-4">
            <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200">Insights (dummy — no AI)</h3>
            <div class="space-y-3">
                <div class="flex gap-3 p-3 rounded-xl bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20">
                    <span class="text-lg">💡</span>
                    <p class="text-sm text-slate-700 dark:text-slate-300">Low stock alert: 6 items below reorder level. Consider restocking.</p>
                </div>
                <div class="flex gap-3 p-3 rounded-xl bg-amber-50 dark:bg-amber-500/10 border border-amber-200 dark:border-amber-500/20">
                    <span class="text-lg">📊</span>
                    <p class="text-sm text-slate-700 dark:text-slate-300">Expense up 8% vs last period. Review Rent & Utilities.</p>
                </div>
                <div class="flex gap-3 p-3 rounded-xl bg-sky-50 dark:bg-sky-500/10 border border-sky-200 dark:border-sky-500/20">
                    <span class="text-lg">📈</span>
                    <p class="text-sm text-slate-700 dark:text-slate-300">Best selling product this month: Urea 50kg. Stock sufficient.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Trend score (dummy)</p>
            <p class="mt-1 text-2xl font-bold text-emerald-600 dark:text-emerald-400">+12%</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Alerts</p>
            <p class="mt-1 text-2xl font-bold text-amber-600 dark:text-amber-400">2</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Suggestions</p>
            <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">3</p>
        </div>
    </div>
    <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Export</button>
</div>
@endsection
