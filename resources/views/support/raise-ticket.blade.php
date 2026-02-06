@extends('layouts.app')

@section('title', 'Raise a Ticket')
@section('page-title', 'Raise a Ticket')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Raise a Ticket</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Create a new support ticket (UI only)</p>
    </div>

    <form class="space-y-6">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Ticket Information</h3>
            <div class="space-y-4">
                <div>
                    <label for="ticket_subject" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Subject <span class="text-red-500">*</span></label>
                    <input type="text" id="ticket_subject" required placeholder="Brief description of your issue" class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="ticket_category" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Category <span class="text-red-500">*</span></label>
                        <select id="ticket_category" required class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            <option value="">Select category</option>
                            <option value="technical">Technical Issue</option>
                            <option value="billing">Billing & Payment</option>
                            <option value="feature">Feature Request</option>
                            <option value="bug">Bug Report</option>
                            <option value="account">Account Issue</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="ticket_priority_form" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Priority <span class="text-red-500">*</span></label>
                        <select id="ticket_priority_form" required class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                            <option value="">Select priority</option>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="ticket_description" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Description <span class="text-red-500">*</span></label>
                    <textarea id="ticket_description" required rows="6" placeholder="Please provide detailed information about your issue..." class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-none"></textarea>
                </div>
                <div>
                    <label for="ticket_attachments" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Attachments (Optional)</label>
                    <input type="file" id="ticket_attachments" multiple class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-emerald-50 file:text-emerald-700 dark:file:bg-emerald-500/20 dark:file:text-emerald-400 hover:file:bg-emerald-100 dark:hover:file:bg-emerald-500/30 cursor-pointer focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none">
                    <p class="mt-1.5 text-xs text-slate-500 dark:text-slate-400">Maximum file size: 10MB. Supported formats: PDF, JPG, PNG</p>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap gap-3">
            <button type="submit" class="px-6 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Submit Ticket</button>
            <a href="{{ route('app.support.ticket-history') }}" class="px-6 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
