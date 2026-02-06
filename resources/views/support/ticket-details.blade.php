@extends('layouts.app')

@section('title', 'Ticket Details')
@section('page-title', 'Ticket Details')

@section('content')
<div class="space-y-6">
    {{-- Ticket Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center gap-3">
                <a href="{{ route('app.support.ticket-history') }}" class="text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100">← Back</a>
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Ticket #TKT-{{ $id ?? '1001' }}</h2>
            </div>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Unable to add new product</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Close Ticket</button>
            <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Reopen</button>
        </div>
    </div>

    {{-- Ticket Info --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
            <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Status</p>
            <p class="text-sm font-semibold"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-blue-100 dark:bg-blue-500/20 text-blue-700 dark:text-blue-400">Open</span></p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
            <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Priority</p>
            <p class="text-sm font-semibold"><span class="inline-flex px-2.5 py-1 rounded-lg text-xs font-medium bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-400">High</span></p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
            <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Created</p>
            <p class="text-sm font-semibold text-slate-900 dark:text-white">04 Feb 2025, 10:32 AM</p>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-4">
            <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Last Updated</p>
            <p class="text-sm font-semibold text-slate-900 dark:text-white">04 Feb 2025, 2:15 PM</p>
        </div>
    </div>

    {{-- Conversation / Chat UI --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="p-4 border-b border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/95">
            <h3 class="text-sm font-semibold text-slate-900 dark:text-white">Conversation</h3>
        </div>
        <div class="p-6 space-y-4 max-h-[600px] overflow-y-auto">
            {{-- Message 1: User --}}
            <div class="flex gap-3">
                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-emerald-100 dark:bg-emerald-500/20 flex items-center justify-center text-xs font-medium text-emerald-700 dark:text-emerald-400">U</div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-sm font-medium text-slate-900 dark:text-white">You</span>
                        <span class="text-xs text-slate-500 dark:text-slate-400">04 Feb 2025, 10:32 AM</span>
                    </div>
                    <div class="rounded-xl rounded-tl-none bg-slate-100 dark:bg-slate-700 p-3 text-sm text-slate-700 dark:text-slate-300">
                        <p>I'm unable to add a new product to the inventory. When I click the "Add Product" button, nothing happens. I've tried refreshing the page but the issue persists.</p>
                    </div>
                </div>
            </div>

            {{-- Message 2: Support --}}
            <div class="flex gap-3">
                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-500/20 flex items-center justify-center text-xs font-medium text-blue-700 dark:text-blue-400">S</div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-sm font-medium text-slate-900 dark:text-white">Support Team</span>
                        <span class="text-xs text-slate-500 dark:text-slate-400">04 Feb 2025, 11:15 AM</span>
                    </div>
                    <div class="rounded-xl rounded-tl-none bg-emerald-50 dark:bg-emerald-500/10 p-3 text-sm text-slate-700 dark:text-slate-300">
                        <p>Thank you for reporting this issue. We've received your ticket and our technical team is looking into it. Could you please provide the following information:</p>
                        <ul class="mt-2 ml-4 list-disc space-y-1">
                            <li>Browser name and version</li>
                            <li>Any error messages in the browser console</li>
                            <li>Screenshot if possible</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Message 3: User --}}
            <div class="flex gap-3">
                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-emerald-100 dark:bg-emerald-500/20 flex items-center justify-center text-xs font-medium text-emerald-700 dark:text-emerald-400">U</div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-sm font-medium text-slate-900 dark:text-white">You</span>
                        <span class="text-xs text-slate-500 dark:text-slate-400">04 Feb 2025, 1:45 PM</span>
                    </div>
                    <div class="rounded-xl rounded-tl-none bg-slate-100 dark:bg-slate-700 p-3 text-sm text-slate-700 dark:text-slate-300">
                        <p>I'm using Chrome version 120. I checked the console and found this error:</p>
                        <pre class="mt-2 p-2 bg-slate-200 dark:bg-slate-600 rounded text-xs overflow-x-auto">Uncaught TypeError: Cannot read property 'add' of undefined</pre>
                        <p class="mt-2">I've attached a screenshot showing the issue.</p>
                    </div>
                </div>
            </div>

            {{-- Message 4: Support --}}
            <div class="flex gap-3">
                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-500/20 flex items-center justify-center text-xs font-medium text-blue-700 dark:text-blue-400">S</div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-sm font-medium text-slate-900 dark:text-white">Support Team</span>
                        <span class="text-xs text-slate-500 dark:text-slate-400">04 Feb 2025, 2:15 PM</span>
                    </div>
                    <div class="rounded-xl rounded-tl-none bg-emerald-50 dark:bg-emerald-500/10 p-3 text-sm text-slate-700 dark:text-slate-300">
                        <p>Thank you for the details. We've identified the issue and our development team is working on a fix. This should be resolved in the next update scheduled for this week.</p>
                        <p class="mt-2">In the meantime, you can try clearing your browser cache or using an incognito window as a temporary workaround.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Reply Box --}}
        <div class="p-4 border-t border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800/95">
            <form class="space-y-3">
                <textarea rows="3" placeholder="Type your reply..." class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none resize-none"></textarea>
                <div class="flex flex-wrap gap-2">
                    <button type="submit" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Reply</button>
                    <button type="button" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Attach File</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
