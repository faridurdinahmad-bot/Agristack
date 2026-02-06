@extends('layouts.app')

@section('title', 'Payroll')
@section('page-title', 'Payroll')

@section('content')
<style>
    #process-payroll-modal-toggle { display: none; }
    #process-payroll-modal { display: none; }
    #process-payroll-modal-toggle:checked ~ #process-payroll-modal { display: flex; }
</style>
<input type="checkbox" id="process-payroll-modal-toggle" class="sr-only" aria-hidden="true" />
<div id="process-payroll-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <label for="process-payroll-modal-toggle" class="absolute inset-0 bg-black/50 backdrop-blur-sm cursor-pointer" aria-label="Close modal"></label>
    <div class="relative z-10 bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-600 shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-slate-200 dark:border-slate-700 sticky top-0 bg-white dark:bg-slate-800">
            <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Process Payroll</h3>
            <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Run payroll for a period</p>
        </div>
        <form class="p-6 space-y-4" onsubmit="return false;">
            <div>
                <label for="payroll_month" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Month</label>
                <select id="payroll_month" name="month" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">Select month</option>
                    @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $m)
                        <option value="{{ strtolower($m) }}">{{ $m }} 2025</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="payroll_employee" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Employee</label>
                <select id="payroll_employee" name="employee_id" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All employees</option>
                    <option value="1">Ali Hassan</option>
                    <option value="2">Sara Khan</option>
                    <option value="3">Usman Ahmed</option>
                </select>
            </div>
            <div>
                <label for="payroll_basic" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Basic Salary (Rs)</label>
                <input type="text" id="payroll_basic" name="basic_salary" placeholder="0.00"
                    class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div>
                <label for="payroll_allowances" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Allowances (Rs)</label>
                <input type="text" id="payroll_allowances" name="allowances" placeholder="0.00"
                    class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div>
                <label for="payroll_deductions" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Deductions (Rs)</label>
                <input type="text" id="payroll_deductions" name="deductions" placeholder="0.00"
                    class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex flex-wrap gap-3 pt-2">
                <label for="process-payroll-modal-toggle" class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors cursor-pointer">Cancel</label>
                <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Process Payroll</button>
            </div>
        </form>
    </div>
</div>

<div class="space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Payroll</h2>
            <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Salary and payroll management</p>
        </div>
        <label for="process-payroll-modal-toggle" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md shadow-emerald-500/25 transition-colors whitespace-nowrap cursor-pointer">
            Process Payroll
        </label>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">This Month Total</p>
            <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">Rs 185,000</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Employees Paid</p>
            <p class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">3</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Pending</p>
            <p class="mt-1 text-2xl font-bold text-amber-600 dark:text-amber-400">0</p>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto max-h-[calc(100vh-24rem)] overflow-y-auto">
            <table class="w-full">
                <thead class="sticky top-0 z-10 bg-slate-50 dark:bg-slate-800/95 border-b border-slate-200 dark:border-slate-700 shadow-sm">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Month</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Employee</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Net Amount</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @php
                        $payrolls = [
                            ['month' => 'February 2025', 'employee' => 'Ali Hassan', 'amount' => 75000, 'status' => 'Paid'],
                            ['month' => 'February 2025', 'employee' => 'Sara Khan', 'amount' => 55000, 'status' => 'Paid'],
                            ['month' => 'February 2025', 'employee' => 'Usman Ahmed', 'amount' => 55000, 'status' => 'Paid'],
                        ];
                    @endphp
                    @foreach ($payrolls as $p)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-4 py-3 text-sm text-slate-600 dark:text-slate-400">{{ $p['month'] }}</td>
                            <td class="px-4 py-3 text-sm font-medium text-slate-900 dark:text-slate-100">{{ $p['employee'] }}</td>
                            <td class="px-4 py-3 text-sm text-right text-slate-900 dark:text-slate-100 font-medium">Rs {{ number_format($p['amount']) }}</td>
                            <td class="px-4 py-3 text-center">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">{{ $p['status'] }}</span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <button type="button" class="p-2 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700/50 transition-colors cursor-pointer" title="View"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t border-slate-200 dark:border-slate-700 text-sm text-slate-600 dark:text-slate-400">Showing 1 to 3 of 3 results</div>
    </div>
</div>
@endsection
