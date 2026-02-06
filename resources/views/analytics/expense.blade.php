@extends('layouts.app')

@section('title', 'Expense Analytics')
@section('page-title', 'Expense Analytics')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Expense Analytics</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Expense breakdown and trends</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="exp_from" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">From</label>
                <input type="date" id="exp_from" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="exp_to" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">To</label>
                <input type="date" id="exp_to" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div>
                <label for="exp_category" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Category</label>
                <select id="exp_category" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="rent">Rent</option>
                    <option value="utilities">Utilities</option>
                    <option value="salary">Salary</option>
                </select>
            </div>
            <div class="flex items-end gap-2 sm:col-span-2">
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Apply</button>
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Clear</button>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Expense</p>
            <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">Rs 1,85,000</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Transactions</p>
            <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">42</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Avg. per entry</p>
            <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">Rs 4,405</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">vs Last period</p>
            <p class="mt-1 text-2xl font-bold text-amber-600 dark:text-amber-400">+8%</p>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
        <h3 class="text-sm font-semibold text-slate-800 dark:text-slate-200 mb-4">Expense by category (placeholder)</h3>
        <div class="h-48 flex items-end gap-3 justify-center">
            @foreach ([60, 85, 45, 70, 55] as $h)
                <div class="w-14 rounded-t bg-amber-500/70 dark:bg-amber-500/50" style="height: {{ $h }}%;"></div>
            @endforeach
        </div>
        <p class="mt-2 text-xs text-slate-500 dark:text-slate-400 text-center">Rent · Utilities · Salary · Misc · Other (dummy)</p>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <h3 class="px-4 py-3 text-sm font-semibold text-slate-800 dark:text-slate-200 border-b border-slate-200 dark:border-slate-700">Recent expenses (dummy)</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 dark:bg-slate-800/95 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Category</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Description</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @php $expRows = [['Rent', 'Monthly rent', 45000], ['Utilities', 'Electricity + gas', 12000], ['Salary', 'Staff bonus', 25000]]; @endphp
                    @foreach ($expRows as $i => $r)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                            <td class="px-4 py-3 text-slate-500">{{ $i + 1 }}</td>
                            <td class="px-4 py-3 font-medium text-slate-900 dark:text-slate-100">{{ $r[0] }}</td>
                            <td class="px-4 py-3 text-slate-600 dark:text-slate-400">{{ $r[1] }}</td>
                            <td class="px-4 py-3 text-right font-medium">Rs {{ number_format($r[2]) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Export</button>
</div>
@endsection
