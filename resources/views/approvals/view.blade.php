@extends('layouts.app')

@section('title', 'View Approval')
@section('page-title', 'View Approval')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    {{-- Page Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-900 dark:text-white mb-1">View Approval</h1>
        <p class="text-sm text-slate-600 dark:text-slate-400">Review approval request details</p>
    </div>

    {{-- Approval Details --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 p-6 mb-6">
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white mb-5 pb-3 border-b border-slate-200 dark:border-slate-700">Approval Details</h2>
        
        <div class="space-y-4">
            {{-- Reference --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Reference</label>
                <p class="text-sm text-slate-900 dark:text-slate-100">VEN-001</p>
            </div>

            {{-- Name --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Name</label>
                <p class="text-sm text-slate-900 dark:text-slate-100">ABC Trading Company</p>
            </div>

            {{-- Type --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Type</label>
                <p class="text-sm text-slate-900 dark:text-slate-100">Vendor Registration</p>
            </div>

            {{-- Requested By --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Requested By</label>
                <p class="text-sm text-slate-900 dark:text-slate-100">John Doe</p>
            </div>

            {{-- Date --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Request Date</label>
                <p class="text-sm text-slate-900 dark:text-slate-100">2026-02-01</p>
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Status</label>
                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-yellow-50 dark:bg-yellow-500/10 text-yellow-700 dark:text-yellow-400 border border-yellow-200 dark:border-yellow-500/20">
                    Pending
                </span>
            </div>

            {{-- Description / Details --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1.5">Description</label>
                <p class="text-sm text-slate-600 dark:text-slate-400">New vendor registration request for ABC Trading Company. All required documents have been submitted.</p>
            </div>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="flex flex-wrap gap-3">
        <button type="button" id="approve-btn" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors">
            Approve
        </button>
        <button type="button" id="reject-btn" class="px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 transition-colors">
            Reject
        </button>
        <a href="{{ url()->previous() }}" class="px-4 py-2.5 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 transition-colors inline-flex items-center">
            Back
        </a>
    </div>
</div>

<script>
(function() {
    // Approve/Reject buttons (UI only)
    document.getElementById('approve-btn').addEventListener('click', function() {
        alert('Approve action (UI only - no backend logic)');
    });

    document.getElementById('reject-btn').addEventListener('click', function() {
        alert('Reject action (UI only - no backend logic)');
    });
})();
</script>
@endsection
