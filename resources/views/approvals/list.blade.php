@extends('layouts.app')

@section('title', $pageTitle ?? 'Approvals')
@section('page-title', $pageTitle ?? 'Approvals')

@section('content')
<div class="space-y-6">
    {{-- Top section: title --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-semibold text-slate-900 dark:text-white">{{ $pageTitle ?? 'Approvals' }}</h2>
    </div>

    {{-- Search --}}
    <div class="max-w-md">
        <label for="approval-search" class="sr-only">Search approvals</label>
        <input type="text"
               id="approval-search"
               placeholder="Search approvals…"
               class="w-full rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition">
    </div>

    {{-- Approvals Table --}}
    <div class="rounded-xl border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Reference / Name</th>
                        @if(isset($showType) && $showType)
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Type</th>
                        @endif
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Requested By</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Date</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700" id="approvals-table-body">
                    @php
                        $sampleApprovals = [
                            [
                                'reference' => 'VEN-001',
                                'name' => 'ABC Trading Company',
                                'type' => isset($showType) && $showType ? 'Vendor Registration' : null,
                                'requestedBy' => 'John Doe',
                                'date' => '2026-02-01',
                                'status' => 'pending'
                            ],
                            [
                                'reference' => 'CAT-005',
                                'name' => 'Livestock Feed',
                                'type' => isset($showType) && $showType ? 'Category' : null,
                                'requestedBy' => 'Jane Smith',
                                'date' => '2026-02-02',
                                'status' => 'pending'
                            ],
                            [
                                'reference' => 'PRD-010',
                                'name' => 'Premium Rice Seeds 25kg',
                                'type' => isset($showType) && $showType ? 'Product' : null,
                                'requestedBy' => 'Mike Johnson',
                                'date' => '2026-01-30',
                                'status' => 'approved'
                            ],
                            [
                                'reference' => 'PRC-003',
                                'name' => 'Price Update - Wheat Seeds',
                                'type' => isset($showType) && $showType ? 'Price Change' : null,
                                'requestedBy' => 'Sarah Williams',
                                'date' => '2026-01-29',
                                'status' => 'rejected'
                            ],
                        ];
                    @endphp
                    @foreach ($sampleApprovals as $approval)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            {{-- Reference / Name --}}
                            <td class="px-4 py-3">
                                <div class="flex flex-col">
                                    <span class="text-sm font-medium text-slate-900 dark:text-slate-100">{{ $approval['name'] }}</span>
                                    <span class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">{{ $approval['reference'] }}</span>
                                </div>
                            </td>
                            @if(isset($showType) && $showType)
                            {{-- Type --}}
                            <td class="px-4 py-3">
                                <span class="text-sm text-slate-600 dark:text-slate-400">{{ $approval['type'] }}</span>
                            </td>
                            @endif
                            {{-- Requested By --}}
                            <td class="px-4 py-3">
                                <span class="text-sm text-slate-900 dark:text-slate-100">{{ $approval['requestedBy'] }}</span>
                            </td>
                            {{-- Date --}}
                            <td class="px-4 py-3">
                                <span class="text-sm text-slate-600 dark:text-slate-400">{{ $approval['date'] }}</span>
                            </td>
                            {{-- Status --}}
                            <td class="px-4 py-3 text-center">
                                @if($approval['status'] == 'pending')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-yellow-50 dark:bg-yellow-500/10 text-yellow-700 dark:text-yellow-400 border border-yellow-200 dark:border-yellow-500/20">
                                        Pending
                                    </span>
                                @elseif($approval['status'] == 'approved')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">
                                        Approved
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-red-50 dark:bg-red-500/10 text-red-700 dark:text-red-400 border border-red-200 dark:border-red-500/20">
                                        Rejected
                                    </span>
                                @endif
                            </td>
                            {{-- Actions --}}
                            <td class="px-4 py-3 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('app.approvals.view', ['type' => $approvalType ?? 'general', 'id' => $approval['reference']]) }}" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-700/50 hover:bg-slate-200 dark:hover:bg-slate-600/50 transition-colors inline-flex items-center justify-center" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    @if($approval['status'] == 'pending')
                                        <button type="button" class="approve-btn px-3 py-1.5 rounded-lg text-xs font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-500/10 hover:bg-emerald-100 dark:hover:bg-emerald-500/20 transition-colors inline-flex items-center justify-center" title="Approve">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                        </button>
                                        <button type="button" class="reject-btn px-3 py-1.5 rounded-lg text-xs font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-500/10 hover:bg-red-100 dark:hover:bg-red-500/20 transition-colors inline-flex items-center justify-center" title="Reject">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Empty State (hidden by default) --}}
        <div id="empty-state" class="hidden p-12 text-center">
            <div class="max-w-md mx-auto">
                <svg class="w-16 h-16 mx-auto text-slate-400 dark:text-slate-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">No approvals found</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">There are no pending approvals at this time.</p>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    // Search functionality (UI only)
    document.getElementById('approval-search').addEventListener('input', function(e) {
        var searchTerm = e.target.value.toLowerCase();
        var rows = document.querySelectorAll('#approvals-table-body tr');
        var hasVisibleRows = false;

        rows.forEach(function(row) {
            var text = row.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                row.style.display = '';
                hasVisibleRows = true;
            } else {
                row.style.display = 'none';
            }
        });

        // Show/hide empty state
        var emptyState = document.getElementById('empty-state');
        var tableBody = document.getElementById('approvals-table-body');
        if (!hasVisibleRows && searchTerm) {
            emptyState.classList.remove('hidden');
            tableBody.style.display = 'none';
        } else {
            emptyState.classList.add('hidden');
            tableBody.style.display = '';
        }
    });

    // Approve/Reject buttons (UI only)
    document.querySelectorAll('.approve-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            alert('Approve action (UI only - no backend logic)');
        });
    });

    document.querySelectorAll('.reject-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            alert('Reject action (UI only - no backend logic)');
        });
    });
})();
</script>
@endsection
