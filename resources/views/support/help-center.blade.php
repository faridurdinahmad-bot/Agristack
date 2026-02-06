@extends('layouts.app')

@section('title', 'Help Center')
@section('page-title', 'Help Center')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Help Center</h2>
        <p class="mt-0.5 text-sm text-slate-500 dark:text-slate-400">Get help and support for AgriStack</p>
    </div>

    {{-- Quick Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <div class="flex items-center gap-3">
                <div class="p-3 rounded-xl bg-emerald-100 dark:bg-emerald-500/20">
                    <span class="text-2xl">🎫</span>
                </div>
                <div>
                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">12</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Open Tickets</p>
                </div>
            </div>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <div class="flex items-center gap-3">
                <div class="p-3 rounded-xl bg-blue-100 dark:bg-blue-500/20">
                    <span class="text-2xl">✅</span>
                </div>
                <div>
                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">48</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Resolved</p>
                </div>
            </div>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <div class="flex items-center gap-3">
                <div class="p-3 rounded-xl bg-amber-100 dark:bg-amber-500/20">
                    <span class="text-2xl">⏳</span>
                </div>
                <div>
                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">5</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Pending</p>
                </div>
            </div>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-5">
            <div class="flex items-center gap-3">
                <div class="p-3 rounded-xl bg-purple-100 dark:bg-purple-500/20">
                    <span class="text-2xl">📚</span>
                </div>
                <div>
                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">25</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Articles</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Quick Actions</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('app.support.raise-ticket') }}" class="flex flex-col items-center gap-3 p-4 rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-3xl">🎫</span>
                <span class="text-sm font-medium text-slate-900 dark:text-white">Raise Ticket</span>
            </a>
            <a href="{{ route('app.support.ticket-history') }}" class="flex flex-col items-center gap-3 p-4 rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-3xl">📑</span>
                <span class="text-sm font-medium text-slate-900 dark:text-white">My Tickets</span>
            </a>
            <a href="{{ route('app.support.faqs') }}" class="flex flex-col items-center gap-3 p-4 rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-3xl">❓</span>
                <span class="text-sm font-medium text-slate-900 dark:text-white">FAQs</span>
            </a>
            <a href="{{ route('app.support.contact') }}" class="flex flex-col items-center gap-3 p-4 rounded-xl border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-3xl">📧</span>
                <span class="text-sm font-medium text-slate-900 dark:text-white">Contact Us</span>
            </a>
        </div>
    </div>

    {{-- Popular Articles --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
        <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">Popular Articles</h3>
        <div class="space-y-3">
            <a href="#" class="flex items-start gap-3 p-3 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-lg mt-0.5">📖</span>
                <div>
                    <p class="text-sm font-medium text-slate-900 dark:text-white">How to create a new product</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Step-by-step guide to adding products to inventory</p>
                </div>
            </a>
            <a href="#" class="flex items-start gap-3 p-3 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-lg mt-0.5">📖</span>
                <div>
                    <p class="text-sm font-medium text-slate-900 dark:text-white">Managing sales invoices</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Learn how to create and manage sales invoices</p>
                </div>
            </a>
            <a href="#" class="flex items-start gap-3 p-3 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                <span class="text-lg mt-0.5">📖</span>
                <div>
                    <p class="text-sm font-medium text-slate-900 dark:text-white">Setting up user roles</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Configure permissions and access levels</p>
                </div>
            </a>
        </div>
    </div>

    {{-- Support Resources --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">📚 Resources</h3>
            <div class="space-y-2">
                <a href="{{ route('app.support.user-guide') }}" class="block p-3 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors text-sm text-slate-700 dark:text-slate-300">📖 User Guide</a>
                <a href="{{ route('app.support.tutorials') }}" class="block p-3 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors text-sm text-slate-700 dark:text-slate-300">🎓 Tutorials</a>
                <a href="{{ route('app.support.faqs') }}" class="block p-3 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors text-sm text-slate-700 dark:text-slate-300">❓ Frequently Asked Questions</a>
            </div>
        </div>
        <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6">
            <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-4">🆘 Need Help?</h3>
            <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">Can't find what you're looking for? Our support team is here to help.</p>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('app.support.raise-ticket') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 shadow-md transition-colors">Create Ticket</a>
                <a href="{{ route('app.support.contact') }}" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors">Contact Support</a>
            </div>
        </div>
    </div>
</div>
@endsection
