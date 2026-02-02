@extends('layouts.app')

@section('title', $pageTitle)
@section('page-title', $pageTitle)

@section('content')
<div class="rounded-2xl bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl border border-white/60 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 overflow-hidden">
    <div class="px-6 sm:px-8 py-6 sm:py-8">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-100 dark:bg-emerald-500/20 flex items-center justify-center text-2xl shrink-0">
                {{ $pageIcon }}
            </div>
            <div>
                <h2 class="text-xl font-semibold text-slate-900 dark:text-white">{{ $pageTitle }}</h2>
                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">This page is under design.</p>
            </div>
        </div>
        <p class="mt-6 text-slate-600 dark:text-slate-400">
            Content for <strong>{{ $pageTitle }}</strong> will be added here. This is a placeholder view for the ERP dashboard framework.
        </p>
    </div>
</div>
@endsection
