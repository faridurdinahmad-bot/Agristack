@extends('layouts.app')

@section('title', 'Ticket History')
@section('page-title', 'Ticket History')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Ticket History</h2>
            <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">View and manage your support tickets (UI only)</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('app.support.raise-ticket') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">New Ticket</a>
        </div>
    </div>

    {{-- Filters --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="ticket_from" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">From</label>
                <input type="date" id="ticket_from" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div class="flex flex-col sm:flex-row sm:items-end gap-2">
                <label for="ticket_to" class="text-sm text-slate-600 dark:text-slate-400 whitespace-nowrap">To</label>
                <input type="date" id="ticket_to" class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-3 py-2 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
            <div>
                <label for="ticket_status" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Status</label>
                <select id="ticket_status" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="open">Open</option>
                    <option value="pending">Pending</option>
                    <option value="resolved">Resolved</option>
                    <option value="closed">Closed</option>
                </select>
            </div>
            <div>
                <label for="ticket_priority" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Priority</label>
                <select id="ticket_priority" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <option value="">All</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                    <option value="urgent">Urgent</option>
                </select>
            </div>
            <div>
                <label for="ticket_search" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Search</label>
                <input type="text" id="ticket_search" placeholder="Ticket ID, Subject..." class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
            </div>
        </div>
        <div class="flex flex-wrap gap-3 mt-4">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Apply</button>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Clear filters</button>
        </div>
    </div>

    {{-- Tickets Table --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 dark:bg-slate-800/95 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase w-10">#</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Ticket ID</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Subject</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Priority</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Date</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                        <td class="px-4 py-3 text-slate-500">1</td>
                        <td class="px-4 py-3 font-mono text-xs text-emerald-600 dark:text-emerald-400">#TKT-1001</td>
                        <td class="px-4 py-3 font-medium text-slate-900 dark:text-slate-100">Unable to add new product</td>
                        <td class="px-4 py-3"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-blue-100 dark:bg-blue-500/20 text-blue-700 dark:text-blue-400">Open</span></td>
                        <td class="px-4 py-3"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-400">High</span></td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">04 Feb 2025</td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('app.support.ticket-details', 1001) }}" class="inline-flex px-3 py-1.5 rounded-lg text-xs font-medium text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10">View</a>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                        <td class="px-4 py-3 text-slate-500">2</td>
                        <td class="px-4 py-3 font-mono text-xs text-emerald-600 dark:text-emerald-400">#TKT-1002</td>
                        <td class="px-4 py-3 font-medium text-slate-900 dark:text-slate-100">Invoice not generating PDF</td>
                        <td class="px-4 py-3"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">Resolved</span></td>
                        <td class="px-4 py-3"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300">Medium</span></td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">02 Feb 2025</td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('app.support.ticket-details', 1002) }}" class="inline-flex px-3 py-1.5 rounded-lg text-xs font-medium text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10">View</a>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                        <td class="px-4 py-3 text-slate-500">3</td>
                        <td class="px-4 py-3 font-mono text-xs text-emerald-600 dark:text-emerald-400">#TKT-1003</td>
                        <td class="px-4 py-3 font-medium text-slate-900 dark:text-slate-100">Stock report showing incorrect data</td>
                        <td class="px-4 py-3"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-400">Pending</span></td>
                        <td class="px-4 py-3"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-red-100 dark:bg-red-500/20 text-red-700 dark:text-red-400">Urgent</span></td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">01 Feb 2025</td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('app.support.ticket-details', 1003) }}" class="inline-flex px-3 py-1.5 rounded-lg text-xs font-medium text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10">View</a>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                        <td class="px-4 py-3 text-slate-500">4</td>
                        <td class="px-4 py-3 font-mono text-xs text-emerald-600 dark:text-emerald-400">#TKT-1004</td>
                        <td class="px-4 py-3 font-medium text-slate-900 dark:text-slate-100">User role permissions issue</td>
                        <td class="px-4 py-3"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300">Closed</span></td>
                        <td class="px-4 py-3"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300">Low</span></td>
                        <td class="px-4 py-3 text-slate-600 dark:text-slate-400">28 Jan 2025</td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('app.support.ticket-details', 1004) }}" class="inline-flex px-3 py-1.5 rounded-lg text-xs font-medium text-emerald-600 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-500/10">View</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t border-slate-200 dark:border-slate-700 text-sm text-slate-600 dark:text-slate-400">Showing 1 to 4 of 48 (dummy)</div>
    </div>
</div>
@endsection
